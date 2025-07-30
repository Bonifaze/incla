<?php

namespace App\Http\Controllers;

use App\Session;
use Illuminate\Http\Request;
use App\Models\admissionType;
use App\Models\BursarySession;
use App\Models\admissionSession;
use Illuminate\Support\Facades\DB;
use App\Models\CourseRegistrations;

class SessionsController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth:staff');
        //$this->middleware('auth:student');
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */


     public function create()
{
    $this->authorize('list', Session::class);
    $text ="Create Session";

    return view('/sessions/create', compact('text'));
}
public function store(Request $request)
    {
        $this->authorize('list', Session::class);
    	$this->validate($request, [
    	    'name' => 'required|string|max:255|unique:permissions',

    	]);
    	$create = new Session();
    		$create->name = $request->name;
    		$create->start_date = $request->start_date;
            $create->end_date = $request->end_date;
    		$create->save();
    	return redirect()->to('/sessions/list')
    	->with('success','New Academic Session created successfully');
    }


    public function index()
    {
        $this->authorize('list', Session::class);
        $sessions = Session::orderBy('id','DESC')->paginate(20);
        return view('/sessions/list',compact('sessions'));
    }

    public function setCurrent(Request $request)
    {
        $this->authorize('setCurrent', Session::class);
        $this->validate($request, [
            'id' => 'required|integer',
        ]);
        $session = Session::findOrFail($request->id);
        $session->status = 1;
        $current  = Session::where('status',1)->first();
        $current->status = 0;
        DB::beginTransaction(); //Start transaction!
        try {
            $current->save();
            $session->save();
        }
        catch(\Exception $e)
        {
            //failed logic here
            DB::rollback();
            return redirect()->route('session.list')
                ->with('error',"Errors updating Session. <br />".$e);
        }
        DB::commit();
        return redirect()->route('session.list')
            ->with('success',$session->name.' set as active successfully');
  } // end setCurrent

  public function edit($id)
  {
      $this->authorize('edit',session::class);
      $courseReg = CourseRegistrations::orderBy('id','DESC')->paginate(20);
      $sessions = Session::findOrFail($id);


      return view('sessions/edit',compact('sessions', 'courseReg'));
  }

  public function update(Request $request, $id)
    {
        //
        $this->authorize('edit',Session::class);
        $this->validate($request, [

            'name' => 'required|string|max:255',


        ]);

        $sessions = Session::findOrFail($id);

        $sessions->name = $request->name;
        $sessions->semester = $request->semester;

        try{
            $sessions->save();
        } // end try
        catch(\Exception $e)
        {
            $request->session()->flash('error', 'Error updating Session !');

            return redirect()->route('session.edit', $id);

        }

        return redirect()->route('session.list')
        ->with('success','Session edited successfully');
    }  // end update


// THIS PART OF THE CODE IS FOR ADMISSION SESSION

public function indexAdmission()
{
    $this->authorize('list', Session::class);
    $sessions = admissionSession::orderBy('id','DESC')->paginate(20);
    return view('/sessions/listAdmission',compact('sessions'));
}

public function createAdmission()
{
    $this->authorize('list', Session::class);
    $text ="Create Admission Session";

    return view('/sessions/createAdmission', compact('text'));
}
public function storeAdmission(Request $request)
    {
        $this->authorize('list', Session::class);
    	$this->validate($request, [
    	    'name' => 'required|string|max:255|unique:permissions',

    	]);
    	$create = new admissionSession();
    		$create->name = $request->name;
    		$create->start_date = $request->start_date;
            $create->end_date = $request->end_date;
    		$create->save();
    	return redirect()->to('/Admissionsessions/list')
    	->with('success','New Academic Session created successfully');
    }


    public function updateAdmission(Request $request, $id)
    {

        $this->authorize('edit',Session::class);
        $this->validate($request, [

            'name' => 'required|string|max:255',


        ]);

        $sessions = admissionSession::findOrFail($id);

        $sessions->name = $request->name;


        try{
            $sessions->save();
        } // end try
        catch(\Exception $e)
        {
            $request->session()->flash('error', 'Error updating Session !');

            return redirect()->route('session.edit', $id);

        }

        return redirect()->route('session.listAdmission')
        ->with('success','Session edited successfully');
    }  // end update

    public function editAdmission($id)
    {
        $this->authorize('edit',session::class);
        $sessions = admissionSession::findOrFail($id);
         $admission = admissionType::orderBy('id','DESC')->paginate(20);

        return view('sessions/editAdmission',compact('sessions','admission'));
    }

    public function setCurrentAdmission(Request $request)
    {
        $this->authorize('setCurrent', Session::class);
        $this->validate($request, [
            'id' => 'required|integer',
        ]);
        $session = admissionSession::findOrFail($request->id);
        $session->status = 1;
        $current  = admissionSession::where('status',1)->first();
        $current->status = 0;
        DB::beginTransaction(); //Start transaction!
        try {
            $current->save();
            $session->save();
        }
        catch(\Exception $e)
        {
            //failed logic here
            DB::rollback();
            return redirect()->route('session.listAdmission')
                ->with('error',"Errors updating Session. <br />".$e);
        }
        DB::commit();
        return redirect()->route('session.listAdmission')
            ->with('success',$session->name.' set as active successfully');
  } // end setCurrent

  public function openAdmissionType(Request $request)
  {

      $this->validate($request, [
          'id' => 'required|integer',
      ]);
      $session = admissionType::findOrFail($request->id);
      $session->status = 1;

      DB::beginTransaction(); //Start transaction!
      try {
          $session->save();
      }
      catch(\Exception $e)
      {
          //failed logic here
          DB::rollback();
          return redirect()->back()
              ->with('error',"Errors . <br />".$e);
      }
      DB::commit();
      return redirect()->back()
          ->with('success',$session->name.' Admission is Open successfully');
} //

