<?php

namespace App\Http\Controllers;

use App\AdminDepartment;
use App\Http\Controllers\Controller;
use App\SoteriaDevice;
use App\SoteriaOfficial;
use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoteriaOfficialsController extends Controller
{
    //
    //
    public function __construct()
    {
        $this->middleware('auth:staff');
    }
    public function create()
    {
        $this->authorize('soteria',Staff::class);
        $departments = AdminDepartment::where('status',1)->orderBy('name','ASC')->pluck('name','id');
        $staff = Staff::where('status',1)->orderBy('surname','ASC')->get()->pluck('fullName','id');
        return view('soteria.create_official',compact('departments','staff'));
    }

    public function store(Request $request)
    {
        $this->authorize('soteria',Staff::class);
        $this->validate($request, [
            'device_type' => 'required|string|max:255',
            'device_name' => 'required|string|max:255',
            'os' => 'required|string|max:255',
            'memory' => 'required|integer|max:128',
            'storage' => 'required|integer|max:20000',
            'mac_address' => 'required|string|max:255|unique:soteria_devices|unique:soteria_officials',
            'antivirus' => 'sometimes|nullable|string|max:100',
            'av_expire' => 'sometimes|nullable|string|max:100',
            'admin_department_id' => 'required|integer|max:400',
            'staff_id' => 'required|integer|max:4000',
            'serial_no' => 'required|string|unique:soteria_officials',
        ]);

        if($request->os == "Microsoft" AND $request->antivirus == "None")
        {
            $request->session()->flash('error', 'your must provide a valid antivirus<br />');
            return redirect()->route('soteria.official.create');
        }

        if($request->antivirus != "None" AND $request->av_expire == "")
        {
            $request->session()->flash('error', 'provide a valid antivirus expiry date <br />');
            return redirect()->route('soteria.official.create');
        }

        $official = new SoteriaOfficial();
        $soteria = new SoteriaDevice();

        if(!$soteria->validMac($request->mac_address))
        {
            $request->session()->flash('error', 'Invalid mac address ! <br />');
            return redirect()->route('soteria.official.create');
        }

        $staff = Staff::findOrFail($request->staff_id);
        $official->device_type = $request->device_type;
        $official->device_name = $staff->full_name;
        $official->os = $request->os;
        $official->memory = $request->memory;
        $official->storage = $request->storage;
        $official->mac_address = $request->mac_address;
        $official->antivirus = $request->antivirus;
        $official->av_expire = $request->av_expire;
        $official->serial_no = $request->serial_no;
        $official->admin_department_id = $request->admin_department_id;
        $official->staff_id = $request->staff_id;

        $soteria->device_type = $request->device_type;
        $soteria->os = $request->os;
        $soteria->mac_address = $request->mac_address;
        $soteria->antivirus = $request->antivirus;
        $soteria->av_expire = $request->av_expire;
        $soteria->full_name = $staff->full_name;
        $soteria->user_type_id = 3;
        $soteria->group_id = 3;
        $soteria->ip_address = $soteria->getIP(3);


        DB::beginTransaction(); //Start transaction!
        try{
            $official->save();

            $soteria->user_id = $official->id;
            $soteria->save();
        } // end try
        catch(\Exception $e)
        {
            DB::rollback();
            $request->session()->flash('error', 'Error creating official device ! <br />'.$e);
            return redirect()->route('soteria.official.create');
        }
        DB::commit();
        return redirect()->route('soteria.list')
            ->with('success','New official system added successfully');

    }



} // end class
