<?php

namespace App\Http\Controllers;

use App\Remita;
use App\FeeType;
use App\Program;
use App\Session;
use App\programs;
use App\subjects;
use Carbon\Carbon;
use App\Models\Course;
use App\Models\fee_types;
use App\Mail\Confirmsignup;
use App\Models\StaffCourse;
use App\Models\GradeSetting;
use Illuminate\Http\Request;
use App\Models\RegisteredCourse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\SemesterRemarkCourses;
use App\Computations\ResultComputation;
use App\Exports\RegisteredCourseExport;
use App\Imports\RegisteredCourseImport;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
  //
  public function authorize()
  {
      return true;
  }

    protected $resultComputation;

    public function __construct(ResultComputation $resultComputation)
    {
        $this->middleware('auth:staff');
        $this->resultComputation = $resultComputation;
    }

    public function courseUpload()
    {
    $staff = Auth::guard('staff')->user();
        // if ($this->hasPriviledge("allApplicants",   $staff->id)) {

        // $staff_courses = StaffCourse::where('session_id', $this->getCurrentSession());

        $staff_courses = StaffCourse::distinct()->where('session_id', $this->getCurrentSession())->where('staff_id', $staff->id )
        ->leftJoin('courses', 'staff_courses.course_id', '=', 'courses.id')
        ->distinct()
        ->select('staff_courses.*','courses.course_title', 'courses.course_code')
        ->orderBy('course_code', 'ASC')

        ->get();
        // dd($staff_courses);
        // ->where('staff_id', $staff->id )
        // ->select('staff_courses.*')
        // ->get();
        return view('results.course_upload', ['staff_courses' => $staff_courses]);
    // } else {
    //     $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
    //    return view('admissions.error', compact('loginMsg'));
    // }
    }

    public function scoresupload($staff_course_id)
    {
        $staff = Auth::guard('staff')->user();
        // if ($this->hasPriviledge("allApplicants",   $staff->id)) {

        $course = StaffCourse::where('id', $staff_course_id)->first();
        $student_registered_courses = RegisteredCourse::where('course_id', $course->course_id)
       // ->where('level', $course->level)
        ->where('session', $course->session_id)
        ->where('program_id', $course->program_id)
        ->orderBy('student_id', 'ASC')
        ->get();
        return view('results.scores_upload', ['student_registered_courses' => $student_registered_courses, 'course' => $course]);
    // } else {
    //     $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
    //    return view('admissions.error', compact('loginMsg'));
    // }
    }

    public function downloadResultCsv($staff_course_id)
    {
        //dd($staff_course_id);
        $course = StaffCourse::where('id', $staff_course_id)->first();
        return Excel::download(new RegisteredCourseExport(new RegisteredCourse, $course->session_id, $course->course_id, $course->program_id), $course->course_title.'_sheet.csv');
    }

    public function uploadResultCsv(Request $request)
    {
        $request->validate(['file' => 'required']);

        Excel::import(new RegisteredCourseImport, $request->file);
        return back()->with('success', 'Scores Uploaded!');
    }

    public function uploadScores(Request $request)
    {
        // dd($request);
        $reg_ids = $request->reg_ids;
        $ca1_scores = $request->ca1_scores;
        $ca2_scores = $request->ca2_scores;
        $ca3_scores = $request->ca3_scores;
        $exam_scores = $request->exam_scores;

        for ($i=0; $i < count($reg_ids); $i++) {
            $total_score = $ca1_scores[$i] + $ca2_scores[$i] + $ca3_scores[$i] + $exam_scores[$i];
            $grade_setting = GradeSetting::where('min_score', '<=', $total_score)->where('max_score', '>=', $total_score)->first();
            $grade_id = $grade_setting->id;
            $course_reg = RegisteredCourse::find($reg_ids[$i]);
            if ($ca1_scores[$i] > 10 || $ca2_scores[$i] > 10 || $ca3_scores[$i] > 10)
            {
                return redirect()->back()->withErrors(['error' => 'CA score cannot be more than 30']);
            }
            if ($exam_scores[$i] > 70)
            {
                return redirect()->back()->withErrors(['error' => 'Exam score cannot be more than 70']);
            }
            if ($grade_setting->status == 'fail')
            {

                SemesterRemarkCourses::create([
                    'student_id' => $course_reg->student_id,
                    'course_id' => $course_reg->course_id,
                    // Add more fields and their values as needed
                ]);

            }else{
                SemesterRemarkCourses::where('student_id', $course_reg->student_id)
                ->where('course_id', $course_reg->course_id)
                ->delete();
            }

            RegisteredCourse::where('id', $reg_ids[$i])->update([
                'ca1_score' => $ca1_scores[$i],
                'ca2_score' => $ca2_scores[$i],
                'ca3_score' => $ca3_scores[$i],
                'exam_score' => $exam_scores[$i],
                'total' => $total_score,
                'grade_id' => $grade_id,
                'grade_status' => $grade_setting->status,
                'status' => 'unpublished'
            ]);
        }
        StaffCourse::where('id', $request->course_id)->update([
            'upload_status' => 'uploaded',
            'hod_approval' => 'pending'
        ]);
        return redirect()->back()->with('success', 'Scores uploaded successfully');
    }

    public function approveScores()
    {
        $staff = Auth::guard('staff')->user();
        // if ($this->hasPriviledge("approveScores",  $staff->id)) {
            $this->authorize('approveScores',Student::class);

        $staff_courses = StaffCourse::where('upload_status', 'uploaded')->where('session_id', $this->getCurrentSession())->orderBy('updated_at', 'DESC')->get();
        return view('results.approve_scores', ['staff_courses' => $staff_courses]);
    // } else {
    //     $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
    //    return view('admissions.error', compact('loginMsg'));
    // }
    }


    public function staffScoresresult()
    {
        $staff = Auth::guard('staff')->user();

        $staff_courses = StaffCourse::where('upload_status', 'uploaded')->where('staff_id', $staff->id )->where('session_id', $this->getCurrentSession())->orderBy('updated_at', 'DESC')->get();

        return view('results.staff_scoresresult', ['staff_courses' => $staff_courses]);

    }

    public function notuploadedScores()
    {
        $staff = Auth::guard('staff')->user();
        // if ($this->hasPriviledge("approveScores",  $staff->id)) {
            $this->authorize('approveScores',Student::class);

        $staff_courses = StaffCourse::where('upload_status', 'not uploaded')->where('session_id', $this->getCurrentSession())->get();
        return view('results.notuploaded_scores', ['staff_courses' => $staff_courses]);
  // } else {
    //     $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
    //    return view('admissions.error', compact('loginMsg'));
    // }
    }

    public function viewScores($course_id)
    {
        $course = StaffCourse::where('course_id', $course_id)->first();
        $student_registered_courses = RegisteredCourse::where('course_id', $course_id)
        ->where('level', $course->level)
        ->where('session', $this->getCurrentSession())
        ->get();
        return view('results.view_scores', ['student_registered_courses' => $student_registered_courses, 'course' => $course]);
    }

    public function showCompute()
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("allApplicants",  $staff->id)) {

        $programmes = Program::orderBy('name')->get();
        $sessions = Session::all();
        return view('results.compute', ['programs' => $programmes, 'sessions' => $sessions]);
    } else {
        $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
       return view('admissions.error', compact('loginMsg'));
    }
    }

    public function compute(Request $request)
    {
        $request->validate([
            'program_id' => 'required',
            'session' => 'required',
            'level' => 'required',
            'semester' => 'required',
        ]);
        $batch_id = $this->resultComputation->computeResult($request);
        return response(['batch_id' => $batch_id]);
    }

    public function batchProgress(Request $request)
    {
        $batch_id = $request->batch_id;
        $batch = Bus::findBatch($batch_id);
        return response(['progress' => $batch->progress()]);
    }

    public function decline($staff_course_id)
    {
        StaffCourse::where('id', $staff_course_id)->update([
            'approval_status' => 'declined'
        ]);
        return redirect()->back()->withErrors(['error' => 'Scores declined!!']);
    }

    protected function getCurrentSession()
    {
        $session = DB::table('sessions')->where('status', 1)
            ->select('sessions.id')->first();
        $ses = $session->id;
        $currentsession = $ses;
        return $currentsession;
    }

    protected function getCurrentSemester()
    {
        $session = DB::table('sessions')->where('status', 1)->first();
        return $session->semester;
    }

    public function approve(Request $request)
    {
        // dd($request);
        $by = $request->by;
        $program_id = $request->program_id;
        $session = $this->getCurrentSession();
        $semester = $this->getCurrentSemester();

        switch ($by) {
            case 'hod':
                $course_id = $request->course_id;
                StaffCourse::where('course_id', $course_id)->where('program_id', $program_id)->where('session_id', $session)->where('semester_id', $semester)->update(['hod_approval' => 'approved']);
                break;
            case 'dean':
                $level = $request->level;
                StaffCourse::where('level', $level)->where('program_id', $program_id)->where('session_id', $session)->where('semester_id', $semester)->update(['dean_approval' => 'approved']);
                break;
            case 'sbc':
                $level = $request->level;
                StaffCourse::where('level', $level)->where('program_id', $program_id)->where('session_id', $session)->where('semester_id', $semester)->update(['sbc_approval' => 'approved']);
                break;
            case 'vc':
                $level = $request->level;
                StaffCourse::where('level', $level)->where('program_id', $program_id)->where('session_id', $session)->where('semester_id', $semester)->update(['vc_senate_approval' => 'approved']);
                RegisteredCourse::where('program_id', $program_id)->where('session', $session)->where('semester', $semester)->update(['status' => 'published']);

                break;
            default:
                $course_id = $request->course_id;
                StaffCourse::where('course_id', $course_id)->where('program_id', $program_id)->where('session_id', $session)->where('semester_id', $semester)->update(['hod_approval' => 'approved']);
                break;
        }

        return back()->with('message', 'Course(s) approved!');
    }

    public function revoke(Request $request)
    {
        $by = $request->by;
        $semester = $this->getCurrentSemester();
        $program_id = $request->program_id;
        $session = $this->getCurrentSession();

        switch ($by) {
            case 'hod':
                $course_id = $request->course_id;
                StaffCourse::where('course_id', $course_id)->where('program_id', $program_id)->where('session_id', $session)->where('semester_id', $semester)->update(['hod_approval' => 'pending']);
                break;
            case 'dean':
                $level = $request->level;
                StaffCourse::where('level', $level)->where('program_id', $program_id)->where('session_id', $session)->where('semester_id', $semester)->update(['dean_approval' => 'pending']);
                break;
                case 'sbc':
                    $level = $request->level;
                    StaffCourse::where('level', $level)->where('program_id', $program_id)->where('session_id', $session)->where('semester_id', $semester)->update(['sbc_approval' => 'pending']);
                    break;
                case 'vc':
                    $level = $request->level;
                    StaffCourse::where('level', $level)->where('program_id', $program_id)->where('session_id', $session)->where('semester_id', $semester)->update(['vc_senate_approval' => 'pending']);
                    RegisteredCourse::where('program_id', $program_id)->where('session', $session)->where('semester', $semester)->update(['status' => 'unpublished']);

                    break;
            default:
                $course_id = $request->course_id;
                StaffCourse::where('course_id', $course_id)->where('program_id', $program_id)->where('session_id', $session)->where('semester_id', $semester)->update(['hod_approval' => 'pending']);
                break;
        }

        return back()->with('message', 'Course(s) approval revoked!');
    }

    // Login Function
    public function login(Request $request)
    {
        $userid = DB::table('admin')->where('username', $request->email)->first();
        if ($userid->id == 'null') {

            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button>  Wrong Email or Password  </div>';
            return redirect('/adminLogin')->with('loginMsg', $loginMsg);
        }
        if ($this->hasPriviledge("login",  $userid->id)) {
            $admin = DB::table('staff')->where('username', $request->email)->first();

            if ($admin) {

                if (Hash::check($request->password, $admin->password)) {
                    session(['adminFirstName' => $admin->first_name]);
                    session(['adminsurname' => $admin->surname]);
                    session(['adminPhone' => $admin->phone]);
                    // session(['adminDepartment' => $admin->department]);
                    session(['adminEmail' => $admin->email]);
                    session(['adminId' => $admin->id]);

                    $fullName = $admin->first_name . " " . $admin->surname;

                    //return view('admissions.administratorHome', compact('fullName'));
                    return redirect('/staff/home')->with('loginMsg', $fullName);



                } else {
                    $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button>  Wrong Email or Password </div>';
                    return redirect('/adminLogin')->with('loginMsg', $loginMsg);
                }
            } else {
                $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button>  Wrong Email or Password  </div>';
                return redirect('/adminLogin')->with('loginMsg', $loginMsg);
            }

            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Wrong Email </div>';
            return redirect('/adminLogin')->with('loginMsg', $loginMsg);
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You have been denied access, please see the Admins</div>';
            return redirect('/adminLogin')->with('loginMsg', $loginMsg);
        }
    }

    // Registeration Function
    public function register(Request $req)
    {  $staff = Auth::guard('staff')->user();

        if ($this->hasPriviledge("register",  $staff->id)) {
            //Comfirm password verification
            if ($req->password == $req->password_confirmation) {
                $jsonstring = "";
                //db::beginTransaction is use if your going to be insert and updating into tables
                DB::beginTransaction();
                //try and catch to get the errors
                try {
                    $idcard = DB::table('admin')->insertGetId([

                        'surname' => $req->surname,
                        'first_name' => $req->first_name,
                        'phone' => $req->phone,
                        'email' => $req->email,
                        'department' => $req->department,
                        //Hash::make to encrpty or hash the password
                        'password' => Hash::make($req->password)

                    ]);

                    DB::table('password_resets')->insert([
                        'email' => $req->email,
                        'token' => 'welcome'
                    ]);

                    DB::commit();

                    $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> ' . $req->surname . ' Your Registration was successful. </div>';
                    return redirect('/adminRegister')->with('signUpMsg', $signUpMsg);
                } catch (QueryException $e) {
                    DB::rollBack();
                    $error_code = $e->errorInfo[1];
                    if ($error_code == 1062) {
                        $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> You have registered before</div>';
                        return redirect('/adminRegister')->with('signUpMsg', $signUpMsg);
                    } else {
                        $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Your registration was not successful, please try again later Veritas Univeristy help line</div>';
                        return redirect('/adminRegister')->with('signUpMsg', $signUpMsg);
                    }
                }
            } else {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Password mismatch </div>';
                return redirect('/adminRegister')->with('signUpMsg', $signUpMsg);
            }
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
            return redirect('/adminRegister')->with('loginMsg', $loginMsg);
        }
    }

    // Logout Function
    public function logoutAdmin()
    {
        session()->flush();
        return redirect('/adminLogin');
    }

    // View All Applicants
    public function allApplicants()
    {
        $staff = Auth::guard('staff')->user();

        if ($this->hasPriviledge("allApplicants",   $staff->id)) {
            $allAppli = array();
            $allApplicants = DB::table('approved_applicants')->get();
            $approvedArr = array();
            $counter = 0;
            foreach ($allApplicants as $allApp) {
                $approvedArr[$counter] = $allApp->user_id;
                $counter++;
            }
            $allApplicants = DB::table('users')
                ->whereNotIn('users.id', $approvedArr)
                ->join('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->leftJoin('de', 'de.user_id', '=', 'users.id')
                ->leftJoin('pgs', 'pgs.user_id', '=', 'users.id')
                ->leftJoin('transfers', 'transfers.user_id', '=', 'users.id')
                ->leftJoin('utme', 'utme.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.gender',
                // 'usersbiodata.passport', 'usersbiodata.passport_type',
                'usersbiodata.created_at', 'de.course_applied', 'transfers.course_applied', 'utme.course_applied', 'pgs.course_applied')
                ->get()->toArray();

            foreach ($allApplicants as $applicant) {

                if ($applicant->applicant_type == 'UTME') {
                    $assign = (array)$applicant;
                    $assign['course_applied'] = $this->getApplicantType($assign['id'], 'utme');
                    array_push($allAppli, $assign);
                } elseif ($applicant->applicant_type == 'DE') {
                    $assign = (array)$applicant;
                    $assign['course_applied'] = $this->getApplicantType($assign['id'], 'de');
                    array_push($allAppli, $assign);
                } elseif ($applicant->applicant_type == 'Transfer') {
                    $assign = (array)$applicant;
                    $assign['course_applied'] = $this->getApplicantType($assign['id'], 'transfers');
                    array_push($allAppli, $assign);
                } elseif ($applicant->applicant_type == 'PG') {
                    $assign = (array)$applicant;
                    $assign['course_applied'] = $this->getApplicantType($assign['id'], 'pgs');
                    array_push($allAppli, $assign);
                }
            }
            $fullName = session('adminFirstName') . " " . session('adminsurname');
           return view('admissions.allApplicants', compact('allAppli', 'fullName'));
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
           return view('admissions.error', compact('loginMsg'));
        }
    }

//VERIFY PAYMENT FUNCTION

    public function verifypayment(Request $req)
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("verifyPayment",  $staff->id)) {

        try {
            DB::table('remitas')->where('rrr', $req->rrr)
                ->update([
                    'status_code' => "01",
                    'status' => "Payment Successful",
                    'channel' => "Remita Online",
                    'transaction_id' =>  Carbon::now(),
                    'transaction_date' => Carbon::now(),
                    'channel' => "Remita Online",
                    'updated_at' => Carbon::now(),
                    'verify_by' => $staff->id
                ]);
                $approvalMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your Verification was successful  </div>';
                return Redirect::back()->with('approvalMsg', $approvalMsg);
               // return redirect('/adminAllPayments')->with('approvalMsg', $approvalMsg);
            // return redirect('adminAllPayments');
        } catch (QueryException $e) {
            $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your Verification was not successful'.$e->getMessage();' </div>';
             return Redirect::back()->with('approvalMsg', $approvalMsg);
            //return redirect('adminAllPayments')->with('approvalMsg', $approvalMsg);
            // return redirect('/newPayment/')->with('mgs',$statusMsg);
        }
    }
 else {
    $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
   return view('admissions.error', compact('loginMsg'));
}
}


    // View All Applicant Payments
    // public function adminAllPayments()
    // {
    //     if ($this->hasPriviledge("adminAllPayments",  $staff->id)) {

    //          $allAppli = array();
    //         $allApplicants = DB::table('approved_applicants')->get();
    //         $approvedArr = array();
    //         $counter = 0;
    //         foreach ($allApplicants as $allApp) {
    //             $approvedArr[$counter] = $allApp->user_id;
    //             $counter++;

    //         }
    //         $allApplicants = DB::table('users')
    //             ->join('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
    //             ->join('remitas', 'remitas.user_id', '=', 'users.id')
    //             ->leftJoin('de', 'de.user_id', '=', 'users.id')
    //             ->leftJoin('pgs', 'pgs.user_id', '=', 'users.id')
    //             ->leftJoin('transfers', 'transfers.user_id', '=', 'users.id')
    //             ->leftJoin('utme', 'utme.user_id', '=', 'users.id')
    //             ->select('users.*', 'remitas.rrr', 'remitas.fee_type', 'remitas.amount', 'remitas.status_code', 'remitas.transaction_date', 'utme.course_applied', 'de.course_applied', 'pgs.course_applied', 'transfers.course_applied')
    //             // ->where('status_code', '01')
    //             ->get()->toArray();

    //         foreach ($allApplicants as $applicant) {

    //             if ($applicant->applicant_type == 'UTME') {
    //                 $assign = (array)$applicant;
    //                 $assign['course_applied'] = $this->getApplicantType($assign['id'], 'utme');
    //                 array_push($allAppli, $assign);
    //             } elseif ($applicant->applicant_type == 'DE') {
    //                 $assign = (array)$applicant;
    //                 $assign['course_applied'] = $this->getApplicantType($assign['id'], 'de');
    //                 array_push($allAppli, $assign);
    //             } elseif ($applicant->applicant_type == 'Transfer') {
    //                 $assign = (array)$applicant;
    //                 $assign['course_applied'] = $this->getApplicantType($assign['id'], 'transfers');
    //                 array_push($allAppli, $assign);
    //             } elseif ($applicant->applicant_type == 'PG') {
    //                 $assign = (array)$applicant;
    //                 $assign['course_applied'] = $this->getApplicantType($assign['id'], 'pgs');
    //                 array_push($allAppli, $assign);
    //             }
    //         }
    //         $fullName = session('adminFirstName') . " " . session('adminsurname');
    //        return view('admissions.allPayments', compact('allAppli', 'fullName'));
    //     } else {
    //         $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
    //        return view('admissions.error', compact('loginMsg'));
    //     }
    // }

    //All registered applicants
    public function adminAllUsers()
    {
        $staff = Auth::guard('staff')->user();
         if ($this->hasPriviledge("adminAllPayments",  $staff->id)) {
            // $allAppli = array();
            // $allApplicants = DB::table('users')->get();
            // $approvedArr = array();
            // $counter = 0;
            // foreach ($allApplicants as $allApp) {
            //     $approvedArr[$counter] = $allApp->user_id;
            //     $counter++;
            // }

            $allApplicants = DB::table('users')
                ->select('users.*')
                ->get();

            $fullName = session('adminFirstName') . " " . session('adminsurname');
          return view('admissions.allUsers', compact('allApplicants', 'fullName'));
            } else {
                        $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
                       return view('admissions.error', compact('loginMsg'));
                    }
    }
    //To view all Payment from Remita
    public function adminAllPayments()
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("adminAllPayments",  $staff->id)) {
            // $allAppli = array();
            // $allApplicants = DB::table('users')->get();
            // $approvedArr = array();
            // $counter = 0;
            // foreach ($allApplicants as $allApp) {
            //     $approvedArr[$counter] = $allApp->user_id;
            //     $counter++;
            // }

           $allApplicants = DB::table('remitas')
            ->leftJoin('users', 'remitas.user_id', '=', 'users.id')
                ->select('users.*','remitas.*')
                ->get();
                $fullName = session('adminFirstName') . " " . session('adminsurname');
                       return view('admissions.allPayments', compact('allApplicants', 'fullName'));
                          } else {
                        $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
                       return view('admissions.error', compact('loginMsg'));
                    }

    }

    public function allApprovedApplicants($user_type)
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("allApprovedApplicants",  $staff->id)) {
            $allApplicants = "";
            if ($user_type == "UTME") {
                $allApplicants = DB::table('approved_applicants')
                    ->join('users', 'approved_applicants.user_id', '=', 'users.id')
                    ->join('usersbiodata', 'usersbiodata.user_id', '=', 'approved_applicants.user_id')
                    ->join('utme', 'utme.user_id', '=', 'approved_applicants.user_id')
                    ->select('users.*', 'usersbiodata.gender', 'utme.course_applied', 'approved_applicants.*')
                    ->get()->toArray();
            } elseif ($user_type == "DE") {
                $allApplicants = DB::table('approved_applicants')
                    ->join('users', 'approved_applicants.user_id', '=', 'users.id')
                    ->join('usersbiodata', 'usersbiodata.user_id', '=', 'approved_applicants.user_id')
                    ->join('de', 'de.user_id', '=', 'approved_applicants.user_id')
                    ->select('users.*', 'usersbiodata.gender', 'de.course_applied', 'approved_applicants.*')
                    ->get()->toArray();
            } elseif ($user_type == "Transfer") {
                $allApplicants = DB::table('approved_applicants')
                    ->join('users', 'approved_applicants.user_id', '=', 'users.id')
                    ->join('usersbiodata', 'usersbiodata.user_id', '=', 'approved_applicants.user_id')
                    ->join('transfers', 'transfers.user_id', '=', 'approved_applicants.user_id')
                    ->select('users.*', 'usersbiodata.gender', 'transfers.course_applied', 'approved_applicants.*')
                    ->get()->toArray();
            } elseif ($user_type == "PG") {
                $allApplicants = DB::table('approved_applicants')
                    ->join('users', 'approved_applicants.user_id', '=', 'users.id')
                    ->join('usersbiodata', 'usersbiodata.user_id', '=', 'approved_applicants.user_id')
                    ->join('pgs', 'pgs.user_id', '=', 'approved_applicants.user_id')
                    ->select('users.*', 'usersbiodata.gender', 'pgs.course_applied', 'approved_applicants.*')
                    ->get()->toArray();
            }

            $fullName = session('adminFirstName') . " " . session('adminsurname');
           return view('admissions.allApprovedApplicants', compact('allApplicants', 'fullName', 'user_type'));
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
           return view('admissions.error', compact('loginMsg'));
        }
    }

    public function DE()
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("DE",  $staff->id)) {
            $deApplicants = DB::table('approved_applicants')->get();
            $approvedArr = array();
            $counter = 0;
            foreach ($deApplicants as $deApp) {
                $approvedArr[$counter] = $deApp->user_id;
                $counter++;
            }
            $deApplicants = DB::table('users')->where('applicant_type', 'de')
                ->whereNotIn('users.id', $approvedArr)
                ->join('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->join('de', 'de.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.gender', 'usersbiodata.created_at', 'de.course_applied', 'de.qualification')
                ->get();
            $fullName = session('adminFirstName') . " " . session('adminsurname');
           return view('admissions.deApplicants', compact('deApplicants', 'fullName'));
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
           return view('admissions.error', compact('loginMsg'));
        }
    }

    public function PG()
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("PG",  $staff->id)) {
            $pgApplicants = DB::table('approved_applicants')->get();
            $approvedArr = array();
            $counter = 0;
            foreach ($pgApplicants as $pgApp) {
                $approvedArr[$counter] = $pgApp->user_id;
                $counter++;
            }
            $pgApplicants = DB::table('users')->where('applicant_type', 'pg')
                ->whereNotIn('users.id', $approvedArr)
                ->join('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->join('pgs', 'pgs.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.gender', 'usersbiodata.created_at', 'usersbiodata.passport', 'usersbiodata.passport_type', 'pgs.mode', 'pgs.course_applied')
                ->get();
            $fullName = session('adminFirstName') . " " . session('adminsurname');
           return view('admissions.pgApplicants', compact('pgApplicants', 'fullName'));
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
           return view('admissions.error', compact('loginMsg'));
        }
    }

    public function transfer()
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("transfer",  $staff->id)) {
            $transferApplicants = DB::table('approved_applicants')->get();
            $approvedArr = array();
            $counter = 0;
            foreach ($transferApplicants as $transferApp) {
                $approvedArr[$counter] = $transferApp->user_id;
                $counter++;
            }
            $transferApplicants = DB::table('users')->where('applicant_type', 'transfer')
                ->whereNotIn('users.id', $approvedArr)
                ->join('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->join('transfers', 'transfers.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.gender', 'usersbiodata.created_at', 'transfers.cgpa', 'transfers.course_applied')
                ->get();
            $fullName = session('adminFirstName') . " " . session('adminsurname');
           return view('admissions.transferApplicants', compact('transferApplicants', 'fullName'));
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
           return view('admissions.error', compact('loginMsg'));
        }
    }

    public function utme()
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("utme",  $staff->id)) {
            $utmeApplicants = DB::table('approved_applicants')->get();
            $approvedArr = array();
            $counter = 0;
            foreach ($utmeApplicants as $utmeApp) {
                $approvedArr[$counter] = $utmeApp->user_id;
                $counter++;
            }
            $utmeApplicants = DB::table('users')->where('applicant_type', 'utme')
                ->whereNotIn('users.id', $approvedArr)
                ->join('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                // ->join('uploads', 'uploads.user_id', '=', 'users.id')
                ->join('utme', 'utme.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.gender', 'usersbiodata.created_at',  'usersbiodata.dob', 'usersbiodata.status', 'utme.course_applied')
                ->where('status','4')
                ->get();
            $fullName = session('adminFirstName') . " " . session('adminsurname');
           return view('admissions.utmeApplicants', compact('utmeApplicants', 'fullName'));
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
           return view('admissions.error', compact('loginMsg'));
        }
    }

    // View paymnets for UTME Applicants
    public function utmePayment()
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("utmePayment",  $staff->id)) {
            // $utmePayments = DB::table('approved_applicants')->get();
            // $approvedArr = array();
            // $counter = 0;
            // foreach ($utmePayments as $utmeApp) {
            //     $approvedArr[$counter] = $utmeApp->user_id;
            //     $counter++;
            // }
            $utmePayments = DB::table('users')->where('applicant_type', 'utme')
                // ->whereNotIn('users.id', $approvedArr)
                ->join('remitas', 'remitas.user_id', '=', 'users.id')
                ->join('utme', 'utme.user_id', '=', 'users.id')
                ->join('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->select('users.*', 'remitas.rrr', 'remitas.fee_type', 'remitas.amount', 'remitas.status_code','remitas.transaction_date',  'utme.course_applied')
                ->where('status_code','01')
                ->get();
            $fullName = session('adminFirstName') . " " . session('adminsurname');
            foreach ($utmePayments as $utm){
                if ($utm->status_code == '01') {
                   return view('admissions.utmePayments', compact('utmePayments', 'fullName'));
                }
            }
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
           return view('admissions.error', compact('loginMsg'));
        }
    }

    // View paymnets for DE Applicants
    public function dePayment()
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("dePayment",  $staff->id)) {
            $dePayments = DB::table('approved_applicants')->get();
            $approvedArr = array();
            $counter = 0;
            foreach ($dePayments as $deApp) {
                $approvedArr[$counter] = $deApp->user_id;
                $counter++;
            }
            $dePayments = DB::table('users')->where('applicant_type', 'de')
                ->whereNotIn('users.id', $approvedArr)
                ->join('remitas', 'remitas.user_id', '=', 'users.id')
                ->join('de', 'de.user_id', '=', 'users.id')
                ->join('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->select('users.*', 'remitas.rrr', 'remitas.fee_type', 'remitas.amount', 'remitas.transaction_date', 'de.course_applied')
                ->get();
            $fullName = session('adminFirstName') . " " . session('adminsurname');
           return view('admissions.dePayments', compact('dePayments', 'fullName'));
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
           return view('admissions.error', compact('loginMsg'));
        }
    }

    // View paymnets for Transfer Applicants
    public function transferPayment()
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("transferPayment",  $staff->id)) {
            $transferPayments = DB::table('approved_applicants')->get();
            $approvedArr = array();
            $counter = 0;
            foreach ($transferPayments as $transferApp) {
                $approvedArr[$counter] = $transferApp->user_id;
                $counter++;
            }
            $transferPayments = DB::table('users')->where('applicant_type', 'transfer')
                ->whereNotIn('users.id', $approvedArr)
                ->join('remitas', 'remitas.user_id', '=', 'users.id')
                ->join('transfers', 'transfers.user_id', '=', 'users.id')
                ->join('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->select('users.*', 'remitas.rrr', 'remitas.fee_type', 'remitas.amount', 'remitas.transaction_date', 'usersbiodata.passport', 'usersbiodata.passport_type', 'transfers.course_applied')
                ->get();
            $fullName = session('adminFirstName') . " " . session('adminsurname');
           return view('admissions.transferPayments', compact('transferPayments', 'fullName'));
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
           return view('admissions.error', compact('loginMsg'));
        }
    }

    // View paymnets for PG Applicants
    public function pgPayment()
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("pgPayment",  $staff->id)) {
            $pgPayments = DB::table('approved_applicants')->get();
            $approvedArr = array();
            $counter = 0;
            foreach ($pgPayments as $pgApp) {
                $approvedArr[$counter] = $pgApp->user_id;
                $counter++;
            }
            $pgPayments = DB::table('users')->where('applicant_type', 'pg')
                ->whereNotIn('users.id', $approvedArr)
                ->join('remitas', 'remitas.user_id', '=', 'users.id')
                ->join('pgs', 'pgs.user_id', '=', 'users.id')
                ->join('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->select('users.*', 'remitas.rrr', 'remitas.fee_type', 'remitas.amount', 'remitas.transaction_date', 'usersbiodata.passport', 'usersbiodata.passport_type', 'pgs.course_applied')
                ->get();
            $fullName = session('adminFirstName') . " " . session('adminsurname');
           return view('admissions.pgPayments', compact('pgPayments', 'fullName'));
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
           return view('admissions.error', compact('loginMsg'));
        }
    }

    // Approval of Applicants
     public function approved($pageLink, Request $req, $id)
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("approved",  $staff->id)) {
            $app_id = base64_decode(urldecode($id));

            try {
                DB::table('approved_applicants')->insert([
                    'user_id' => $app_id,
                    // 'approval_date' => Carbon::now(),
                    'approved_by' => $staff->id,
                    'comment' => $req->comment,
                ]);

                $approvalMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Student has been approved </div>';
                 return Redirect::back()->with('approvalMsg', $approvalMsg);
                //return redirect ('/recommended/' . $pageLink)->with('approvalMsg', $approvalMsg);
            } catch (QueryException $e) {
                $error_code = $e->errorInfo[1];
                if ($error_code == 1062) {
                    $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Student has already been approved </div>';
                    return Redirect()->back()->with('approvalMsg', $approvalMsg);
                } else {
                    $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your approval was not successful'.$e->getMessage();' </div>';
                    return  Redirect()->back()->with('approvalMsg', $approvalMsg);
                }
            }
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
            return redirect('error')->with('loginMsg', $loginMsg);
        }
    }

    public function recommend($pageLink, $id)
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("recommend",  $staff->id)) {
            $app_id = base64_decode(urldecode($id));

            try {
                DB::table('recommended_applicants')->insert([
                    'user_id' => $app_id,
                    'recommendation_date' => today(),
                    'recommended_by' => $staff->id,
                ]);

                $approvalMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Student has been recommended </div>';
                 return Redirect::back()->with('approvalMsg', $approvalMsg);
            // return redirect('/recommended/' . $pageLink)->with('approvalMsg', $approvalMsg);
            } catch (QueryException $e) {
                $error_code = $e->errorInfo[1];
                if ($error_code == 1062) {
                    $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Student has already been recommended </div>';
                     return Redirect::back()->with('approvalMsg', $approvalMsg);
                  //  return redirect('/recommended/'. $pageLink)->with('approvalMsg', $approvalMsg);
                } else {
                    $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your recommendation was not successful </div>';
                    return redirect('/recommended/'. $pageLink)->with('approvalMsg', $approvalMsg);
                }
            }
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
            return redirect('error')->with('loginMsg', $loginMsg);
        }
    }

    // Force Approval of Applicants
    public function forceApproved($pageLink, $id)
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("forceApproved",  $staff->id)) {
            $app_id = base64_decode(urldecode($id));

            try {
                DB::table('approved_applicants')->insert([
                    'user_id' => $app_id,
                    'approval_date' => today(),
                    'approved_by' => $staff->id,
                ]);

                $approvalMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Student has been approved </div>';
                return redirect('/unqualified/' . $pageLink)->with('approvalMsg', $approvalMsg);
            } catch (QueryException $e) {
                $error_code = $e->errorInfo[1];
                if ($error_code == 1062) {
                    $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Student has already been approved </div>';
                    return redirect('/unqualified/' . $pageLink)->with('approvalMsg', $approvalMsg);
                } else {
                    $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your approval was not successful </div>';
                    return redirect('/unqualified/' . $pageLink)->with('approvalMsg', $approvalMsg);
                }
            }
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
            return redirect('error')->with('loginMsg', $loginMsg);
        }
    }

    // Rejection of Applications
    public function rejection($pageLink, Request $req, $id)
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("rejection",  $staff->id)) {
            $app_id = base64_decode(urldecode($id));

            try {
                DB::table('rejected_applicants')->insert([
                    'user_id' => $app_id,
                   // 'rejection_date' => today(),
                    'rejected_by' => $staff->id,
                    'comment' => $req->comment,

                ]);

                $approvalMsg = '<div class="alert alert-warning alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Student has been rejected </div>';
                return redirect('/qualified/' . $pageLink)->with('approvalMsg', $approvalMsg);
            } catch (QueryException $e) {
                $error_code = $e->errorInfo[1];
                if ($error_code == 1062) {
                    // $rejectionMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Student has already been rejected </div>';
                    $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Student has already been rejected </div>';
                    // return redirect('/qualified/' . $pageLink)->with('rejectionMsg', $rejectionMsg);
                    return redirect('/qualified/' . $pageLink)->with('approvalMsg', $approvalMsg);
                } else {
                    $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your rejection was not successful'.$e->getMessage().' </div>';
                    return redirect('/qualified/' . $pageLink)->with('approvalMsg', $approvalMsg);
                }
            }
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
            return redirect('/qualified/')->with('loginMsg', $loginMsg);
        }
    }
    //View applicant's full details
    public function viewApplicants($applicantType, $id)
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("viewApplicants",  $staff->id)) {
            $app_id = base64_decode(urldecode($id));
            $applicantsDetails = "";
            if ($applicantType ==  'UTME') {
                $applicantsDetails = DB::table('users')->where('users.applicant_type', 'UTME')
                    ->where('users.id', $app_id)
                    ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                    ->leftJoin('utme', 'utme.user_id', '=', 'users.id')
                    ->leftJoin('uploads', 'uploads.user_id', '=', 'users.id')
                    ->leftJoin('sponsors', 'sponsors.user_id', '=', 'users.id')
                    ->leftJoin('olevel', 'olevel.user_id', '=', 'users.id')
                    ->select('users.*', 'usersbiodata.*', 'sponsors.*', 'utme.*', 'olevel.*', 'uploads.*')
                    ->first();
                     $programs = programs::orderBy('name', 'ASC')->get();
                    $subjects = subjects::orderBy('subject_name', 'ASC')->get();
               return view('admissions.layouts.viewUtmeApplicants', compact('applicantsDetails', 'app_id'), ['programs' => $programs, 'subjects' => $subjects]);
            } elseif ($applicantType ==  'DE') {
                $applicantsDetails = DB::table('users')->where('applicant_type', 'DE')
                    ->where('users.id', $app_id)
                    ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                    ->leftJoin('de', 'de.user_id', '=', 'users.id')
                    ->leftJoin('uploads', 'uploads.user_id', '=', 'users.id')
                    ->leftJoin('sponsors', 'sponsors.user_id', '=', 'users.id')
                    ->leftJoin('olevel', 'olevel.user_id', '=', 'users.id')
                    ->select('users.*', 'usersbiodata.*', 'sponsors.*', 'de.*', 'olevel.*', 'uploads.*')
                    ->first();
                     $programs = programs::orderBy('name', 'ASC')->get();
                    $subjects = subjects::orderBy('subject_name', 'ASC')->get();
               return view('admissions.layouts.viewDeApplicants',  compact('applicantsDetails', 'app_id'), ['programs' => $programs, 'subjects' => $subjects]);
            } elseif ($applicantType ==  'Transfer') {
                $applicantsDetails = DB::table('users')->where('applicant_type', 'Transfer')
                    ->where('users.id', $app_id)
                    ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                    ->leftJoin('transfers', 'transfers.user_id', '=', 'users.id')
                    ->leftJoin('uploads', 'uploads.user_id', '=', 'users.id')
                    ->leftJoin('sponsors', 'sponsors.user_id', '=', 'users.id')
                    ->leftJoin('olevel', 'olevel.user_id', '=', 'users.id')
                    ->select('users.*', 'usersbiodata.*', 'sponsors.*', 'transfers.*', 'olevel.*', 'uploads.*')
                    ->first();
                     $programs = programs::orderBy('name', 'ASC')->get();
                    $subjects = subjects::orderBy('subject_name', 'ASC')->get();
               return view('admissions.layouts.viewTransferApplicants',  compact('applicantsDetails', 'app_id'), ['programs' => $programs, 'subjects' => $subjects]);
            } elseif ($applicantType ==  'PG') {
                $applicantsDetails = DB::table('users')->where('applicant_type', 'PG')
                    ->where('users.id', $app_id)
                    ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                    ->leftJoin('pgs', 'pgs.user_id', '=', 'users.id')
                    ->leftJoin('sponsors', 'sponsors.user_id', '=', 'users.id')
                    ->leftJoin('uploads', 'uploads.user_id', '=', 'users.id')
                    ->leftJoin('pg_referees', 'pg_referees.user_id', '=', 'users.id')
                    ->leftJoin('pg_educations', 'pg_educations.user_id', '=', 'users.id')
                    ->leftJoin('olevel', 'olevel.user_id', '=', 'users.id')
                    ->select('users.*', 'usersbiodata.*', 'sponsors.*', 'pgs.*', 'olevel.*', 'pg_referees.*', 'pg_educations.*', 'uploads.*')
                    ->first();
                     $programs = programs::orderBy('name', 'ASC')->get();
                    $subjects = subjects::orderBy('subject_name', 'ASC')->get();
               return view('admissions.layouts.viewPgApplicants',  compact('applicantsDetails', 'app_id'), ['programs' => $programs, 'subjects' => $subjects]);
            }
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
           return view('admissions./error', compact('loginMsg'));
        }
    }
