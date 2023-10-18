<?php

namespace App\Http\Controllers;

use App\Staff;
use App\Remita;
use App\Session;
use App\Student;
use App\Models\Otp;
use App\Permission;
use App\StudentDebt;
use App\StaffWorkProfile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\RegisteredCourse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\StaffRoleAssignmentLog;
use OwenIt\Auditing\Models\Audit;

class PermissionsController extends Controller
{

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
	    $this->middleware('auth:staff');
	}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('rbac','App\Staff');
        $perm = Permission::orderBy('id','DESC')->paginate(100);
    	return view('/rbac/list-perms',array('perms' => $perm));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('rbac','App\Staff');
    	return view('rbac.create-perm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('rbac','App\Staff');
    	$this->validate($request, [
    	    'name' => 'required|string|max:255|unique:permissions',
    		'description' => 'required|string|max:255',
    	]);
    	$perm = new Permission();
    		$perm->name = $request->name;
    		$perm->description = $request->description;
    		$perm->save();
    	return redirect()->to('/rbac/list-perms')
    	->with('success','New User Permission created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('rbac','App\Staff');
        $perm = Permission::find($id);
    	return view('/rbac/edit-perm',array('perm' => $perm));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('rbac','App\Staff');
        $perm = Permission::find($id);

        //validate unique name
    	if($request->name != $perm->name)
    	{
    		$this->validate($request, [
    				'name' => 'required|string|max:255|unique:permissions',
    		]);
    	} // end valid name



    	$this->validate($request, [
    			'name' => 'required|string|max:255',Rule::unique('permissions')->ignore($perm->name),
    			'description' => 'required|string|max:255',
    	]);
    	$perm->name = $request->name;
    	$perm->description = $request->description;
    	$perm->save();
    	return redirect()->to('/rbac/list-perms')
    	->with('success','User Permission edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete(Request $request)
    {
    	$this->authorize('rbac','App\Staff');
        $perm = Permission::find($request->id);
    	$perm->delete();
    	return redirect()->to('/rbac/list-perms')
    	->with('success','User Permission deleted successfully');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function resetStudentPassword(Request $request)
    {
        //dd("Disabled.");
        //
        $status = "";

        //get all students
        $students = Student::all();


        //start database transaction
        DB::beginTransaction(); //Start transaction!

        // for each student
        foreach ($students as $key => $student)
        {
            // for students 1 - 200
            if ($student->id > 4968 AND $student->id <= 4986)
            {
                //set password to welcome
                $student->password = Hash::make("welcome");

               // save student
                try{
                    $student->save();
                    $status.= $student->id." reset <br />";

                } // end try
                catch(\Exception $e)
                {
                    //failed logic here
                    DB::rollback();
                    //return Response($e);
                    dd($e);
                    return redirect()->to('/rbac/refresh-student-password')
                        ->with('errors',$e);
                }

            } // end if

        } // end foreach

        //commit transaction
        DB::commit();
        //dd($status);

        return redirect()->to('/rbac/refresh-student-password')
            ->with('reset','Data reset completed <br />'.$status);
    }

    public function refreshStudentPassword()
    {
        $this->authorize('rbac','App\Staff');
        return view('/rbac/resetstudentpassword');
    }



    public function audit()
    {
        $this->authorize('rbac','App\Staff');
        $session = new Session();
        $article= \OwenIt\Auditing\Models\Audit::with(['staff'])->orderBy('updated_at','DESC')
        ->paginate(20);
        //->limit(20)
        //->get();
        $modify=RegisteredCourse::with(['staff','sessions'])->where('staff_id', '<>', '', 'and')
        ->whereColumn('old_total', '!=', 'total')
        ->orderBy('updated_at','DESC')
       // ->limit(20)
        ->paginate(20);
       // ->get();
       // dd($article);
       $remita=Remita::with(['staff'])->where('verify_by', '<>', '', 'and')
       ->orderBy('updated_at','DESC')
      // ->limit(20)
       ->paginate(20);
      // ->get();
      $logs=StaffRoleAssignmentLog::with(['staff','assignedBy'])
      ->orderBy('updated_at','DESC')
      ->paginate(20);

        return view('/rbac/audit',['article' => $article, 'modify' =>$modify, 'remita'=>$remita, 'session'=>$session, 'logs'=>$logs]);
    }


    public function findDate(Request $request)
    {
        //dd($request);
        $this->authorize('rbac','App\Staff');
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
        $article = \OwenIt\Auditing\Models\Audit::with(['staff'])->where('updated_at','>=',$start)->where('updated_at','<=',$end)
        ->orderBy('updated_at','ASC')
        ->paginate(2000);
        $modify=RegisteredCourse::with(['staff'])->where('staff_id', '<>', '', 'and')
        ->where('updated_at','>=',$start)->where('updated_at','<=',$end)
        ->whereColumn('old_total', '!=', 'total')
        ->orderBy('updated_at','ASC')
       // ->limit(20)
        ->paginate(2000);
        $remita=Remita::with(['staff'])->where('verify_by', '<>', '', 'and')
        ->where('updated_at','>=',$start)->where('updated_at','<=',$end)
        ->orderBy('updated_at','ASC')
       // ->limit(20)
        ->paginate(2000);
       // ->get();
       $logs=StaffRoleAssignmentLog::with(['staff'])->where('staff_id', '<>', '', 'and')
       ->where('updated_at','>=',$start)->where('updated_at','<=',$end)
       ->orderBy('updated_at','ASC')
      // ->limit(20)
       ->paginate(2000);
        return view('/rbac/audit',['article' => $article, 'modify' =>$modify,'remita'=>$remita, 'logs'=>$logs]);

    }


    public function find(Request $request)
    {

        $this->authorize('rbac','App\Staff');
        $article = \OwenIt\Auditing\Models\Audit::with(['staff'])
        ->where('event', 'like', '%'.$request->data.'%')
        ->orWhere('staff_id', $request->data)
        ->orWhere('auditable_id', 'like', '%'.$request->data.'%')
        ->orWhere('old_values', 'like', '%'.$request->data.'%')
        ->orWhere('user_agent', 'like', '%'.$request->data.'%')
        ->orderBy('updated_at','DESC')
        ->paginate(200);


        if(count($article) > 0)
        {
            $request->session()->flash('message', '');
            // dd($request);
            return redirect()->to('/rbac/auditA');
            //return view('/rbac/audit',['article' => $article, 'modify' =>$modify,'remita'=>$remita, 'logs'=>$logs]);


        }

        else
        {
            //   dd($request);
            $request->session()->flash('message', 'No Matching student record found. Try to search again !');
            view('/rbac/audit',['article' => $article, 'modify' =>$modify,'remita'=>$remita, 'logs'=>$logs]);

        }

    } // end find

    public function list()
    {
        $this->authorize('rbac','App\Staff');
        $session = new Session();
        $article= \OwenIt\Auditing\Models\Audit::with(['staff'])->orderBy('updated_at','DESC')
        ->paginate(200);
        //->limit(20)
        //->get();


        return view('/rbac/audit_list',['article' => $article]);
    }

    public function auditviewall()
    {
        $this->authorize('rbac','App\Staff');
        $session = new Session();

        $modify=RegisteredCourse::with(['staff','sessions'])->where('staff_id', '<>', '', 'and')
        ->whereColumn('old_total', '!=', 'total')
        ->orderBy('updated_at','DESC')
       // ->limit(20)
         ->paginate(10);
    //    ->get();
       // dd($article);
       $remita=Remita::with(['staff'])->where('verify_by', '<>', '', 'and')
       ->orderBy('updated_at','DESC')
    //   ->limit(20)
    //    ->paginate(10);
      ->get();

        return view('/rbac/auditviewall',['modify' =>$modify, 'session'=>$session]);
    }

    public function auditviewallremita()
    {
        $this->authorize('rbac','App\Staff');
        $session = new Session();

       // dd($article);
       $remita=Remita::with(['staff'])->where('verify_by', '<>', '', 'and')
       ->orderBy('updated_at','DESC')
    //   ->limit(20)
    //    ->paginate(10);
      ->get();

        return view('/rbac/auditviewallremita',[ 'remita'=>$remita, 'session'=>$session]);
    }

    public function auditviewallevent()
    {
        $this->authorize('rbac','App\Staff');
        $session = new Session();
        $article= \OwenIt\Auditing\Models\Audit::with(['staff'])->orderBy('updated_at','DESC')
        ->paginate(2000);
        //->limit(20)
        // ->get();



        return view('/rbac/auditviewallevent',['article' => $article, 'session'=>$session]);
    }


    public function auditviewallassigned()
    {
        $this->authorize('rbac','App\Staff');

        $logs=StaffRoleAssignmentLog::with(['staff','assignedBy'])
        ->orderBy('updated_at','DESC')
    //   ->paginate(20);
        //->limit(20)
        ->get();



        return view('/rbac/auditviewallassigned',['logs' => $logs]);
    }

    public function otp()
    {
        $this->authorize('rbac','App\Staff');

        return view('rbac.otp');
    }

    public function otplogin(Request $request)
    {
        $this->authorize('rbac','App\Staff');
        $otp = DB::table('otp')->where('staff_id', $request->staff_id)->first();

        if($otp) {
            if (Hash::check($request->pin, $otp->pin)) {
                // User is authenticated, log them in
                Auth::loginUsingId($otp->staff_id);
                session(['userid' => $otp->id]);
                // dd($otp->staff_id);
                // Redirect to the desired page after login
                return redirect('/rbac/home');
            } else {
                // Invalid OTP entered
                // dd($otp->staff_id);
                return redirect()->back()
                ->with('error','ivalide otp !');
            }
        } else {
            // OTP not found for the given staff_id
            return redirect()->back()
            ->with('error','invalid login detials !');
        }
    }

    public function home()
    {
        $staff = Auth::guard('staff')->user();
        return view('rbac.home',compact('staff'));
    }


    public function auditA()
    {
        $this->authorize('rbac','App\Staff');
        $session = new Session();
        $article= \OwenIt\Auditing\Models\Audit::with(['staff'])->orderBy('updated_at','DESC')
        ->paginate(500);
        //->limit(20)
        //->get();
        $modify=RegisteredCourse::with(['staff','sessions'])->where('staff_id', '<>', '', 'and')
        ->whereColumn('old_total', '!=', 'total')
        ->orderBy('updated_at','DESC')
       // ->limit(20)
        ->paginate(100);
       // ->get();
       // dd($article);
       $remita=Remita::with(['staff'])->where('verify_by', '<>', '', 'and')
       ->orderBy('updated_at','DESC')
      // ->limit(20)
       ->paginate(100);
      // ->get();
      $logs=StaffRoleAssignmentLog::with(['staff','assignedBy'])
      ->orderBy('updated_at','DESC')
      ->paginate(50);

        return view('/rbac/auditA',['article' => $article, 'modify' =>$modify, 'remita'=>$remita, 'session'=>$session, 'logs'=>$logs]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteA(Request $request)
    {
        $this->authorize('rbac','App\Staff');
        $audit = \OwenIt\Auditing\Models\Audit::find($request->id);
    	$audit->delete();
    	return redirect()->to('/rbac/auditA')
    	->with('success','deleted successfully');
   }
   public function destroy(Audit $audit)
{
    $audit->delete();
    return redirect()->to('/rbac/auditA')
    ->with('success','audit log deleted successfully');
}

public function destroyR(StaffRoleAssignmentLog $audit)
{
    $audit->delete();
    return redirect()->to('/rbac/auditA')
    ->with('success','role log deleted successfully');
}

public function otpreset()
{
    $this->authorize('rbac','App\Staff');

    return view('rbac.forgotpasswordSetNew');
}

public function otpresetpin(Request $req)
{
    $this->authorize('rbac','App\Staff');

    if ($req->pin == $req->pin_confirmation) {
        DB::table('otp')->where('id', $req->id)
            ->update([

                'id' => $req->id,
                //Hash::make to encrpty or hash the password
                'pin' => Hash::make($req->pin)
            ]);

        $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Your Password Reset was Successfull</div>';
        return redirect('/rbac/otpreset')->with('signUpMsg', $signUpMsg);
    } else {
        $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Password mismatched</div>';
        return redirect('/rbac/otpreset')->with('signUpMsg', $signUpMsg);
    }
}
}// end class
