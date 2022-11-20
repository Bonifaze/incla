<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StaffContact;
use App\Staff;

class StaffContactsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:staff');
    }
    
    public function edit($id)
    {
        $this->authorize('edit', Staff::class);
        $contact = StaffContact::findOrFail($id);
        $staff = Staff::findOrFail($contact->staff_id);
        return view('staff.contact.edit',compact('contact','staff'));
    } // edit
    
    
    public function update(Request $request, $id)
    {
        $this->authorize('edit', Staff::class);
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'sometimes|nullable|string|email|max:100',
            'relationship' => 'required|string|max:50',
            'state' => 'required|string|max:100',
            'address' => 'required|string|max:200',
        ]);
        $contact = StaffContact::findOrFail($id);
        $staff = Staff::findOrFail($contact->staff_id);
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->relationship = $request->relationship;
        $contact->state = $request->state;
        $contact->address = $request->address;
        try{
            $contact->save();
        } // end try
        catch(\Exception $e)
        {
            $request->session()->flash('error', 'Error updating Staff Contact ! <br />');
            return redirect()->route('staff-contact.edit', $contact->id);
        }
        return redirect()->route('staff.show', $staff->id)
        ->with('success','Staff Contact edited successfully');
    } // end update

} // end class