//To chanage applicant course of study
 public function changecourse(Request $req)
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("changecourse",  $staff->id)) {

        try {
            DB::table('utme')->where('jamb_reg_no', $req->jamb_reg_no)
                ->update([
                    'course_applied' =>$req->course_applied,

                ]);
$approvalMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Course was successfuly Changed  </div>';
                return Redirect::back()->with('approvalMsg', $approvalMsg);
                return redirect('adminAllPayments');

        } catch (QueryException $e) {
            $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your Verification was not successful'.$e->getMessage();' </div>';
            return Redirect::back()->with('approvalMsg', $approvalMsg);
            // return redirect('/newPayment/')->with('mgs',$statusMsg);
        }
 } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
           return view('admissions./error', compact('loginMsg'));
        }
    }

        public function changecourseDE(Request $req)
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("changecourse",  $staff->id)) {

        try {
            DB::table('de')->where('jamb_de_no', $req->jamb_de_no)
                ->update([
                    'course_applied' =>$req->course_applied,

                ]);

                $approvalMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Course was successfuly Changed  </div>';
                return Redirect::back()->with('approvalMsg', $approvalMsg);
                return redirect('adminAllPayments');
        } catch (QueryException $e) {
            $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your Verification was not successful'.$e->getMessage();' </div>';
            return redirect('adminAllPayments')->with('approvalMsg', $approvalMsg);
            // return redirect('/newPayment/')->with('mgs',$statusMsg);
        }
 } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
           return view('admissions./error', compact('loginMsg'));
        }
    }
