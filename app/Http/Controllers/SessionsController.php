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



} // end class