public function closeAdmissionType(Request $request)
{

    $this->validate($request, [
        'id' => 'required|integer',
    ]);
    $session = admissionType::findOrFail($request->id);
    $session->status = 0;

    DB::beginTransaction(); //Start transaction!
    try {
        $session->save();
    }
    catch(\Exception $e)
    {
        //failed logic here
        DB::rollback();
        return redirect()->back()
            ->with('error',"Errors . <br />".$e);
    }
    DB::commit();
    return redirect()->back()
        ->with('success',$session->name.' Admission is close successfully');
} //

public function setCourseReg(Request $request)
{
    $this->authorize('setCurrent', Session::class);
    $this->validate($request, [
        'id' => 'required|integer',
    ]);
    $session = CourseRegistrations::findOrFail($request->id);
    $session->status = 1;
    $current  = CourseRegistrations::where('status',1)->first();
    $current->status = 0;
    DB::beginTransaction(); //Start transaction!
    try {
        $current->save();
        $session->save();
    }
    catch(\Exception $e)
    {
        //failed logic here
        DB::rollback();
        return redirect()->back()
            ->with('error',"Errors updating Session. <br />".$e);
    }
    DB::commit();
    return redirect()->back()
        ->with('success',$session->name.' set as active successfully');
} // end setCurrent
//END OF ADMISISON SESSION


//BURSARY SESSION

// THIS PART OF THE CODE IS FOR ADMISSION SESSION

public function indexBursary()
{
    $this->authorize('list', Session::class);
    $sessions = BursarySession::orderBy('id','DESC')->paginate(20);
    return view('/sessions/listBursary',compact('sessions'));
}

public function createBursary()
{
    $this->authorize('list', Session::class);
    $text ="Create Bursary Session";

    return view('/sessions/createBursary', compact('text'));
}
public function storeBursary(Request $request)
    {
        $this->authorize('list', Session::class);
    	$this->validate($request, [
    	    'name' => 'required|string|max:255|unique:permissions',

    	]);
    	$create = new BursarySession();
    		$create->name = $request->name;
    		$create->start_date = $request->start_date;
            $create->end_date = $request->end_date;
    		$create->save();
            // dd($create->save());

    	return redirect()->to('/Bursarysessions/list')
    	->with('success','New Bursary Session created successfully');
    }


    public function updateBursary(Request $request, $id)
    {

        $this->authorize('edit',Session::class);
        $this->validate($request, [

            'name' => 'required|string|max:255',


        ]);

        $sessions = BursarySession::findOrFail($id);

        $sessions->name = $request->name;


        try{
            $sessions->save();
        } // end try
        catch(\Exception $e)
        {
            $request->session()->flash('error', 'Error updating Session !');

            return redirect()->route('session.edit', $id);

        }

        return redirect()->back()
        ->with('success','Session edited successfully');
    }  // end update

    public function editBursary($id)
    {
        $this->authorize('edit',session::class);
        $sessions = BursarySession::findOrFail($id);

        return view('sessions/editBursary',compact('sessions'));
    }

    public function setCurrentBursary(Request $request)
    {
        $this->authorize('setCurrent', Session::class);
        $this->validate($request, [
            'id' => 'required|integer',
        ]);
        $session = BursarySession::findOrFail($request->id);
        $session->status = 1;
        $current  = BursarySession::where('status',1)->first();
        $current->status = 0;
        DB::beginTransaction(); //Start transaction!
        try {
            $current->save();
            $session->save();
        }
        catch(\Exception $e)
        {
            //failed logic here
            DB::rollback();
            return redirect()->route('session.listBursary')
                ->with('error',"Errors updating Session. <br />".$e);
        }
        DB::commit();
        return redirect()->route('session.listBursary')
            ->with('success',$session->name.' set as active successfully');
  } // end setCurrent




} // end class