public function changecourseTransfer(Request $req)
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("changecourse",  $staff->id)) {

        try {
            DB::table('transfers')->where('matric_no', $req->matric_no)
                ->update([
                    'course_applied' =>$req->course_applied,

                ]);

                $approvalMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Course was successfuly Changed  </div>';
                return Redirect::back()->with('approvalMsg', $approvalMsg);
                return redirect('adminAllPayments');
        } catch (QueryException $e) {
            $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your Verification was not successful'.$e->getMessage();' </div>';
            return redirect('adminAllPayments')->with('approvalMsg', $approvalMsg);
            // return redirect('/newPayment/')->with('mgs',$statusMsg);
        }
 } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
           return view('admissions./error', compact('loginMsg'));
        }
    }


    // Get applicants application type
    private function getApplicantType($id, $table_name)
    {
        $staff = Auth::guard('staff')->user();
        $course_selected = DB::table($table_name)->where('user_id', $id)->first();
        if ($course_selected) {
            return ($course_selected->course_applied);
        } else {
            return "Unspecified";
        }

    }

    // View all qualified applicants
    public function viewQualifiedApplicants($user_type)
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("viewQualifiedApplicants",  $staff->id)) {
            $allAppli = array();
            $utmeApplicants = DB::table('approved_applicants')->get();
            $approvedArr = array();
            $counter = 0;
            foreach ($utmeApplicants as $utmeApp) {
                $approvedArr[$counter] = $utmeApp->user_id;
                $counter++;
            }
            if ($user_type == "UTME") {
                $utmeApplicants = DB::table('users')->where('applicant_type', 'UTME')
                    ->whereNotIn('users.id', $approvedArr)
                    ->join('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                    ->join('utme', 'utme.user_id', '=', 'users.id')
                    ->select('users.*', 'usersbiodata.gender', 'usersbiodata.created_at', 'usersbiodata.dob', 'utme.course_applied')
                    ->get();
                foreach ($utmeApplicants as $utmeapp) {
                    $assign = (array)$utmeapp;
                    if ($this->getQualifiedApplicants($user_type, "utme", $assign['id']))
                        array_push($allAppli, $assign);
                }
            } elseif ($user_type == "DE") {
                $deApplicants = DB::table('users')->where('applicant_type', 'DE')
                    ->whereNotIn('users.id', $approvedArr)
                    ->join('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                    ->join('de', 'de.user_id', '=', 'users.id')
                    ->select('users.*', 'usersbiodata.gender', 'usersbiodata.created_at', 'usersbiodata.passport', 'usersbiodata.passport_type', 'usersbiodata.dob', 'de.course_applied')
                    ->get();
                foreach ($deApplicants as $deapp) {
                    $assign = (array)$deapp;
                    if ($this->getQualifiedApplicants($user_type, "de", $assign['id']))
                        array_push($allAppli, $assign);
                }
            } elseif ($user_type == "Transfer") {
                $transferApplicants = DB::table('users')->where('applicant_type', 'Transfer')
                    ->whereNotIn('users.id', $approvedArr)
                    ->join('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                    ->join('transfers', 'transfers.user_id', '=', 'users.id')
                    ->select('users.*', 'usersbiodata.gender', 'usersbiodata.created_at', 'usersbiodata.passport', 'usersbiodata.passport_type', 'usersbiodata.dob', 'transfers.course_applied', 'transfers.cgpa')
                    ->get();
                foreach ($transferApplicants as $transferapp) {
                    $assign = (array)$transferapp;
                    if ($this->getQualifiedApplicants($user_type, "transfers", $assign['id']))
                        array_push($allAppli, $assign);
                }
            }
            $fullName = session('adminFirstName') . " " . session('adminsurname');
           return view('admissions.qualifiedApplicants', compact('allAppli', 'fullName', 'user_type'));
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
           return view('admissions./error', compact('loginMsg'));
        }
    }

    //View Recommended Applicants
    public function viewRecommendedApplicants($user_type){
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("allApprovedApplicants",  $staff->id)) {
            $allApplicants = "";
            if ($user_type == "UTME") {
                $allApplicants = DB::table('recommended_applicants')
                    ->join('users', 'recommended_applicants.user_id', '=', 'users.id')
                    ->join('usersbiodata', 'usersbiodata.user_id', '=', 'recommended_applicants.user_id')
                    ->join('utme', 'utme.user_id', '=', 'recommended_applicants.user_id')
                  //  ->select('users.*', 'usersbiodata.passport', 'usersbiodata.passport_type', 'usersbiodata.gender', 'utme.course_applied', 'recommended_applicants.*')
                     ->select('users.*', 'usersbiodata.gender', 'utme.course_applied', 'recommended_applicants.*')
                    ->get()->toArray();
            } elseif ($user_type == "DE") {
                $allApplicants = DB::table('recommended_applicants')
                    ->join('users', 'recommended_applicants.user_id', '=', 'users.id')
                    ->join('usersbiodata', 'usersbiodata.user_id', '=', 'recommended_applicants.user_id')
                    ->join('de', 'de.user_id', '=', 'recommended_applicants.user_id')
                    ->select('users.*', 'usersbiodata.passport', 'usersbiodata.passport_type', 'usersbiodata.gender', 'de.course_applied', 'recommended_applicants.*')
                    ->get()->toArray();
            } elseif ($user_type == "TRANSFER") {
                $allApplicants = DB::table('recommended_applicants')
                    ->join('users', 'recommended_applicants.user_id', '=', 'users.id')
                    ->join('usersbiodata', 'usersbiodata.user_id', '=', 'recommended_applicants.user_id')
                    ->join('transfers', 'transfers.user_id', '=', 'recommended_applicants.user_id')
                    ->select('users.*', 'usersbiodata.passport', 'usersbiodata.passport_type', 'usersbiodata.gender', 'transfers.course_applied', 'recommended_applicants.*')
                    ->get()->toArray();
            } elseif ($user_type == "PG") {
                $allApplicants = DB::table('recommended_applicants')
                    ->join('users', 'recommended_applicants.user_id', '=', 'users.id')
                    ->join('usersbiodata', 'usersbiodata.user_id', '=', 'recommended_applicants.user_id')
                    ->join('pgs', 'pgs.user_id', '=', 'recommended_applicants.user_id')
                    ->select('users.*', 'usersbiodata.passport', 'usersbiodata.passport_type', 'usersbiodata.gender', 'pgs.course_applied', 'recommended_applicants.*')
                    ->get()->toArray();
            }

            $fullName = session('adminFirstName') . " " . session('adminsurname');
           return view('admissions.viewRecommendedUtmeApplicants', compact('allApplicants', 'fullName', 'user_type'));
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
           return view('admissions.error', compact('loginMsg'));
        }
    }

    // Approve All Qualified Applicants
    public function approveAllQualifiedApplicants($user_type)
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("approveAllQualifiedApplicants",  $staff->id)) {
            $allAppli = array();
            $utmeApplicants = DB::table('approved_applicants')->get();
            $approvedArr = array();
            $counter = 0;
            foreach ($utmeApplicants as $utmeApp) {
                $approvedArr[$counter] = $utmeApp->user_id;
                $counter++;
            }
            if ($user_type == "UTME") {
                $utmeApplicants = DB::table('users')->where('applicant_type', 'UTME')
                    ->whereNotIn('users.id', $approvedArr)
                    ->join('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                    ->join('utme', 'utme.user_id', '=', 'users.id')
                    ->select('users.*', 'usersbiodata.gender', 'usersbiodata.created_at', 'usersbiodata.passport', 'usersbiodata.passport_type', 'usersbiodata.dob', 'utme.course_applied')
                    ->get();
                foreach ($utmeApplicants as $utmeapp) {
                    $assign = (array)$utmeapp;
                    if ($this->getQualifiedApplicants($user_type, "utme", $assign['id']))
                        array_push($allAppli, $assign);
                }
            } elseif ($user_type == "DE") {
                $deApplicants = DB::table('users')->where('applicant_type', 'DE')
                    ->whereNotIn('users.id', $approvedArr)
                    ->join('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                    ->join('de', 'de.user_id', '=', 'users.id')
                    ->select('users.*', 'usersbiodata.gender', 'usersbiodata.created_at', 'usersbiodata.passport', 'usersbiodata.passport_type', 'usersbiodata.dob', 'de.course_applied')
                    ->get();
                foreach ($deApplicants as $deapp) {
                    $assign = (array)$deapp;
                    if ($this->getQualifiedApplicants($user_type, "de", $assign['id']))
                        array_push($allAppli, $assign);
                }
            } elseif ($user_type == "Transfer") {
                $transferApplicants = DB::table('users')->where('applicant_type', 'Transfer')
                    ->whereNotIn('users.id', $approvedArr)
                    ->join('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                    ->join('transfers', 'transfers.user_id', '=', 'users.id')
                    ->select('users.*', 'usersbiodata.gender', 'usersbiodata.created_at', 'usersbiodata.passport', 'usersbiodata.passport_type', 'usersbiodata.dob', 'transfers.course_applied', 'transfers.cgpa')
                    ->get();
                foreach ($transferApplicants as $transferapp) {
                    $assign = (array)$transferapp;
                    if ($this->getQualifiedApplicants($user_type, "transfers", $assign['id']))
                        array_push($allAppli, $assign);
                }
            }

            foreach ($allAppli as $Allapp) {

                try {
                    DB::table('approved_applicants')->insert([
                        'user_id' => $Allapp['id'],
                        'approval_date' => today(),
                        'approved_by' => $staff->id,
                    ]);
                } catch (QueryException $e) {
                    $error_code = $e->errorInfo[1];
                    if ($error_code == 1062) {
                        $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Students have already been approved </div>';
                        return redirect('/qualified/' . $user_type)->with('approvalMsg', $approvalMsg);
                    } else {
                        $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your approval was not successful </div>';
                        return redirect('/qualified/' . $user_type)->with('approvalMsg', $approvalMsg);
                    }
                }
            }
            $approvalMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Students have been approved </div>';
            return redirect('/qualified/' . $user_type)->with('approvalMsg', $approvalMsg);
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
            return redirect('/qualified/')->with('loginMsg', $loginMsg);
        }
    }

    // View all Unqualified Applicants
    public function viewAllUnqualifiedApplicants($user_type)
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("viewAllUnqualifiedApplicants",  $staff->id)) {
            $allAppli = array();
            $utmeApplicants = DB::table('rejected_applicants')->get();
            $utmeApprovedApplicants = DB::table('approved_applicants')->get();
            $rejectedArr = array();
            $counter = 0;
            foreach ($utmeApplicants as $utmeApp) {
                $rejectedArr[$counter] = $utmeApp->user_id;
                $counter++;
            }
            foreach ($utmeApprovedApplicants as $utmeApp) {
                $rejectedArr[$counter] = $utmeApp->user_id;
                $counter++;
            }
            if ($user_type == "UTME") {
                $utmeApplicants = DB::table('users')->where('applicant_type', 'UTME')
                    ->whereNotIn('users.id', $rejectedArr)
                    ->join('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                    ->join('utme', 'utme.user_id', '=', 'users.id')
                    ->select('users.*', 'usersbiodata.gender', 'usersbiodata.created_at', 'usersbiodata.passport', 'usersbiodata.passport_type', 'usersbiodata.dob', 'utme.course_applied')
                    ->get();
                foreach ($utmeApplicants as $utmeapp) {
                    $assign = (array)$utmeapp;
                    if (!$this->getQualifiedApplicants($user_type, "utme", $assign['id']))
                        array_push($allAppli, $assign);
                }
            } elseif ($user_type == "DE") {
                $deApplicants = DB::table('users')->where('applicant_type', 'DE')
                    ->whereNotIn('users.id', $rejectedArr)
                    ->join('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                    ->join('de', 'de.user_id', '=', 'users.id')
                    ->select('users.*', 'usersbiodata.gender', 'usersbiodata.created_at', 'usersbiodata.passport', 'usersbiodata.passport_type', 'usersbiodata.dob', 'de.course_applied')
                    ->get();
                foreach ($deApplicants as $deapp) {
                    $assign = (array)$deapp;
                    if (!$this->getQualifiedApplicants($user_type, "de", $assign['id']))
                        array_push($allAppli, $assign);
                }
            } elseif ($user_type == "Transfer") {
                $transferApplicants = DB::table('users')->where('applicant_type', 'Transfer')
                    ->whereNotIn('users.id', $rejectedArr)
                    ->join('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                    ->join('transfers', 'transfers.user_id', '=', 'users.id')
                    ->select('users.*', 'usersbiodata.gender', 'usersbiodata.created_at', 'usersbiodata.passport', 'usersbiodata.passport_type', 'usersbiodata.dob', 'transfers.course_applied', 'transfers.cgpa')
                    ->get();
                foreach ($transferApplicants as $transferapp) {
                    $assign = (array)$transferapp;
                    if (!$this->getQualifiedApplicants($user_type, "transfers", $assign['id']))
                        array_push($allAppli, $assign);
                }
            }
            $fullName = session('adminFirstName') . " " . session('adminsurname');
           return view('admissions.unqualifiedApplicants', compact('allAppli', 'fullName', 'user_type'));
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
           return view('admissions.error', compact('loginMsg'));
        }
    }

    // Reject All Unqualified Applicants
    public function rejectAllUnqualifiedApplicants($user_type)
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("rejectAllUnqualifiedApplicants",  $staff->id)) {
            $allAppli = array();
            $utmeApplicants = DB::table('rejected_applicants')->get();
            $approvedArr = array();
            $counter = 0;
            foreach ($utmeApplicants as $utmeApp) {
                $approvedArr[$counter] = $utmeApp->user_id;
                $counter++;
            }
            if ($user_type == "UTME") {
                $utmeApplicants = DB::table('users')->where('applicant_type', 'UTME')
                    ->whereNotIn('users.id', $approvedArr)
                    ->join('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                    ->join('utme', 'utme.user_id', '=', 'users.id')
                    ->select('users.*', 'usersbiodata.gender', 'usersbiodata.created_at', 'usersbiodata.passport', 'usersbiodata.passport_type', 'usersbiodata.dob', 'utme.course_applied')
                    ->get();
                foreach ($utmeApplicants as $utmeapp) {
                    $assign = (array)$utmeapp;
                    if (!$this->getQualifiedApplicants($user_type, "utme", $assign['id']))
                        array_push($allAppli, $assign);
                }
            } elseif ($user_type == "DE") {
                $deApplicants = DB::table('users')->where('applicant_type', 'DE')
                    ->whereNotIn('users.id', $approvedArr)
                    ->join('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                    ->join('de', 'de.user_id', '=', 'users.id')
                    ->select('users.*', 'usersbiodata.gender', 'usersbiodata.created_at', 'usersbiodata.passport', 'usersbiodata.passport_type', 'usersbiodata.dob', 'de.course_applied')
                    ->get();
                foreach ($deApplicants as $deapp) {
                    $assign = (array)$deapp;
                    if (!$this->getQualifiedApplicants($user_type, "de", $assign['id']))
                        array_push($allAppli, $assign);
                }
            } elseif ($user_type == "Transfer") {
                $transferApplicants = DB::table('users')->where('applicant_type', 'Transfer')
                    ->whereNotIn('users.id', $approvedArr)
                    ->join('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                    ->join('transfers', 'transfers.user_id', '=', 'users.id')
                    ->select('users.*', 'usersbiodata.gender', 'usersbiodata.created_at', 'usersbiodata.passport', 'usersbiodata.passport_type', 'usersbiodata.dob', 'transfers.course_applied', 'transfers.cgpa')
                    ->get();
                foreach ($transferApplicants as $transferapp) {
                    $assign = (array)$transferapp;
                    if (!$this->getQualifiedApplicants($user_type, "transfers", $assign['id']))
                        array_push($allAppli, $assign);
                }
            }

            foreach ($allAppli as $Allapp) {

                try {
                    DB::table('rejected_applicants')->insert([
                        'user_id' => $Allapp['id'],
                        'rejection_date' => today(),
                        'rejected_by' => $staff->id,
                    ]);
                } catch (QueryException $e) {
                    $error_code = $e->errorInfo[1];
                    if ($error_code == 1062) {
                        $rejectionMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Students have already been rejected </div>';
                        return redirect('/unqualified/' . $user_type)->with('rejectionMsg', $rejectionMsg);
                    } else {
                        $rejectionMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your rejection was not successful ' . $e->getMessage() . '</div>';
                        return redirect('/unqualified/' . $user_type)->with('rejectionMsg', $rejectionMsg);
                    }
                }
            }
            $rejectionMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Students have been rejected </div>';
            return redirect('/unqualified/' . $user_type)->with('rejectionMsg', $rejectionMsg);
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
            return redirect('/unqualified/')->with('loginMsg', $loginMsg);
        }
    }

    // Get qualified applicants
    private function getQualifiedApplicants($applicant_type, $table, $id)
    {

        // $pass_grades = ["A1", "A2", "A3", "B1", "B2", "B3", "C4", "C5", "C6"];
        // $passcount = 0;

        $applicantsDetails = DB::table($table)->where($table . '.user_id', $id)
        //     ->join('olevel', 'olevel.user_id', '=', $table . '.user_id')
             ->first();

        // $olevel = $applicantsDetails->olevel_result;

        // $olevel_array = json_decode($olevel);
        // foreach ($olevel_array as $olevel_arr) {

        //     if (in_array('English Language', (array)$olevel_arr) && in_array($olevel_arr->grade, $pass_grades)) {
        //         ++$passcount;
        //     }
        //     if (in_array('General Mathematics', (array)$olevel_arr) && in_array($olevel_arr->grade, $pass_grades)) {
        //         ++$passcount;
        //     }
        //     if (!in_array('English Language', (array)$olevel_arr) && !in_array('General Mathematics', (array)$olevel_arr) && in_array($olevel_arr->grade, $pass_grades)) {
        //         ++$passcount;
        //     }
        // }
        // if ($passcount >= 5) {

            if ($applicant_type == 'UTME') {
                $program = DB::table('programs')->where('name', $applicantsDetails->course_applied)->first();
                if ($applicantsDetails->score >= $program->jamb_cutoff) {
                    return true;
                }
            } elseif ($applicant_type == 'DE') {
                if ($applicantsDetails->grade >= 4.00) {
                    return true;
                }
            } elseif ($applicant_type == 'Transfer') {
                if ($applicantsDetails->cgpa >= 2.50) {
                    return true;
                }
            }
        }
        // return false;


    public function filterPgApplicants(Request $request)
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("filterPgApplicants",  $staff->id)) {
            $pgApplicants = DB::table('approved_applicants')->get();
            $approvedArr = array();
            $counter = 0;
            foreach ($pgApplicants as $pgApp) {
                $approvedArr[$counter] = $pgApp->user_id;
                $counter++;
            }

            $pgApplicants = DB::table('users')->where('applicant_type', 'pg')->whereBetween('usersbiodata.created_at', [date('Y-m-d', strtotime($request->start_date)), date('Y-m-d', strtotime($request->end_date))])
                ->whereNotIn('users.id', $approvedArr)
                ->join('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->join('pgs', 'pgs.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.gender', 'usersbiodata.created_at', 'usersbiodata.passport', 'usersbiodata.passport_type', 'pgs.mode', 'pgs.course_applied')
                ->get();
            $fullName = session('adminFirstName') . " " . session('adminsurname');
           return view('admissions.pgApplicants', compact('pgApplicants', 'fullName'));
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
           return view('admissions.error', compact('loginMsg'));
        }
    }

    public function filterUtmeApplicants(Request $request)
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("filterUtmeApplicants",  $staff->id)) {
            $utmeApplicants = DB::table('approved_applicants')->get();
            $approvedArr = array();
            $counter = 0;
            foreach ($utmeApplicants as $utmeApp) {
                $approvedArr[$counter] = $utmeApp->user_id;
                $counter++;
            }

            $utmeApplicants = DB::table('users')->where('applicant_type', 'utme')->whereBetween('usersbiodata.created_at', [date('Y-m-d', strtotime($request->start_date)), date('Y-m-d', strtotime($request->end_date))])
                ->whereNotIn('users.id', $approvedArr)
                ->join('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->join('utme', 'utme.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.gender', 'usersbiodata.created_at', 'usersbiodata.passport', 'usersbiodata.passport_type', 'utme.course_applied')
                ->get();

            $fullName = session('adminFirstName') . " " . session('adminsurname');
           return view('admissions.utmeApplicants', compact('utmeApplicants', 'fullName'));
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
           return view('admissions.error', compact('loginMsg'));
        }
    }

    public function filterDeApplicants(Request $request)
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("filterDeApplicants",  $staff->id)) {
            $deApplicants = DB::table('approved_applicants')->get();
            $approvedArr = array();
            $counter = 0;
            foreach ($deApplicants as $deApp) {
                $approvedArr[$counter] = $deApp->user_id;
                $counter++;
            }

            $deApplicants = DB::table('users')->where('applicant_type', 'de')->whereBetween('usersbiodata.created_at', [date('Y-m-d', strtotime($request->start_date)), date('Y-m-d', strtotime($request->end_date))])
                ->whereNotIn('users.id', $approvedArr)
                ->join('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->join('de', 'de.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.gender', 'usersbiodata.created_at', 'usersbiodata.passport', 'usersbiodata.passport_type', 'de.course_applied', 'de.qualification')
                ->get();

            $fullName = session('adminFirstName') . " " . session('adminsurname');
           return view('admissions.deApplicants', compact('deApplicants', 'fullName'));
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
           return view('admissions.error', compact('loginMsg'));
        }
    }

    public function filterTransferApplicants(Request $request)
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("filterTransferApplicants",  $staff->id)) {

            $transferApplicants = DB::table('approved_applicants')->get();
            $approvedArr = array();
            $counter = 0;
            foreach ($transferApplicants as $transferApp) {
                $approvedArr[$counter] = $transferApp->user_id;
                $counter++;
            }

            $transferApplicants = DB::table('users')->where('applicant_type', 'transfer')->whereBetween('usersbiodata.created_at', [date('Y-m-d', strtotime($request->start_date)), date('Y-m-d', strtotime($request->end_date))])
                ->whereNotIn('users.id', $approvedArr)
                ->join('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->join('transfers', 'transfers.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.gender', 'usersbiodata.created_at', 'usersbiodata.passport', 'usersbiodata.passport_type', 'transfers.course_applied', 'transfers.cgpa')
                ->get();

            $fullName = session('adminFirstName') . " " . session('adminsurname');
           return view('admissions.transferApplicants', compact('transferApplicants', 'fullName'));
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
           return view('admissions.error', compact('loginMsg'));
        }
    }

    public function adminRole(Request $req)
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("adminRole ",  $staff->id)) {

            try {
                $idcard = DB::table('roles')->insertGetId([

                    'role' => $req->role,
                    'name'=>$req->role,
                    'role_description' => $req->role_description,
                ]);


                DB::commit();

                $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> ' . $req->surname . ' Role added successfully. </div>';
                return redirect('/adminRole')->with('signUpMsg', $signUpMsg);
            } catch (QueryException $e) {
                DB::rollBack();
                $error_code = $e->errorInfo[1];
                if ($error_code == 1062) {
                    $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Role has already been added</div>';
                    return redirect('/adminRole')->with('signUpMsg', $signUpMsg);
                } else {
                    $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Role creation was not successful, please try again later</div>';
                    return redirect('/adminRole')->with('signUpMsg', $signUpMsg);
                }
            }
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
            return redirect('/adminRole')->with('loginMsg', $loginMsg);
        }
    }

    // Add tasks to role for Admins
    public function adminTaskToRole()
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("adminTaskToRole",  $staff->id)) {
            $roles = DB::table('roles')->get();
            $tasks = DB::table('tasks')->get();
          return view('admissions.addTaskToRole', compact('tasks', 'roles'));
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
           return view('admissions.error', compact('loginMsg'));
        }
    }

    //Submit addition of roles
    public function submitTaskToRole(Request $req)
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("submitTaskToRole",  $staff->id)) {
            $allTasks = $req->tasks;
            try {
                foreach ($allTasks as $allTask) {
                    DB::table('task_to_role')->insert([
                        'role_id' => $req->role,
                        'task_id' => $allTask
                    ]);
                }
                $approvalMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Task added successfully </div>';
                return redirect('/adminTaskToRole')->with('approvalMsg', $approvalMsg);
            } catch (QueryException $e) {
                $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Task addition was not successful </div>';
                return redirect('/adminTaskToRole')->with('approvalMsg', $approvalMsg);
            }
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
            return redirect('/adminTaskToRole')->with('loginMsg', $loginMsg);
        }
    }

    public function getRoleTasks(Request $req)
    {
        $staff = Auth::guard('staff')->user();
        $allAppli = array();
        $alltasks = DB::table('task_to_role')->where('role_id', $req->roleid)->get();
        $assignedTaskArr = array();
        $counter = 0;
        foreach ($alltasks as $task) {
            $assignedTaskArr[$counter] = $task->task_id;
            $counter++;
        }
        $selectedTasks = DB::table('tasks')->whereNotIn('id',  $assignedTaskArr)->get();
        $str = '<label class="fw-bold">Select Appropriate Task(s)</label>';
        foreach ($selectedTasks as $task) {
            $str .= '<div class="form-check is-invalid @enderror">
            <input class="form-check-input" type="checkbox" id="task" name="tasks[]" value="' . $task->id . '">
            <label class="form-check-label">' . $task->task . '</label>
        </div>';
        }

        $json = ["msg" => $str];
        return json_encode($json);
    }

    // Remove Tasks from Role
    public function adminRemoveTaskFromRole()
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("adminRemoveTaskFromRole",  $staff->id)) {
            $roles = DB::table('roles')->get();
            $tasks = DB::table('tasks')->get();
           return view('admissions.removeTaskFromRole', compact('tasks', 'roles'));
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
           return view('admissions.error', compact('loginMsg'));
        }
    }

    // Get tasks assigned to a particular role
    public function getTaskToRole(Request $req)
    {
        $staff = Auth::guard('staff')->user();
        $allAppli = array();
        $alltasks = DB::table('task_to_role')->where('role_id', $req->roleid)->get();
        $assignedTaskArr = array();
        $counter = 0;
        foreach ($alltasks as $task) {
            $assignedTaskArr[$counter] = $task->task_id;
            $counter++;
        }
        $selectedTasks = DB::table('tasks')->whereIn('id',  $assignedTaskArr)->get();
        $str = '<label class="fw-bold">Select Appropriate Task(s)</label>';
        foreach ($selectedTasks as $task) {
            $str .= '<div class="form-check is-invalid @enderror">
            <input class="form-check-input" type="checkbox" id="task" name="tasks[]" value="' . $task->id . '">
            <label class="form-check-label">' . $task->task . '</label>
        </div>';
        }

        $json = ["msg" => $str];
        return json_encode($json);
    }

    // Submit removal of roles
    public function submitRemoveTaskFromRole(Request $req)
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("submitRemoveTaskFromRole",  $staff->id)) {
            $allTasks = $req->tasks;
            try {
                foreach ($allTasks as $allTask) {
                    DB::table('task_to_role')
                        ->where('task_id', $allTask)
                        ->where('role_id', $req->role)
                        ->delete();
                }
                $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Task deleted successfully </div>';
                return redirect('/adminRemoveTaskFromRole')->with('approvalMsg', $approvalMsg);
            } catch (QueryException $e) {
                $approvalMsg = '<div class="alert alert-warning alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Task deletion was not successful </div>';
                return redirect('/adminRemoveTaskFromRole')->with('approvalMsg', $approvalMsg);
            }
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
            return redirect('/adminRemoveTaskFromRole')->with('loginMsg', $loginMsg);
        }
    }

    //Add Role to Admin
    public function roleToAdmin()
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("roleToAdmin",  $staff->id)) {

            $roles = DB::table('roles')->get();
            $admin = DB::table('staff')->get();
            $fullName = session('adminFirstName') . " " . session('adminsurname');
          return view('admissions.addAdminToRole', compact('admin', 'roles'));
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
           return view('admissions.error', compact('loginMsg'));
        }
    }

    public function getRoleAdmin(Request $req)
    {
        $allAppli = array();
        $alladmins = DB::table('role_to_admin')->where('staff_id', $req->admin)->get();
        $assignedTaskArr = array();
        $counter = 0;
        foreach ($alladmins as $role) {
            $assignedTaskArr[$counter] = $role->role_id;
            $counter++;
        }
        $selectedTasks = DB::table('roles')->whereNotIn('id',  $assignedTaskArr)->get();
        $str = '<label class="fw-bold">Select Appropriate Role(s)</label>';
        foreach ($selectedTasks as $task) {
            $str .= '<div class="form-check is-invalid @enderror">
            <input class="form-check-input" type="checkbox" id="role" name="roles[]" value="' . $task->id . '">
            <label class="form-check-label">' . $task->role . '</label>
        </div>';
        }

        $json = ["msg" => $str];
        return json_encode($json);
    }

    public function submitRoleToAdmin(Request $req)
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("submitRoleToAdmin",  $staff->id)) {
            $allRoles = $req->roles;
            try {
                foreach ($allRoles as $allRole) {
                    DB::table('role_to_admin')->insert([
                        'role_id' => $allRole,
                        'staff_id' =>  $req->admin
                    ]);
                }
                $approvalMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Admin added successfully </div>';
                return redirect('/roleToAdmin')->with('approvalMsg', $approvalMsg);
            } catch (QueryException $e) {
                $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Admin addition was not successful '.$e->getMessage();' </div>';
                return redirect('/roleToAdmin')->with('approvalMsg', $approvalMsg);
            }
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
            return redirect('/roleToAdmin')->with('loginMsg', $loginMsg);
        }
    }

    public function removeRoleFromAdmin()
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("removeRoleFromAdmin",  $staff->id)) {
            $roles = DB::table('roles')->get();
            $admin = DB::table('staff')->get();
          return view('admissions.removeRoleFromAdmin', compact('admin', 'roles'));
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
           return view('admissions.error', compact('loginMsg'));
        }
    }

    public function submitRemoveRoleFromAdmin(Request $req)
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("submitRemoveRoleFromAdmin",  $staff->id)) {
            $allRoles = $req->roles;
            try {
                foreach ($allRoles as $allRole) {
                    DB::table('role_to_admin')
                        ->where('role_id', $allRole)
                        ->where('staff_id', $req->admin)
                        ->delete();
                }
                $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Role deleted successfully </div>';
                return redirect('/removeRoleFromAdmin')->with('approvalMsg', $approvalMsg);
            } catch (QueryException $e) {
                $approvalMsg = '<div class="alert alert-warning alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Role deletion was not successful </div>';
                return redirect('/removeRoleFromAdmin')->with('approvalMsg', $approvalMsg);
            }
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
            return redirect('/removeRoleFromAdmin')->with('loginMsg', $loginMsg);
        }
    }

    // Get role(s) assigned to a particular admin
    public function getRoleToAdmin(Request $req)
    {
        $allAppli = array();
        $allroles = DB::table('role_to_admin')->where('staff_id', $req->adminid)->get();
        $assignedroleArr = array();
        $counter = 0;
        foreach ($allroles as $role) {
            $assignedroleArr[$counter] = $role->role_id;
            $counter++;
        }
        $selectedroles = DB::table('roles')->whereIn('id',  $assignedroleArr)->get();
        $str = '<label class="fw-bold">Select Appropriate role(s)</label>';
        foreach ($selectedroles as $role) {
            $str .= '<div class="form-check is-invalid @enderror">
            <input class="form-check-input" type="checkbox" id="role" name="roles[]" value="' . $role->id . '">
            <label class="form-check-label">' . $role->role . '</label>
        </div>';
        }

        $json = ["msg" => $str];
        return json_encode($json);
    }

    // View all Admins
    public function viewAdmins()
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("viewAdmins",  $staff->id)) {
            $allAdmins = DB::table('admin')->get();
            $fullName = session('adminFirstName') . " " . session('adminsurname');
           return view('admissions.viewAdmins', compact('allAdmins', 'fullName'));
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
           return view('admissions.error', compact('loginMsg'));
        }
    }

    //Delete Admin
    public function deleteAdmin($adminID)
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("deleteAdmin",  $staff->id)) {

            try {
                DB::table('role_to_admin')
                    ->where('admin_id', $adminID)
                    ->delete();

                DB::table('admin')
                    ->where('id', $adminID)
                    ->delete();

                $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Administrator deleted successfully </div>';
                return redirect('/viewAdmins')->with('approvalMsg', $approvalMsg);
            } catch (QueryException $e) {
                $approvalMsg = '<div class="alert alert-warning alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Administrator deletion was not successful </div>';
                return redirect('/viewAdmins')->with('approvalMsg', $approvalMsg);
            }
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
            return redirect('/viewAdmins')->with('loginMsg', $loginMsg);
        }
    }

    private function hasPriviledge($functionName, $adminID)
    {

        $task = DB::table('tasks')->where('task_function', $functionName)->first();
        //  return($task->id." : ".$adminID);
        $roles = DB::table('task_to_role')->where('task_id', $task->id)->get();

        foreach ($roles as $role) {
            if (DB::table('role_to_admin')->where('role_id', $role->role_id)->where('admin_id', $adminID)->exists()) {
                return true;
            }
        }
        return false;
    }



