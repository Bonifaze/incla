<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StaffWorkProfile;
use App\Staff;
use App\StaffPosition;
use App\EmploymentType;
use App\AdminDepartment;


class StaffWorkProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:staff');
    }
    
    public function edit($id)
    {
        $this->authorize('edit', Staff::class);
        $work = StaffWorkProfile::findOrFail($id);
        $staff = Staff::findOrFail($work->staff_id);
        $positions = StaffPosition::orderBy('name','ASC')->pluck('name','id');
        $employment_types = EmploymentType::orderBy('name','ASC')->pluck('name','id');
        $employment_types->forget('1');
        $departments = AdminDepartment::orderBy('name','ASC')->pluck('name','id');
       
        return view('staff.work.edit',compact('work','staff','positions', 'employment_types','departments'));
    } // edit
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
           // work information
            'staff_no' => 'required|string|max:50',
            'staff_position_id' => 'required|integer',
            'staff_type_id' => 'required|string|max:20',
            'employment_type_id' => 'required|integer',
            'admin_department_id' => 'required|integer',
            'grade_id' => 'required|string|max:100',
            'assumption_date' => 'required|string|max:50',
            'appointment_date' => 'required|string|max:50',
        ]);
        $work = StaffWorkProfile::findOrFail($id);
        $staff = Staff::findOrFail($work->staff_id);
        $work->staff_no = $request->staff_no;
        $work->staff_position_id = $request->staff_position_id;
        $work->staff_type_id = $request->staff_type_id;
        $work->employment_type_id = $request->employment_type_id;
        $work->admin_department_id = $request->admin_department_id;
        $work->grade_id = $request->grade_id;
        $work->appointment_date = $request->appointment_date;
        $work->assumption_date = $request->assumption_date;
        $work->last_promotion_date = $request->last_promotion_date;
        try{
            $work->save();
        } // end try
        catch(\Exception $e)
        {
            $request->session()->flash('error', 'Error updating Staff Work Profile ! <br />');
            return redirect()->route('staff-work.edit', $work->id);
        }
        return redirect()->route('staff.show', $staff->id)
        ->with('success','Staff Work Profile edited successfully');
        
    } // end update
    
    
} // end
