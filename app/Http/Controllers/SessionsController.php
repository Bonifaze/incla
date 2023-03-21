<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;
use Illuminate\Support\Facades\DB;

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
     */
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
      $sessions = Session::findOrFail($id);

      return view('sessions/edit',compact('sessions'));
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



} // end class
