<?php

namespace App\Http\Controllers;

use App\Staff;
use App\Remita;
use App\Session;
use App\Student;
use App\Permission;
use App\StudentDebt;
use App\StaffWorkProfile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\RegisteredCourse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        // $this->authorize('rbac','App\Staff');
        $session = new Session();
        $article= \OwenIt\Auditing\Models\Audit::with(['staff'])->orderBy('updated_at','DESC')
        ->paginate(5);
        //->limit(20)
        //->get();
        $modify=RegisteredCourse::with(['staff','sessions'])->where('staff_id', '<>', '', 'and')
        ->orderBy('updated_at','DESC')
       // ->limit(20)
        ->paginate(10);
       // ->get();
       // dd($article);
       $remita=Remita::with(['staff'])->where('verify_by', '<>', '', 'and')
       ->orderBy('updated_at','DESC')
      // ->limit(20)
       ->paginate(10);
      // ->get();

        return view('/rbac/audit',['article' => $article, 'modify' =>$modify, 'remita'=>$remita, 'session'=>$session]);
    }


    public function findDate(Request $request)
    {
        //dd($request);
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
        $article = \OwenIt\Auditing\Models\Audit::with(['staff'])->where('updated_at','>=',$start)->where('updated_at','<=',$end)
        ->orderBy('updated_at','ASC')
        ->paginate(200);
        $modify=RegisteredCourse::with(['staff'])->where('staff_id', '<>', '', 'and')
        ->where('updated_at','>=',$start)->where('updated_at','<=',$end)
        ->orderBy('updated_at','ASC')
       // ->limit(20)
        ->paginate(200);
        $remita=Remita::with(['staff'])->where('verify_by', '<>', '', 'and')
        ->where('updated_at','>=',$start)->where('updated_at','<=',$end)
        ->orderBy('updated_at','ASC')
       // ->limit(20)
        ->paginate(200);
       // ->get();
        return view('/rbac/audit',['article' => $article, 'modify' =>$modify,'remita'=>$remita]);

    }


    public function find(Request $request)
    {

    //    $this->authorize('search', Student::class);
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
            view('/rbac/audit_list',['article' => $article]);

        }

        else
        {
            //   dd($request);
            $request->session()->flash('message', 'No Matching student record found. Try to search again !');
            view('/rbac/audit',['article' => $article, 'modify' =>$modify,'remita'=>$remita]);

        }

    } // end find

    public function list()
    {
        // $this->authorize('rbac','App\Staff');
        $session = new Session();
        $article= \OwenIt\Auditing\Models\Audit::with(['staff'])->orderBy('updated_at','DESC')
        ->paginate(200);
        //->limit(20)
        //->get();


        return view('/rbac/audit_list',['article' => $article]);
    }






}// end class
