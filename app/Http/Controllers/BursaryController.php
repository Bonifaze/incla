<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Payment;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentDebtsImport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\StudentAcademic;
use App\StudentDebt;

class BursaryController extends Controller
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


    public function upload()
    {
        $this->authorize('upload',StudentDebt::class);
        return view('bursary.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('upload',StudentDebt::class);
        $this->validate($request, [
            'excel' => 'required|max:4000',
        ]);
      $update = "";
      $status = "";
       //get file extension
        $extension = pathinfo($request->excel->getClientOriginalName(), PATHINFO_EXTENSION);
        //check file format
        if ($extension== "xlsx" AND $request->excel->getMimeType() == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
        {
           // Using maatwebsite plugin, convert excel sheet to array
            $rows = Excel::toArray(new StudentDebtsImport, request()->file('excel'));
            //row[0]; sheet 1
            //row[0][0]; sheet 1, row 1
            //row[0][3][4]; sheet 1, row 4, column 5
            $num = count($rows[0]);
            $str = "";
            $staff = Auth::guard('staff')->user()->id;

            DB::beginTransaction(); //Start transaction!

            // row 0 means first sheet
            // r  0, 1 and 2 are for headers
            for ($r = 3; $r < $num; $r++) {
                $matric_no = $rows[0][$r][13];
                //$tuition = $rows[0][$r][25];
                $debt = $rows[0][$r][28];
                //dd("mat: ".$matric_no." debt:".$debt);
                if($debt === NULL or $debt < 0)
                {
                    $debt = 0;
                }

                if($matric_no != NULL)
                {

                if($academic = StudentAcademic::with('student')->where('mat_no',$matric_no)->get()->first())
                {
                    if($student_debt = StudentDebt::where('student_id',$academic->student->id)->get()->first())
                      {
                $student_debt->debt = $debt;
                $student_debt->modified_by = $staff;

                try{
                    $student_debt->save();
                    $update .= $academic->mat_no." debt updated to ".$debt."<br />";
                    //$status .= $academic->mat_no." - Tuition: ".$tuition." <br />";
                } // end try
                catch(\Exception $e)
                {
                    //failed logic here
                    DB::rollback();

                    return redirect()->route('bursary.upload')
                    ->with('errors',$e);
                }

                      } //if student_debt

                } //if academic is found

                } // if matric is null

            } // end for

            DB::commit();
            return redirect()->route('bursary.upload')
            ->with('success','Uploaded Students debt successfully <br />'.$update);


        } // check file name

        else {
            return redirect()->route('bursary.upload')
            ->with('fileError',"The file format is not correct. <br /> This is not the approved template or it has been changed from the original format.");
        }


    } // end import



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function oldImport(Request $request)
    {
        $this->authorize('upload',StudentDebt::class);
        $this->validate($request, [
            'excel' => 'required|max:2000',
         ]);
        $update = "";
        $status = "";
        //get file extension
        $extension = pathinfo($request->excel->getClientOriginalName(), PATHINFO_EXTENSION);

        //check file format
        if ($extension== "xlsx" AND $request->excel->getMimeType() == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
        {
            // Using maatwebsite plugin, convert excel sheet to array
            $rows = Excel::toArray(new StudentDebtsImport, request()->file('excel'));
            //row[0]; sheet 1
            //row[0][0]; sheet 1, row 1
            //row[0][3][4]; sheet 1, row 4, column 5
            $num = count($rows[0]);
            $str = "";
            $staff = Auth::guard('staff')->user()->id;

            DB::beginTransaction(); //Start transaction!

            // row 0 means first sheet
            // r  0, 1 and 2 are for headers
            for ($r = 3; $r < $num; $r++) {
                $surname = $rows[0][$r][0];
                $first_name = $rows[0][$r][1];
                $middle_name = $rows[0][$r][2];
                $matric_no = $rows[0][$r][3];
                //$student_id = $rows[0][$r][14];
                //$tuition = $rows[0][$r][15];
                $debt = $rows[0][$r][4];

                if($debt === NULL or $debt < 0)
                {
                    $debt = 0;
                }

                if($matric_no != NULL)
                {
                    if($academic = StudentAcademic::with('student')->where('mat_no',$matric_no)->get()->first())
                    {
                        if($student_debt = StudentDebt::where('student_id',$academic->student->id)->get()->first())
                        {
                            $student_debt->debt = $debt;
                            $student_debt->modified_by = $staff;

                            try{
                                $student_debt->save();
                                $update .= $academic->mat_no." debt updated to ".$debt."<br />";
                               // $status .= $academic->mat_no." - Tuition: ".$tuition." <br />";
                            } // end try
                            catch(\Exception $e)
                            {
                                //failed logic here
                                DB::rollback();
                                //return Response($e);

                                return redirect()->route('bursary.upload')
                                ->with('errors',$e);
                            }
                        } //if student_debt
                    } //if academic is found
                } // if matric is null

            } // end for

            DB::commit();
            return redirect()->route('bursary.upload')
            ->with('success','Uploaded Students old debt successfully <br />'.$update);

        } // check file name

        else {
            return redirect()->route('bursary.upload')
            ->with('fileError',"The file format is not correct. <br /> This is not the approved template or it has been changed from the original format.");
        }
    } // end import


    public function search()
    {
        $this->authorize('search',StudentDebt::class);
        return view('bursary.search');
    } //end search


    public function find(Request $request)
    {

        $this->authorize('search',StudentDebt::class);
        $this->validate($request, [
            'data' => 'required|string|max:50',
        ],

            $messages = [
                'data'    => 'Please provide the students ID or Matric Number.',
            ]);

        $academics = StudentAcademic::where('student_id', $request->data)
            ->orWhere('mat_no', 'like', '%'.$request->data.'%')
            ->paginate(50);

        // $academics = Student::with(['academic'])->where('id', [$request->data])
        //     ->orwhere('username',  'like', '%'.$request->data.'%' )
        //         ->paginate(50);
         $students = collect();
        if(count($academics) > 0)
        {
            foreach($academics as $key => $academic)
            {
                $students->add($academic->student);
            }
            $request->session()->flash('message', '');
            return view('bursary.list_students',compact('students'));
        }

        else
        {
            $request->session()->flash('message', 'No Matching student record found. Try to search again !');
            return view ('bursary.search');
        }

    } // end find matric
    


} // end Bursary Controller Class
