<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\StudentContact;

class StudentContactsController extends Controller
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

    public function edit($id)
    {
        $this->authorize('edit', Student::class);
        $contact = StudentContact::findOrFail($id);
        return view('students.admin.contact.edit',compact('contact'));
    } // end edit


    public function update(Request $request, $id)
    {
        $this->authorize('edit', Student::class);
        $this->validate($request, [
            'surname' => 'required|string|max:100',
            // 'other_names' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            // 'email' => 'sometimes|nullable|string|email|max:100',
            'title' => 'required|string|max:50',
            'relationship' => 'required|string|max:50',
            // 'state' => 'required|string|max:100',
            // 'address' => 'required|string|max:200',
        ]);

        // emergency contacts or sponsor
        $contact = StudentContact::findOrFail($id);
        $contact->surname = $request->surname;
        $contact->other_names = $request->other_names;
        $contact->phone = $request->phone;
        $contact->phone_2 = $request->phone_2;
        $contact->email = $request->email;
        $contact->title = $request->title;
        $contact->relationship = $request->relationship;
        $contact->state = $request->state;
        $contact->city = $request->city;
        $contact->address = $request->address;

        try {
            $contact->save();
        } // end try
        catch(\Exception $e)
        {
            //failed logic here
            return redirect()->route('student-contact.edit',$id)
            ->with('error',"Errors in updating Student contact.");
        }
        return redirect()->route('student.show', $contact->student_id)
        ->with('success','Student Contact updated successfully');
    } //end update

} // end Class
