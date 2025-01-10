<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\VoucherCode;
use App\SoteriaDevice;
use App\SoteriaOfficial;
use App\Staff;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Storage;

class SoteriaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:staff');
    }
    public function home()
    {
        $this->authorize('soteria', Staff::class);
        return view('soteria.home');
    }

    // public function getvoucherstaff()
    // {

    //     // Get the authenticated staff
    //     $staff = Auth::guard('staff')->user();

    //     // Retrieve the staff ID
    //     $staff_id = $staff->id;
    //     // Get a voucher code that is available and has status 1
    //     $getv = VoucherCode::where('status', 1)->first();
    //     // Check if a record with the staff ID already exists in the voucher codes table
    //     $existingRecord = VoucherCode::where('staff_id', $staff_id)->exists();

    //     $expirationDate = Carbon::parse($getv->updated_at)->addWeeks(2);
    //     $today = Carbon::now();
    //     // dd($expirationDate);
    //     // dd($today->greaterThanOrEqualTo($expirationDate));

    //     // If the record already exists, return to the view
    //     if ($existingRecord) {

    //         if ($today->greaterThanOrEqualTo($expirationDate)) {
    //             $getv->staff_id = $staff_id;
    //             $getv->status = 2;
    //             $getv->save();
    //             $viewV = VoucherCode::where('staff_id', $staff_id)
    //                 ->orderBy('updated_at', 'desc')
    //                 ->first();
    //             dd($expirationDate);
    //             return view('soteria.staffV', compact('viewV'))->with('success', 'Voucher code updated successfully.');
    //             // return view('soteria.staffV')->with('error', 'This voucher has expired.');
    //         }
    //         $viewV = VoucherCode::where('staff_id', $staff_id)
    //             ->orderBy('updated_at', 'desc')
    //             ->first();

    //         return view('soteria.staffV', compact('viewV'));
    //     }

    //     if ($getv) {
    //         // Check if the voucher has expired

    //         // Update the found voucher code's staff_id and status to 2
    //         $getv->staff_id = $staff_id;
    //         $getv->status = 2;
    //         $getv->save();

    //         // Voucher is still valid, return to the view with success message and voucher details
    //         $viewV = VoucherCode::where('staff_id', $staff_id)
    //             ->orderBy('updated_at', 'desc')
    //             ->first();
    //         return view('soteria.staffV', compact('viewV'))->with('success', 'Voucher code updated successfully.');
    //     } else {
    //         // No available voucher codes found, return to the view with an error message
    //         return view('soteria.staffV')->with('error', 'No voucher code found with status 1.');
    //     }

    // }

    public function getvoucherstaff()
    {
        // Get the authenticated student
        $staff = Auth::guard('staff')->user();
        // dd($staff);

        // Retrieve the student ID
        $staff_id = $staff->id;
        // Check if a record with the student ID already exists in the voucher codes table
        $existingRecord = VoucherCode::where('staff_id', $staff_id)->exists();

        // If the record already exists, return to the view
        if ($existingRecord) {
            $viewV= VoucherCode::where('staff_id', $staff_id)->first();
            return view('soteria.staffV', compact('viewV'));
        }

        $getv = VoucherCode::where('status', 1)->first();
        $viewV= VoucherCode::where('staff_id', $staff_id)->first();
        // Update the student ID and status of the voucher code where status is 1
        if ($getv) {
            // Update the found voucher code's student_id and status to 2
            $getv->staff_id = $staff_id;
            $getv->status = 2;
            $getv->save();

            return view('soteria.staffV', compact('viewV'))->with('success', 'Student ID and status updated successfully.');

        // Check if any rows were updated
        } else {
            // No rows were updated, return to the view with an error message
            return view('soteria.staffV', compact('viewV'))->with('error', 'No voucher code found with status 1.');
          }

    }

    public function addPin(Request $request)
    {
        // Validate the form data
        $request->validate([
            'pin' => 'required|string|max:255', // You can adjust the validation rules as needed
        ]);

        // Create a new VoucherCode instance
        $voucher = new VoucherCode();
        $voucher->pin = $request->input('pin');
        $voucher->status = 1; // Assuming the default status for new PINs is 1
        $voucher->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'PIN added successfully.');
    }

    /**
     * Download sample CSV file.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadSampleCSV()
    {
        // Define sample CSV data (replace with your actual sample data)
        $csvData = [
            ['pin'], // Header row
            ['Fzm87GXsHGd'], // Sample data row 1
            // Sample data row 2
            // Add more rows as needed
        ];

        // Create CSV file content
        $fileName = 'sample.csv';
        $file = fopen(storage_path('app/' . $fileName), 'w');

        // Write CSV header
        fputcsv($file, $csvData[0]);

        // Write CSV data rows
        foreach (array_slice($csvData, 1) as $row) {
            fputcsv($file, $row);
        }

        // Close the file
        fclose($file);

        // Return the CSV file as a download
        return response()->download(storage_path('app/' . $fileName))->deleteFileAfterSend(true);
    }

    /**
     * Upload CSV file.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadCSV(Request $request)
    {
        // Validate the uploaded file
        $validator = Validator::make($request->all(), [
            'csv_file' => 'required|file|mimes:csv,txt|max:2048', // Max 2MB
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle the uploaded CSV file
        if ($request->hasFile('csv_file')) {
            $file = $request->file('csv_file');

            // Generate a unique filename
            $fileName = 'uploaded_' . time() . '.' . $file->getClientOriginalExtension();

            // Store the file in the storage/app/csv folder
            $filePath = $file->storeAs('csv', $fileName);

            // Process the CSV file
            $this->processCSV($filePath);

            // Redirect back with success message
            return redirect()->back()->with('success', 'CSV file uploaded and processed successfully.');
        }

        // Redirect back with an error if file not found
        return redirect()->back()->with('error', 'No file uploaded.');
    }

    /**
     * Process the uploaded CSV file.
     *
     * @param  string  $filePath
     * @return void
     */
    private function processCSV($filePath)
    {
        // Read the CSV file
        $csvData = array_map('str_getcsv', file(storage_path('app/' . $filePath)));

        // Loop through each row
        foreach ($csvData as $row) {
            // Create a new VoucherCode instance
            $voucher = new VoucherCode();
            $voucher->pin = $row[0]; // Assuming the PIN is in the first column
            $voucher->status = 1; // Set initial status
            $voucher->created_at = Carbon::now();
            $voucher->updated_at = Carbon::now();
            $voucher->save();
        }
    }

    public function index()
    {
        $this->authorize('soteria', Staff::class);
        $devices = SoteriaDevice::orderBy('id', 'DESC')->paginate(100);
        return view('soteria.list', compact('devices'));
    }
    public function add(Request $request)
    {
        $this->authorize('soteria', Staff::class);
        $this->validate($request, [
            'type' => 'required|integer',
        ]);
        $soteria = new SoteriaDevice();

        //for student
        if ($request->type == 1) {
            $students = Student::where('phone', $request->id)
                ->orWhere('username', $request->id)
                ->orWhere('id', $request->id)
                ->get();
            if (count($students) > 0) {
                $student = $students->first();
                //check if student has been enabled
                if ($soteria->where('user_type_id', 1)->where('user_id', $student->id)->count() > 0) {
                    return redirect()->route('soteria.home')
                        ->with('error', $student->fullName . ' has already been enabled');
                }
                return redirect()->route('soteria.add_student', base64_encode($student->id));
            } else {
                return redirect()->route('soteria.home')
                    ->with('error', 'Student details not found');
            }
        }

        //for staff
        else if ($request->type == 2) {
            $staff = Staff::where('phone', $request->id)
                ->orWhere('username', $request->id)
                ->get();
            if (count($staff) > 0) {
                $stf = $staff->first();
                //check if staff has been enabled
                if ($soteria->where('user_type_id', 2)->where('user_id', $stf->id)->count() > 0) {
                    return redirect()->route('soteria.home')
                        ->with('error', $stf->fullName . ' has already been enabled');
                }
                return redirect()->route('soteria.add_staff', base64_encode($stf->id));
            } else {
                return redirect()->route('soteria.home')
                    ->with('error', 'Staff details not found');
            }
        }

        //for official systems
        else if ($request->type == 3) {
            return redirect()->route('soteria.official.create');
        } else {
            return redirect()->route('soteria.home')
                ->with('error', 'User type not specified');
        }

    }

    public function addStaff($staff_id)
    {
        $staff = Staff::findOrFail(base64_decode($staff_id));
        return view('soteria.add_staff', compact('staff'));
    }

    public function storeStaff(Request $request)
    {
        $this->authorize('soteria', Staff::class);
        $this->validate($request, [
            'device_type' => 'required|string|max:255',
            'os' => 'required|string|max:255',
            'mac_address' => 'required|string|max:255|unique:soteria_devices',
            'antivirus' => 'sometimes|nullable|string|max:100',
            'av_expire' => 'sometimes|nullable|string|max:100',
            'full_name' => 'required|string|max:255',
            'user_type_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        if ($request->os == "Microsoft" and $request->antivirus == "None") {
            $request->session()->flash('error', 'your must provide a valid antivirus<br />');
            return redirect()->route('soteria.add_staff', base64_encode($request->user_id));
        }

        if ($request->antivirus != "None" and $request->av_expire == "") {
            $request->session()->flash('error', 'provide a valid antivirus expiry date <br />');
            return redirect()->route('soteria.add_staff', base64_encode($request->user_id));
        }

        $soteria = new SoteriaDevice();
        if ($soteria->where('user_type_id', 2)->where('user_id', $request->user_id)->count() > 0) {
            return redirect()->route('soteria.home')
                ->with('error', $request->full_name . ' has already been enabled');
        }

        if (!$soteria->validMac($request->mac_address)) {
            $request->session()->flash('error', 'Invalid mac address ! <br />');
            return redirect()->route('soteria.add_staff', base64_encode($request->user_id));
        }

        $soteria->device_type = $request->device_type;
        $soteria->os = $request->os;
        $soteria->mac_address = $request->mac_address;
        $soteria->antivirus = $request->antivirus;
        $soteria->av_expire = $request->av_expire;
        $soteria->full_name = $request->full_name;
        $soteria->user_type_id = $request->user_type_id;
        $soteria->user_id = $request->user_id;
        $soteria->group_id = 2;
        $soteria->ip_address = $soteria->getIP(2);

        try {
            $soteria->save();
        } // end try
         catch (\Exception $e) {
            $request->session()->flash('error', 'Error adding network device for this staff ! <br />');
            return redirect()->route('soteria.add_staff', base64_encode($request->user_id));
        }

        return redirect()->route('soteria.list')
            ->with('success', 'New network device added successfully');

    } // end storeStaff

    public function addStudent($student_id)
    {
        $student = Student::findOrFail(base64_decode($student_id));
        return view('soteria.add_student', compact('student'));
    }

    public function storeStudent(Request $request)
    {
        $this->authorize('soteria', Staff::class);
        $this->validate($request, [
            'device_type' => 'required|string|max:255',
            'os' => 'required|string|max:255',
            'mac_address' => 'required|string|max:255|unique:soteria_devices',
            'antivirus' => 'sometimes|nullable|string|max:100',
            'av_expire' => 'sometimes|nullable|string|max:100',
            'full_name' => 'required|string|max:255',
            'user_type_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        if ($request->os == "Microsoft" and $request->antivirus == "None") {
            $request->session()->flash('error', 'your must provide a valid antivirus<br />');
            return redirect()->route('soteria.add_student', base64_encode($request->user_id));
        }

        if ($request->antivirus != "None" and $request->av_expire == "") {
            $request->session()->flash('error', 'provide a valid antivirus expiry date <br />');
            return redirect()->route('soteria.add_student', base64_encode($request->user_id));
        }

        $soteria = new SoteriaDevice();
        if ($soteria->where('user_type_id', 2)->where('user_id', $request->user_id)->count() > 0) {
            return redirect()->route('soteria.home')
                ->with('error', $request->full_name . ' has already been enabled');
        }

        if (!$soteria->validMac($request->mac_address)) {
            $request->session()->flash('error', 'Invalid mac address ! <br />');
            return redirect()->route('soteria.add_student', base64_encode($request->user_id));
        }

        $soteria->device_type = $request->device_type;
        $soteria->os = $request->os;
        $soteria->mac_address = $request->mac_address;
        $soteria->antivirus = $request->antivirus;
        $soteria->av_expire = $request->av_expire;
        $soteria->full_name = $request->full_name;
        $soteria->user_type_id = $request->user_type_id;
        $soteria->user_id = $request->user_id;
        $soteria->group_id = 1;
        $soteria->ip_address = $soteria->getIP(1);

        try {
            $soteria->save();
        } // end try
         catch (\Exception $e) {
            $request->session()->flash('error', 'Error adding network device for this student ! <br />');
            return redirect()->route('soteria.add_student', base64_encode($request->user_id));
        }

        return redirect()->route('soteria.list')
            ->with('success', 'New student network device added successfully');

    } // end storeStudent

    public function edit($id)
    {
        $this->authorize('soteria', Staff::class);
        $device = SoteriaDevice::findOrFail(base64_decode($id));
        return view('soteria.edit', compact('device'));
    } // end edit

    public function update(Request $request, $id)
    {
        $this->authorize('soteria', Staff::class);
        $device = SoteriaDevice::findOrFail($id);

        //validate unique mac_address
        if ($request->mac_address != $device->mac_address) {
            $this->validate($request, [
                'mac_address' => 'required|string|max:255|unique:soteria_devices',
            ]);
            $device->mac_address = $request->mac_address;
        } // end valid mac_address

        $this->validate($request, [
            'device_type' => 'required|string|max:255',
            'os' => 'required|string|max:255',
            'antivirus' => 'sometimes|nullable|string|max:100',
            'av_expire' => 'sometimes|nullable|string|max:100',
        ]);

        if ($request->os == "Microsoft" and $request->antivirus == "None") {
            $request->session()->flash('error', 'your must provide a valid antivirus<br />');
            return redirect()->route('soteria.edit', base64_encode($id));
        }

        if ($request->antivirus != "None" and $request->av_expire == "") {
            $request->session()->flash('error', 'provide a valid antivirus expiry date <br />');
            return redirect()->route('soteria.edit', base64_encode($id));
        }

        if (!$device->validMac($request->mac_address)) {
            $request->session()->flash('error', 'Invalid mac address ! <br />');
            return redirect()->route('soteria.edit', base64_encode($id));
        }

        $device->device_type = $request->device_type;
        $device->os = $request->os;
        $device->mac_address = $request->mac_address;
        $device->antivirus = $request->antivirus;
        $device->av_expire = $request->av_expire;

        try {
            $device->save();
        } // end try
         catch (\Exception $e) {
            $request->session()->flash('error', 'Error adding network device for this staff ! <br />');
            return redirect()->route('soteria.edit', base64_encode($id));
        }

        return redirect()->route('soteria.list')
            ->with('success', 'Network device updated successfully');

    } // end update

    public function adminEdit($id)
    {
        $this->authorize('soteriaAdmin', Staff::class);
        $device = SoteriaDevice::findOrFail(base64_decode($id));
        return view('soteria.admin_edit', compact('device'));
    } // end edit

    public function adminUpdate(Request $request, $id)
    {
        $this->authorize('soteriaAdmin', Staff::class);
        $device = SoteriaDevice::findOrFail($id);

        //validate unique mac_address
        if ($request->mac_address != $device->mac_address) {
            $this->validate($request, [
                'mac_address' => 'required|string|max:255|unique:soteria_devices',
            ]);
            $device->mac_address = $request->mac_address;
        } // end valid mac_address

        $this->validate($request, [
            'device_type' => 'required|string|max:255',
            'ip_address' => 'required|ipv4|max:255',
            'os' => 'required|string|max:255',
            'antivirus' => 'sometimes|nullable|string|max:100',
            'av_expire' => 'sometimes|nullable|string|max:100',
        ]);

        if ($request->os == "Microsoft" and $request->antivirus == "None") {
            $request->session()->flash('error', 'your must provide a valid antivirus<br />');
            return redirect()->route('soteria.edit', base64_encode($id));
        }

        if ($request->antivirus != "None" and $request->av_expire == "") {
            $request->session()->flash('error', 'provide a valid antivirus expiry date <br />');
            return redirect()->route('soteria.edit', base64_encode($id));
        }

        if (!$device->validMac($request->mac_address)) {
            $request->session()->flash('error', 'Invalid mac address ! <br />');
            return redirect()->route('soteria.edit', base64_encode($id));
        }

        $device->device_type = $request->device_type;
        $device->os = $request->os;
        $device->mac_address = $request->mac_address;
        $device->antivirus = $request->antivirus;
        $device->av_expire = $request->av_expire;
        $device->ip_address = ip2long($request->ip_address);

        try {
            $device->save();
        } // end try
         catch (\Exception $e) {
            $request->session()->flash('error', 'Error adding network device for this staff ! <br />');
            return redirect()->route('soteria.edit', base64_encode($id));
        }

        return redirect()->route('soteria.list')
            ->with('success', 'Network device updated successfully');

    } // end update

    public function delete(Request $request)
    {
        $this->authorize('soteria', Staff::class);
        $device = SoteriaDevice::findOrFail($request->id);

        try {
            //if official, also delete
            if ($device->user_type_id == 3) {
                $official = SoteriaOfficial::findOrFail($device->user_id);
                $official->delete();
            }
            $device->delete();

        } // end try
         catch (\Exception $e) {
            $request->session()->flash('error', 'Error deleting Device !');
            return redirect()->route('soteria.list');
        }
        return redirect()->route('soteria.list')
            ->with('success', 'Device deleted successfully');

    } // end delete

    public function dhcp()
    {
        $this->authorize('soteriaAdmin', Staff::class);
        $devices = SoteriaDevice::all();
        $long_start = 168429825;
        $contents = '';
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");

        $xml->startDocument();

        //start dhcpd element
        $xml->startElement('dhcpd');

        //start lan element
        $xml->startElement('lan');

        $xml->startElement('range');
        $xml->writeElement('from', '10.10.15.129');
        $xml->writeElement('to', '10.10.15.254');
        $xml->endElement();

        $xml->writeElement('failover_peerip', '');
        $xml->writeElement('dhcpleaseinlocaltime', '');
        $xml->writeElement('defaultleasetime', '');
        $xml->writeElement('maxleasetime', '');
        $xml->writeElement('netmask', '');
        $xml->writeElement('gateway', '10.10.0.1');
        $xml->writeElement('domain', '');
        $xml->writeElement('domainsearchlist', '');
        $xml->writeElement('ddnsdomain', '');
        $xml->writeElement('ddnsdomainprimary', '');
        $xml->writeElement('ddnsdomainkeyname', '');
        $xml->writeElement('ddnsdomainkey', '');
        $xml->writeElement('mac_allow', '');
        $xml->writeElement('mac_deny', '');
        $xml->writeElement('tftp', '');
        $xml->writeElement('ldap', '');
        $xml->writeElement('nextserver', '');
        $xml->writeElement('filename', '');
        $xml->writeElement('filename32', '');
        $xml->writeElement('filename64', '');
        $xml->writeElement('rootpath', '');
        $xml->writeElement('numberoptions', '');

        //start static maps
        foreach ($devices as $key => $device) {

            $xml->startElement('staticmap');
            $xml->writeElement('mac', $device->os === 'windows' && Carbon::parse($device->av_expire)->lt(Carbon::now()->addMonth(1)) ? '' : $device->mac_address);
            $xml->writeElement('cid', '');
            $xml->writeElement('ipaddr', $device->ip_address !== null ? long2ip($device->ip_address) : '');
            $xml->writeElement('hostname', '');
            $xml->writeElement('descr', $device->full_name);
            $xml->writeElement('filename', '');
            $xml->writeElement('rootpath', '');
            $xml->writeElement('defaultleasetime', '');
            $xml->writeElement('maxleasetime', '');
            $xml->writeElement('gateway', '');
            $xml->writeElement('domain', '');
            $xml->writeElement('domainsearchlist', '');
            $xml->writeElement('ddnsdomain', '');
            $xml->writeElement('ddnsdomainprimary', '');
            $xml->writeElement('ddnsdomainkeyname', '');
            $xml->writeElement('ddnsdomainkey', '');
            $xml->writeElement('tftp', '');
            $xml->writeElement('ldap', '');
            $xml->endElement();
        }
        $xml->writeElement('enable', '');
        $xml->writeElement('ddnsdomainkeyalgorithm', 'hmac-md5');
        $xml->writeElement('ddnsclientupdates', 'allow');
        $xml->writeElement('nonak', '');
        $xml->writeElement('dnsserver', '10.10.0.1');
        $xml->writeElement('dnsserver', '8.8.8.8');
        $xml->writeElement('denyunknown', '');

        //end lan element
        $xml->endElement();

        //wan element
        $xml->startElement('wan');
        $xml->writeElement('dhcpleaseinlocaltime', '');
        $xml->endElement();

        //end dhcpd element
        $xml->endElement();

        $xml->endDocument();

        $contents .= $xml->outputMemory();

        $xml = null;

        Storage::put('xmls/devices/dhcp.xml', $contents);

        return response()->download(storage_path('app/xmls/devices/dhcp.xml'));

    } // end dhcp

    public function search()
    {
        $this->authorize('soteria', Staff::class);
        return view('soteria.search');
    } //end search

    public function find(Request $request)
    {

        $this->authorize('soteria', Staff::class);
        $this->validate($request, [
            'data' => 'required|string|max:50',
        ],

            $messages = [
                'data' => 'Please provide the students ID only name or Device name for official systems.',
            ]);

        $devices = SoteriaDevice::where('user_id', $request->data)
            ->orWhere('full_name', 'like', '%' . $request->data . '%')
            ->paginate(50);

        if (count($devices) > 0) {
            $request->session()->flash('message', '');
            return view('soteria.list', compact('devices'));
        } else {
            $request->session()->flash('message', 'No Matching device record found. Try to search again !');
            return view('soteria.search');
        }

    } // end find

} // end class