//NEW UPDATE FUNCTIONS

 public function editusers($id)
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("editusersinfo",  $staff->id)) {
            // $allAppli = array();
            // $allApplicants = DB::table('users')->get();
            // $approvedArr = array();
            // $counter = 0;
            // foreach ($allApplicants as $allApp) {
            //     $approvedArr[$counter] = $allApp->user_id;
            //     $counter++;
            // }

            $allApp = DB::table('users')
                 ->where('email', $id)
                ->select('users.*')
                ->first();

            $fullName = session('adminFirstName') . " " . session('adminsurname');
           return view('admissions./editusers', compact('allApp', 'fullName'));
        }
        else {
           $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
          return view('admissions.error', compact('loginMsg'));
        }
    }

    public function editusersinfo(Request $req){
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("editusersinfo",  $staff->id)) {

        try {
            DB::table('users')->where('email', $req->email)
                ->update([

                    'first_name' => $req->first_name,
                    'surname' => $req->surname,
                    'email' => $req->email,
                    'phone' => $req->phone,
                    'applicant_type' =>$req->applicant_type,
                    'email_verified_at' =>Carbon::now()

                ]);
                $approvalMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You have successful Edited the User '.$req->first_name.'  '.$req->surname.' </div>';
                return redirect('/admissons/students/search')->with('approvalMsg', $approvalMsg);

        } catch (QueryException $e) {
            $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your Edit was not successful'.$e->getMessage();' </div>';
            return redirect('/admissons/students/search')->with('approvalMsg', $approvalMsg);
            // return redirect('/newPayment/')->with('mgs',$statusMsg);
        }
    }
    else {
       $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
      return view('admissions.error', compact('loginMsg'));
    }
}

    public function resetuserspassword(Request $req)
    {
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("resetuserpassword",  $staff->id)) {

        try {
            $newpass='welcome';
            // dd($newpass);
            DB::table('users')->where('email', $req->email)
            ->update([

                // 'email' => $req->email,
                //Hash::make to encrpty or hash the password
                'password' => Hash::make($newpass)

            ]);

                $approvalMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> '. $req->email.' Password has been Reset to <strong>welcome</strong> </div>';
                return redirect('/admissons/students/search')->with('approvalMsg', $approvalMsg);
                // return redirect('allUsers');
        } catch (QueryException $e) {
            $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your Verification was not successful'.$e->getMessage();' </div>';
            return redirect('/admissons/students/search')->with('approvalMsg', $approvalMsg);
            // return redirect('/newPayment/')->with('mgs',$statusMsg);
        }
    }
 else {
    $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
   return view('admissions.error', compact('loginMsg'));
 }
 }

 public function resetadminpassword(Request $req)
 {
    $staff = Auth::guard('staff')->user();
     if ($this->hasPriviledge("resetadminpassword",  $staff->id)) {

     try {
         $newpass='welcome@123';
         DB::table('staff')->where('username', $req->email)
         ->update([

             // 'email' => $req->email,
             //Hash::make to encrpty or hash the password
             'password' => Hash::make($newpass)

         ]);
             $approvalMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Admin Password has been Reset to <strong>welcome@123</strong> </div>';
             return redirect('/viewAdmins')->with('approvalMsg', $approvalMsg);
             // return redirect('allUsers');
     } catch (QueryException $e) {
         $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your password reset not successful'.$e->getMessage();' </div>';
         return redirect('/viewAdmins')->with('approvalMsg', $approvalMsg);
         // return redirect('/newPayment/')->with('mgs',$statusMsg);
     }
 }
else {
 $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
return view('admissions.error', compact('loginMsg'));
}
}

    // ADD REMITA SERVICE TYPE
