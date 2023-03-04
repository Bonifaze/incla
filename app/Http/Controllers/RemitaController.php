<?php

namespace App\Http\Controllers;
use App\users;
use App\Remita;
use App\FeeType;
use App\Student;
use Carbon\Carbon;
use App\StudentDebt;
use App\StudentAcademic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;

class RemitaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:staff');
    }


    private function hasPriviledge($functionName, $adminID)
    {

        $task = DB::table('tasks')->where('task_function', $functionName)->first();
        //  return($task->id." : ".$adminID);
        $roles = DB::table('task_to_role')->where('task_id', $task->id)->get();

        foreach ($roles as $role) {
            if (DB::table('role_to_admin')->where('role_id', $role->role_id)->where('admin_id', $adminID)->exists()) {
                return true;
            }
        }
        return false;
    }


    public function index(){
        $remitas = Remita::orderBy('created_at','DESC')->orderBy('student_id','ASC')->orderBy('status_code','ASC')->paginate(50);
        return view('bursary.remita_list',compact('remitas'));
    }

    public function search()
    {
        $this->authorize('remitaSearch',Remita::class);
        return view('bursary.remita_search');
    } //end search

    public function find(Request $request)
    {

        $this->authorize('remitaSearch',Remita::class);
        $this->validate($request, [
            'data' => 'required|string|max:50',
        ],
            $messages = [
                'data'    => 'Please provide a Remita RRR.',
            ]);
        $rrr = $request->data;
        $remita = Remita::where('rrr',$rrr)->first();
        if($remita){
            $student = $remita->student;
            $academic = $student->academic;
            $feeType = $remita->feeType;
            return view('bursary.remita_show',compact('remita','student','academic','feeType'));
        }
        else {
            $error = "Requested Remita record not found. Please check your input or contact ICT.";
            return redirect()->route('remita.search-rrr')
                ->with('error',$error);
        }
    } // end find rrr


//VERIFY PAYMENT FUNCTION

