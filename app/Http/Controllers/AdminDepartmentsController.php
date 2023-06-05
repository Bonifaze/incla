<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminDepartment;
use App\AcademicDepartment;
use App\Staff;

class AdminDepartmentsController extends Controller
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

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('list',AdminDepartment::class);
        $departments = AdminDepartment::with(['parent','academic'])->orderBy('status','ASC')->orderBy('name','ASC')->paginate(40);
        return view('admins.departments.list',compact('departments'));
    }


    public function create()
    {
        $this->authorize('create',AdminDepartment::class);
        $admins = AdminDepartment::orderBy('name','ASC')->pluck('name','id');
        $academics = AcademicDepartment::orderBy('name','ASC')->pluck('name','id');
        $academics->prepend('Non Academic',0);
        $staff = Staff::orderBy('surname','ASC')->get()->pluck('full_name','id');
        return view('admins.departments.create', compact('admins','academics', 'staff'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',AdminDepartment::class);
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'academic_department_id' => 'required|integer',
            'parent_id' => 'required|integer',
            'hod_id' => 'required|integer',
        ]);
        $department = new AdminDepartment();
        $department->name = $request->name;
        $department->academic_department_id = $request->academic_department_id;
        $department->parent_id = $request->parent_id;
        $department->hod_id = $request->hod_id;
        $department->status = 1;

        try{
            $department->save();
        } // end try
        catch(\Exception $e)
        {
            $request->session()->flash('error', 'Error creating Admin Department ! <br />');
            return redirect()->route('admin.department.create');
        }

        return redirect()->route('admin.department.list')
        ->with('success','New Admin Department created successfully');
    }  // end store



    public function edit($id)
    {
        $this->authorize('edit',AdminDepartment::class);
        $department = AdminDepartment::findOrFail($id);
        $admins = AdminDepartment::orderBy('name','ASC')->pluck('name','id');
        $academics = AcademicDepartment::orderBy('name','ASC')->pluck('name','id');
        $academics->prepend('Non Academic',0);
        $staff = Staff::orderBy('surname','ASC')->get()->pluck('full_name','id');
        return view('admins.departments.edit', compact('department','admins','academics', 'staff'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('edit',AdminDepartment::class);
        $this->validate($request, [
               'name' => 'required|string|max:255',
               'academic_department_id' => 'required|integer',
               'parent_id' => 'required|integer',
               'hod_id' => 'required|integer',
               'status' => 'required|integer',
        ]);
        $department = AdminDepartment::findOrFail($id);
        $department->name = $request->name;
        $department->academic_department_id = $request->academic_department_id;
        $department->parent_id = $request->parent_id;
        $department->hod_id = $request->hod_id;
        $department->status = $request->status;

        try{
            $department->save();
        } // end try
        catch(\Exception $e)
        {
            $request->session()->flash('error', 'Error updating Admin Department ! <br />');
            return redirect()->route('admin.department.list');
        }
        return redirect()->route('admin.department.list')
        ->with('success','Admin Department updated successfully');
    }  // end update

    public function delete(Request $request)
    {
        //
        $this->authorize('delete',AdminDepartment::class);
        $department = AdminDepartment::findOrFail($request->id);

        //check if for database constraint.
        if($department->academic()->exists())
        {
            $request->session()->flash('error', 'Error deleting Department. Academic Department exist under this Admin Department !');
            return redirect()->route('admin.department.list');
        }

        try{
            $department->delete();
        } // end try
        catch(\Exception $e)
        {
            $request->session()->flash('error', 'Error deleting Department !');
            return redirect()->route('admin.department.list');
        }
        return redirect()->route('admin.department.list')
        ->with('success','Department deleted successfully');

    } // end delete


    public function staffList($dept_id)
    {
        $this->authorize('list',AdminDepartment::class);
        $department = AdminDepartment::findOrFail($dept_id);
        $staff = Staff::with('workProfile')
            ->whereHas('workProfile',function($q) use ($dept_id)
    {
        $q->where('admin_department_id',$dept_id)
        // ->where('staff_type_id',1)
        ;
    })
        ->where('status',1)
            ->orderBy('surname','ASC')->paginate(100);
        return view('staff.admin.list',compact('staff'));
    }






} // end class