public function viewaddRemitasServiceType(){
    $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("addRemitaServiceType",  $staff->id)) {
           return view('admissions.addRemitaServiceType');
        }
        else {
           $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
          return view('admissions.error', compact('loginMsg'));
        }
    }
    public function addRemitaServiceType(Request $req){
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("addRemitaServiceType",  $staff->id)) {


            // dd($req);
            DB::beginTransaction();

            try {

                DB::table('fee_types')->insert([

                    'name' => $req->name,
                    'amount' => $req->amount,
                    'provider' => 'Remita',
                    'delivery_code' => 1,
                    'gender_code' => 1,
                    'provider_code' => $req->provider_code,
                    'status' => 1,
                    'category' => $req->category,
                    'installment'=>$req->installment,
                    'college_id'=> $req->college_id

                ]);



                //  Mail::to($req->email)->send(new Confirmsignup($mailData));
                DB::commit();

                $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong></strong>Remita Service Type Successfully Added! </div>';
                return redirect('/addRemitaServiceType')->with('signUpMsg', $signUpMsg);;
                // return redirect('/viewRemitaServiceType');
                // ->with('signUpMsg',$signUpMsg);
            } catch (QueryException $e) {
                DB::rollBack();
                $error_code = $e->errorInfo[1];
                if ($error_code == 1062) {
                    $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> You cant add Thesame Serice Type Twice </div>';
                    return redirect('/addRemitaServiceType')->with('signUpMsg', $signUpMsg);
                } else {
                    // $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong>  Try again </div>';
                      $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong>  please try again'.$e->getMessage().'</div>';
                    return redirect('/addRemitaServiceType')->with('signUpMsg', $signUpMsg);
                }
            }
        }
        else {
           $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
          return view('admissions.error', compact('loginMsg'));
        }
        }
    public function viewRemitaServiceType(){
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("viewRemitaServiceType",  $staff->id)) {
        $fee_types = fee_types::orderBy('status', 'ASC')
        ->where('status', 1)
        ->get();
        $fee_typess = fee_types::orderBy('status', 'ASC')
        ->where('status', 2)
        ->get();
       return view('admissions./viewRemitaServiceType', compact('fee_typess'), ['fee_types' => $fee_types,  ['fee_types' => $fee_typess]]);
    }
    else {
       $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
      return view('admissions.error', compact('loginMsg'));
    }
    }

    public function editRemitaServiceType(Request $req, $id){
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("editRemitaServiceType",  $staff->id)) {
        $fee_types = DB::table('fee_types')
        ->where('provider_code', $id)
        ->select('fee_types.*')
        ->first();
       return view('admissions./editRemitaServiceType', compact('fee_types'), ['fee_types' => $fee_types]);
    }
    else {
       $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
      return view('admissions.error', compact('loginMsg'));
    }
    }

    public function editRemitaServiceTypefee(Request $req){
        $staff = Auth::guard('staff')->user();
        if ($this->hasPriviledge("editRemitaServiceType",  $staff->id)) {
        try {

            DB::table('fee_types')->where('provider_code', $req->provider_code)
                ->update([

                    'name' => $req->name,
                    'amount' => $req->amount,
                    'provider_code' => $req->provider_code

                ]);
                $signUpMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You have successful Edited this Service Type </div>';
                return redirect('/viewRemitaServiceType')->with('signUpMsg', $signUpMsg);

        } catch (QueryException $e) {
            $signUpMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your Edit was not successful'.$e->getMessage();' </div>';
            return redirect('viewRemitaServiceType')->with('signUpMsg', $signUpMsg);
            // return redirect('/newPayment/')->with('mgs',$statusMsg);
        }
    }
    else {
       $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
      return view('admissions.error', compact('loginMsg'));
    }
    }


   public function suspendRemitaServiceType(Request $req){
    $staff = Auth::guard('staff')->user();
    if ($this->hasPriviledge("suspendRemitaServiceType",  $staff->id)) {
    try {
        DB::table('fee_types')->where('provider_code', $req->provider_code)
            ->update([

                'status' => "2"

            ]);
            $signUpMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You have successful Suspended this Service Type </div>';
            return redirect('/viewRemitaServiceType')->with('signUpMsg', $signUpMsg);

    } catch (QueryException $e) {
        $signUpMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your Suspend was not successful'.$e->getMessage();' </div>';
        return redirect('viewRemitaServiceType')->with('signUpMsg', $signUpMsg);
        // return redirect('/newPayment/')->with('mgs',$statusMsg);
    }
}
else {
   $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
  return view('admissions.error', compact('loginMsg'));
}


   }


   public function activeRemitaServiceType(Request $req){
    $staff = Auth::guard('staff')->user();
    if ($this->hasPriviledge("activeRemitaServiceType",  $staff->id)) {
    try {
        DB::table('fee_types')->where('provider_code', $req->provider_code)
            ->update([

                'status' => "1"

            ]);
            $signUpMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You have successful Activated this Service Type </div>';
            return redirect('/viewRemitaServiceType')->with('signUpMsg', $signUpMsg);

    } catch (QueryException $e) {
        $signUpMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your Activation was not successful'.$e->getMessage();' </div>';
        return redirect('viewRemitaServiceType')->with('signUpMsg', $signUpMsg);
        // return redirect('/newPayment/')->with('mgs',$statusMsg);
    }
}
else {
   $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
  return view('admissions.error', compact('loginMsg'));
}


   }


   public function search()
    {
        // $this->authorize('search', Student::class);
        return view('admissions.students.admin.search');
    } //end search


    public function find(Request $request)
    {
    //    $this->authorize('search', Student::class);
        $users = DB::table('users')
        ->where('surname', 'like', '%'.$request->data.'%')
        ->orWhere('id', $request->data)
        ->orWhere('first_name', 'like', '%'.$request->data.'%')
        ->orWhere('phone', 'like', '%'.$request->data.'%')
        ->orWhere('email', 'like', '%'.$request->data.'%')
        //add full matric search
        //->orWhereHas('academic', function ($query) use ($request){
            //$query->where('mat_no', '=', $request->data);
        //})
        ->orderBy('id')
        ->orderBy('surname')
        ->paginate(50);
        if(count($users) > 0)
        {
            $request->session()->flash('message', '');
            return view('admissions.students.admin.list',compact('users'));
        }
        else
        {
            $request->session()->flash('message', 'No Matching Applicants record found. Try to search again !');
            return view ('admissions.students.admin.search');
        }

    } // end find


}