public function verifypayment(Request $req)
{
    $staff = Auth::guard('staff')->user();
    if ($this->hasPriviledge("verifyPayment",  $staff->id)) {

    try {
        DB::table('remitas')->where('rrr', $req->rrr)
            ->update([
                'status_code' => "01",
                'status' => "Payment Successful",
                'channel' => "Remita Online",
                'transaction_id' =>  Carbon::now(),
                'transaction_date' => Carbon::now(),
                'channel' => "Remita Online",
                'updated_at' => Carbon::now(),
                'verify_by' => $staff->id
            ]);
            $approvalMsg = '<div class="alert alert-primary alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your Verification was successful  </div>';
            return redirect('/bursary/remita/searchA')->with('approvalMsg', $approvalMsg);
           // return redirect('/adminAllPayments')->with('approvalMsg', $approvalMsg);
        // return redirect('adminAllPayments');
    } catch (QueryException $e) {
        $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your Verification was not successful'.$e->getMessage();' </div>';
        return redirect('/bursary/remita/searchA')->with('approvalMsg', $approvalMsg);
        //return redirect('adminAllPayments')->with('approvalMsg', $approvalMsg);
        // return redirect('/newPayment/')->with('mgs',$statusMsg);
    }
}
else {
$loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
return view('admissions.error', compact('loginMsg'));
}
}

    public function searchApplicant()
    {
        $this->authorize('remitaSearch',Remita::class);
        return view('bursary.remita_searchA');
    } //end search

    public function findapplicant(Request $request)
    {

        $this->authorize('remitaSearch',Remita::class);
        $this->validate($request, [
            'data' => 'required|string|max:50',
        ],
            $messages = [
                'data'    => 'Please provide a Remita RRR.',
            ]);
        $rrr = $request->data;
        $remita = Remita::where('rrr',$rrr)->first();
        if($remita){
            $users = $remita->users;
            // $academic = $student->academic;
            $feeType = $remita->feeType;
            return view('bursary.remita_showA',compact('remita','users','feeType'));
        }
        else {
            $error = "Requested Remita record not found. Please check your input or contact ICT.";
            return redirect()->route('remita.search-rrrA')
                ->with('error',$error);
        }
    } // end find rrr


    public function printRRR($id){
        $this->authorize('remitaSearch',Remita::class);
        $remita = Remita::find($id);
        // dd($id);
       if($remita){
            // $response = $remita->verifyRRR();
            // if($response->status == 1) {
                $student = $remita->student;
                $academic = $student->academic;
                $feeType = $remita->feeType;
                $name = Auth::guard('staff')->user()->fullName;
                return view('bursary.remita_print',compact('student','remita','academic','feeType','name'));
            // }
            // else {
            //     $error = "Requested Remita payment details not found. Please Bursary.";
            //     // dd($response);
            //     return redirect()->route('remita.search-rrr')
            //         ->with('error',$error);
            // }
        }
        else {
            $error = "Requested Remita record not found. Please ICT.";
            return redirect()->route('remita.search-rrr')
                ->with('error',$error);
        }

    } // end printRRR


    public function feeTypes()
    {
        // if ($this->hasPriviledge("showFeeType",  session('adminId'))) {
        $this->authorize('remitaFeetype',Remita::class);
        $feeTypes = FeeType::with('paidRemitas')->get();
        return view('admissions.bursary.fee_types',compact('feeTypes'));
    // }
    // else {
    //    $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
    //    return view('admissions.error', compact('loginMsg'));
    // }

    } // end feeType

    public function feeTypesrrr()
    {
        if ($this->hasPriviledge("showFeeType",  session('adminId'))) {
        // $this->authorize('remitaSearch',Remita::class);
        $feeTypes = FeeType::with('paidRemitas')
        ->whereIn('category',[1,2])
        ->get();
        return view('admissions.bursary.fee_typesrrr',compact('feeTypes'));
    }
    else {
       $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
       return view('error', compact('loginMsg'));
    }

    } // end feeType rrr


    public function feeTyperrr($fee_type_id)
    {
        // $this->authorize('remitaSearch',Remita::class);
        $remitas = Remita::with(['feeType','student','student.academic','users'])->where('fee_type_id',$fee_type_id)
        // ->where('status_code',1)
        // $allApplicants = DB::table('remitas')
        //     ->leftJoin('users', 'remitas.user_id', '=', 'users.id')
        //         ->select('users.*','remitas.*')
        //         ->get();

        // $remitas = Remita::with(['feeType'])->where('fee_type_id',$fee_type_id)->where('status_code',1)

        ->orderBy('transaction_date','DESC')->get();
        $sum = $remitas->sum('amount');
        return view('admissions.bursary.remita_lists',compact('remitas','sum'));


    } // verify fee type feeType


    public function feeType($fee_type_id)
    {
        // $this->authorize('remitaSearch',Remita::class);
        $remitas = Remita::with(['feeType','student','student.academic','users'])->where('fee_type_id',$fee_type_id)
        ->where('status_code',1)
        // $allApplicants = DB::table('remitas')
        //     ->leftJoin('users', 'remitas.user_id', '=', 'users.id')
        //         ->select('users.*','remitas.*')
        //         ->get();

        // $remitas = Remita::with(['feeType'])->where('fee_type_id',$fee_type_id)->where('status_code',1)

        ->orderBy('transaction_date','DESC')->get();
        $sum = $remitas->sum('amount');
        return view('admissions.bursary.remita_list',compact('remitas','sum'));


    } // end feeType

    public function findDate(Request $request)
    {
        // $this->authorize('remitaSearch',Remita::class);
        $this->validate($request, [
            'start_date' => 'required|string|max:11',
            'end_date' => 'required|string|max:11',
        ],
            $messages = [
                'start_date'    => 'Please provide a valid start date.',
                'end_date'    => 'Please provide a valid end date.',
            ]);
        $start = $request->start_date; //"2021-10-20";
        $end = $request->end_date; // "2021-10-20";
        $remitas = Remita::with(['feeType','student','student.academic'])->where('transaction_date','>=',$start)->where('transaction_date','<=',$end)
            ->where('status_code',1)->orderBy('transaction_date','DESC')->get();
        $sum = $remitas->sum('amount');
        return view('bursary.remita_list',compact('remitas','sum'));

    } // end findDate

    // public function feeTypes()
    // {
    //     // $this->authorize('remitaSearch',Remita::class);
    //     $feeTypes = FeeType::with('paidRemitas')->get();
    //     return view('bursary.fee_types',compact('feeTypes'));

    // } // end feeType

    // public function feeType($fee_type_id)
    // {
    //     // $this->authorize('remitaSearch',Remita::class);
    //     $remitas = Remita::with(['feeType','student','student.academic'])->where('fee_type_id',$fee_type_id)->where('status_code',1)
    //         ->orderBy('transaction_date','DESC')->get();
    //     $sum = $remitas->sum('amount');
    //     return view('bursary.remita_list',compact('remitas','sum'));


    // } // end feeType

    public function findStudent(Request $request)
    {
        // $this->authorize('remitaSearch',Remita::class);
        $this->validate($request, [
            'data' => 'required|string|max:50',
        ],
            $messages = [
                'data'    => 'Please provide the Matric Number.',
            ]);
        $academic= StudentAcademic::where('student_id', $request->data)->orWhere('mat_no','like', '%'.$request->data.'%')->first();
        // $students = Student::with(['academic'])->where('id', [$request->data])
        // ->orwhere('username',  'like', '%'.$request->data.'%' )
        //     ->paginate(50);
        if($academic){
            $remitas = Remita::with(['feeType','student','student.academic'])->where('student_id',$academic->student_id)->where('status_code',1)
                ->orderBy('transaction_date','DESC')->get();
            $sum = $remitas->sum('amount');
            return view('bursary.remita_list',compact('remitas','sum','academic'));
        }
        else{
            $error = "Student Record not found";
            return redirect()->route('remita.search-rrr')
                ->with('error',$error);
        }
    } // end findStudent
} // end Controller
