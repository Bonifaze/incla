<?php

namespace App\Http\Controllers;

use App\Course;
use App\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    //
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
        // $this->authorize('list',Course::class);
        $courses = Course::with('program')->orderBy('id','DESC')->orderBy('course_code','ASC')->orderBy('program_id','ASC')->paginate(100);
        return view('/courses/list',compact('courses'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Course::class);
        $programs = Program::orderBy('name','ASC')->pluck('name','id');
        return view('courses.create',compact('programs'));
    }

    public function edit($id)
    {
        $this->authorize('edit',Course::class);
        $course = Course::findOrFail($id);
        $programs = Program::orderBy('name','ASC')->pluck('name','id');
        return view('/courses/edit',compact('programs','course'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',Course::class);
        // $this->validate($request, [
        //    'code' => 'required|string|max:255',
        //    'hours' => 'required|integer',
        //    'program_id' => 'required|integer',
        //    'title' => 'required|string|max:255',
        //    'description' => 'required|string|max:255',

        // ]);

        $course = new Course();

        $course->course_code = $request->course_code;
        $course->course_title = $request->course_title;
        $course->program_id = $request->program_id;
        $course->credit_unit = $request->credit_unit;
        // $course->semester = $request->semester;
        // $course->level = $request->level;
        // $course->course_category = $request->course_category;
        // $course->status = 1;
        $course->save();


        return redirect()->route('course.list')
        ->with('success','New Course created successfully');
    }  // end store



    public function update(Request $request, $id)
    {
        $this->authorize('edit',Course::class);
        // $this->validate($request, [
        //     'course_code' => 'required|string|max:255',
        //     'course_unit' => 'required|integer',
        //     'program_id' => 'required|integer',
        //     'course_title' => 'required|string|max:255',
        //     'level' => 'required|integer',
        //     // 'description' => 'required|string|max:255',

        // ]);
        $course = Course::findOrFail($id);
        $course->course_code = $request->course_code;
        $course->course_title = $request->course_title;
        $course->program_id = $request->program_id;
        $course->credit_unit = $request->credit_unit;
        // $course->level = $request->level;
        // $course->status = $request->status;
        $course->save();
        return redirect()->route('course.list')
        ->with('success','Course edited successfully');
    } // end update


    public function delete(Request $request)
    {
        $this->authorize('delete',Course::class);
        $course = Course::find($request->id);
        $course->delete();
        return redirect()->route('course.list');
    }


    public function search()
    {
        $this->authorize('search',Course::class);
        $programs = Program::orderBy('name','ASC')->orderBy('id','DESC')->pluck('name','id');
        return view('courses.search', compact('programs'));
    }

    public function find(Request $request)
    {
        $this->authorize('search',Course::class);
        $courses = Course::with('program')
        ->where('course_code', 'like', '%'.$request->data.'%')
        ->orWhere('course_title', 'like', '%'.$request->data.'%')
        ->orderBy('id','DESC')->orderBy('course_code','ASC')->orderBy('program_id','ASC')->paginate(100);

        if(count($courses) > 0)
        {
            $request->session()->flash('message', '');
            return view('courses.list',compact('courses'));
        }
        else
        {
            $request->session()->flash('message', 'No Matching course found. Try to search again !');
            return view ('courses.list', compact('courses'));
        }

    } // end find


    public function programList(Request $request)
    {
        $this->authorize('programList',Course::class);
        $courses = Course::with('program')->where('program_id',$request->program)
          ->orderBy('id','DESC')->orderBy('course_code','ASC')
          ->paginate(100);
        return view('courses.list',compact('courses'));

    } // programList


    /**
     * AJAX Functions
     *
     *
     */

    public function getCourses(Request $request)
    {
       if($request->ajax())
        // {
        // $courses = Course::with('program')->where('program_id',$request->program_id)
        // ->orderBy('credit_unit','DESC')->orderBy('course_code','ASC')
        // ->get()->pluck('course_title','id');
        // return Response($courses);
        // }
        {
            $courses = DB::table('courses')->where('program_id', $request->program_id)
            ->get();
            return Response($courses);
        }
    }

    public function getCourseHours(Request $request)
    {
        if($request->ajax())
        {
            $course = Course::findOrFail($request->course_id);
            return Response($course->credit_unit);
        }
    }



} // end class
