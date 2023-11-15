<?php

namespace App\Http\Controllers;

use App\Category;
use App\FeeType;
//use App\program;
use App\Http\Controllers\Controller;
use App\Mail\Confirmsignup;
use App\Mail\forgotpassword;
use App\Mail\Referee;
use App\Models\admissionType;
use App\Models\CountryCodes;
use App\Models\fee_types;
use App\Models\Remitas;
use App\Program;
use App\subjects;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\ImageManagerStatic as Image;

//use Intervention\Image\ImageManagerStatic as Image;

class ApplicantController extends Controller
{

    protected function getCurrentAdmissionSession()
    {
        $session = DB::table('admission_sessions')->where('status', 1)
            ->select('admission_sessions.id')->first();
        $ses = $session->id;
        $currentadmissionsession = $ses;
        return $currentadmissionsession;
    }

    //Mail base URL
    public function getBaseurl()
    {
        return 'https://admissions.veritas.edu.ng';
    }

    // Registeration Fuction
    public function register(Request $req)
    {
        //Comfirm password verification
        if ($req->password == $req->password_confirmation) {
            $jsonstring = "";
            //db::beginTransaction is use if your going to be insert and updating into tables
            DB::beginTransaction();
            //try and catch to get the errors
            try {
                $idcard = DB::table('users')->insertGetId([

                    'surname' => $req->surname,
                    'first_name' => $req->first_name,
                    'middle_name' => $req->middle_name,
                    'phone' => $req->phone,
                    'email' => $req->email,
                    'session_id' => $this->getCurrentAdmissionSession(),
                    //Hash::make to encrpty or hash the password
                    'password' => Hash::make($req->password),

                ]);

                //$fullName = $req->first_name." ".$req->surname;
                //Data That will be deisplayed at the email address portal
                $mailData = [
                    'title' => 'Welcome to Veritas Admission Portal',
                    'msg' => 'Thank you for Registering , please click on the button below to activate your account',
                    'url' => $this->getBaseUrl() . '/confirmation/?applicant=' . base64_encode($idcard),
                    // 'url' => $this->getBaseUrl().'/='.base64_encode($req->idcard),
                    //  'surname'=>$req->surname
                    'surname' => $req->first_name . " " . $req->middile_name . " " . $req->surname,
                ];

                DB::table('password_resets')->insert([
                    'email' => $req->email,
                    'token' => 'welcome',
                ]);
                //To send the mail to uour email
                Mail::to($req->email)->send(new Confirmsignup($mailData));
                DB::commit();

                $signUpMsg = '<div class="alert alert-success alert-dismissible text-lg"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> ' . $req->surname . ' Your Registration was successful, please follow the instruction sent to your mail ' . $req->email . ' to complete the process</div>';
                return redirect('/register')->with('signUpMsg', $signUpMsg);
            } catch (QueryException $e) {
                DB::rollBack();
                $error_code = $e->errorInfo[1];
                if ($error_code == 1062) {
                    $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> You have registered before</div>';
                    return redirect('/register')->with('signUpMsg', $signUpMsg);
                } else {
                    // $signUpMsg =$e->getMessage();
                    $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Your registration was not successful, please try again later or Veritas Univeristy help line</div>';
                    return redirect('/register')->with('signUpMsg', $signUpMsg);
                }
            }
        } else {
            $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Password mismatched</div>';
            return redirect('/register')->with('signUpMsg', $signUpMsg);
        }
    }
    //Function for verifying the sent email
    public function cofirmation(Request $req)
    {
        $cofirm = base64_decode($req->applicant);
        DB::table('users')->where('id', $cofirm)->update([
            'email_verified_at' => now(),
        ]);
        $signUpMsg = '<div class="alert alert-success text-align-center alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Your email has been Verified you can now Login</strong></div>';
        return redirect('/admissions/login')->with('signUpMsg', $signUpMsg);
    }
    // End of Registration Function

    // Begin of Login function
    public function login(Request $request)
    {
        $admissiontype = admissionType::where('status', 1)->orderBy('id', 'ASC');
        $users = DB::table('users')->where('email', $request->email)
            ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
            ->leftJoin('remitas', 'remitas.user_id', '=', 'users.id')
            ->select('users.*', 'usersbiodata.status', 'usersbiodata.user_id', 'remitas.status_code', 'remitas.fee_type', 'remitas.amount', 'remitas.fee_type_id')
            ->get();
        if ($users->isEmpty()) {
            // Email not found in database
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button>  Wrong Email  </div>';
            return redirect('/admissions/login')->with('loginMsg', $loginMsg);
        }

        // $admission = DB::table('users') -> where('users.id', session('userid'))->get();
        if ($users) {
            // dd($users);

            foreach ($users as $users) {

                if ($users->status_code == '01' && ($users->amount >= 170000 && $users->fee_type_id != '2' || $users->fee_type_id != '4' || $users->fee_type_id != '118')) {
                    if (Hash::check($request->password, $users->password)) {

                        if ($users->email_verified_at != null) {

                            session(['userid' => $users->id]);
                            session(['usersFirstName' => $users->first_name]);
                            session(['usersMiddleName' => $users->middle_name]);
                            session(['userssurname' => $users->surname]);
                            session(['usersPhone' => $users->phone]);
                            session(['usersEmail' => $users->email]);
                            session(['usersType' => $users->applicant_type]);
                            session(['status' => $users->status]);
                            session(['status_code' => $users->status_code]);
                            session(['fee_type' => $users->fee_type]);
                        }
                    }
                    $billing = $this->paymen();
                    // return redirect('/completeadmissions');
                }
                if ($users->status_code == '01' && ($users->fee_type == 'Acceptance fees (Undergraduate ) (₦100000)' || $users->fee_type == 'Acceptance Fees (Postgraduate) (₦50000)')) {
                    if (Hash::check($request->password, $users->password)) {

                        if ($users->email_verified_at != null) {

                            session(['userid' => $users->id]);
                            session(['usersFirstName' => $users->first_name]);
                            session(['usersMiddleName' => $users->middle_name]);
                            session(['userssurname' => $users->surname]);
                            session(['usersPhone' => $users->phone]);
                            session(['usersEmail' => $users->email]);
                            session(['usersType' => $users->applicant_type]);
                            session(['status' => $users->status]);
                        }
                    }
                    return redirect('/schoolfeespayment');
                }
            }

            // To check if the email entered is our db

            // to check password
            if (Hash::check($request->password, $users->password)) {

                if ($users->email_verified_at != null) {

                    session(['userid' => $users->id]);
                    session(['usersFirstName' => $users->first_name]);
                    session(['usersMiddleName' => $users->middle_name]);
                    session(['userssurname' => $users->surname]);
                    session(['usersPhone' => $users->phone]);
                    session(['usersEmail' => $users->email]);
                    session(['usersType' => $users->applicant_type]);
                    session(['status' => $users->status]);

                    $fullName = $users->first_name . " " . $users->surname;
                    if ($users->applicant_type == 'UTME' && $users->status < 4) {
                        return redirect('/utme');
                    } elseif ($users->applicant_type == 'DE' && $users->status < 4) {
                        return redirect('/de');
                    } elseif ($users->applicant_type == 'Transfer' && $users->status < 4) {
                        return redirect('/transfers');
                    } elseif ($users->applicant_type == 'PG' && $users->status < 4) {
                        return redirect('/pg');
                    }

                    if ($users->status >= 4) {

                        return redirect('/admission');
                    }

                    return $this->paymen();
                    // return redirect('/adminHome') ->with ('name', $fullName);
                    // return view('admissions/home', compact('fullName','admissiontype'));

                } else {
                    $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button>  Your Acount have not been Activated, Kindly Check your Mail to Verify your Account </div>';

                    return redirect('/admissions/login')->with('loginMsg', $loginMsg);
                }
            } else {
                $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button>  Wrong  Password </div>';
                return redirect('/admissions/login')->with('loginMsg', $loginMsg);
            }
        }{
            $loginMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Wrong email or password</div>';
            return redirect('/admissions/login')->with('loginMsg', $loginMsg);
        }
        //echo $jsonstring;
    }

    //   END OF LOGIN FUNCTION

    //HOME VIEW

    public function home()
    {
        $admissiontype = admissionType::where('status', 1)->orderBy('id', 'ASC');
        return view('admissions/home', compact('admissiontype'));
    }
    //FORGOT PASSWORD

    public function forgotpassword(Request $req)
    {

        $forgotpassword = DB::table('users')->where('email', $req->email)->first();
        if ($forgotpassword) {
            $currenttime = time();
            DB::table('password_resets')->where('email', $req->email)
                ->update(['token' => $currenttime]);

            // $fullName = $req->first_name." ".$req->surname;

            $mailData = [
                'title' => 'Welcome to Veritas Admission Portal',
                'msg' => 'Password Reset Request',
                // 'url' => $this->getBaseUrl().'/forgotpassword/?applicant='.base64_encode($forgotpassword),
                // 'url' => $this->getBaseUrl().'/confirmation/?applicant='.base64_encode( $forgotpassword),
                'url' => $this->getBaseUrl() . '/resetpassword/?pwrc=' . base64_encode($currenttime) . '&uid=' . base64_encode($req->email),
                //  'surname'=>$req->surname
                'surname' => $forgotpassword->first_name . " " . $forgotpassword->surname,

            ];

            Mail::to($req->email)->send(new forgotpassword($mailData));
            $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> ' . $req->surname . ' We sent an email to ' . $req->email . ' with instructions how to reset your password.</div>';
            return redirect('/forgotpassword')->with('signUpMsg', $signUpMsg);
        } else {
            $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Email address doesnt exit</div>';
            return redirect('/forgotpassword')->with('signUpMsg', $signUpMsg);
        }
    }

    public function forgotpasswordSetNew(Request $req)
    {
        $pwrc = base64_decode($req->pwrc);
        $uid = base64_decode($req->uid);
        $myLink = DB::table('password_resets')->where('email', $uid)->where('token', $pwrc)->first();
        if ($myLink) {
            return view('admissions./forgotpasswordSetNew', compact('uid'));
        } else {
            echo "This Link does not exist";
            return false;
        }
    }

    public function resetpassword(Request $req)
    {

        if ($req->password == $req->password_confirmation) {
            DB::table('users')->where('email', $req->email)
                ->update([

                    'email' => $req->email,
                    //Hash::make to encrpty or hash the password
                    'password' => Hash::make($req->password),
                ]);

            $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Your Password Reset was Successfull</div>';
            return redirect('/admissions/login')->with('signUpMsg', $signUpMsg);
        } else {
            $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Password mismatched</div>';
            return redirect('/forgotpasswordSetNew')->with('signUpMsg', $signUpMsg);
        }
    }

    // LOGOUT FUNCTION
    public function logoutUsers()
    {
        session()->flush();
        return redirect('/admissions/login');
    }
    // END OF LOGOUT FUNCTION

    // HOME FUNCTION PASSING PARAMETER USEFUL FOR THE BLADE
    public function sidebaradmission()
    {
        $admissiontype = admissionType::where('status', 1)->orderBy('id', 'ASC')->paginate(20);
        return redirect('adminsials.sidebar', compact('admissiontype'));
    }

    public function paymen()
{
    $admissiontype = admissionType::where('status', 1)->orderBy('id', 'ASC')->paginate(20);
    

    $payment = DB::table('users')->where('users.id', session('userid'))
        ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
        ->leftJoin('remitas', 'remitas.user_id', '=', 'users.id')
        ->select('remitas.status_code', 'remitas.amount','remitas.fee_type', 'remitas.fee_type_id', 'remitas.created_at')
        ->get();

    foreach ($payment as $utm) {
        if ($utm->status_code == '01' && $utm->amount >= 170000) {
            return redirect('completeadmissions');
        }
    }

    foreach ($payment as $utm) {
        if ($utm->status_code == '01' && ($utm->fee_type_id == '2' || $utm->fee_type_id == '4' || $utm->fee_type_id == '118')) {
            return redirect('/schoolfeespayment');
        }
    }
    
    $paymen = DB::table('users')->where('users.id', session('userid'))
        ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
        ->select('usersbiodata.status')->first();

    // Check if $paymen is not null before accessing its property
    if ($paymen && $paymen->status >= 4) {
        return redirect('/admission');
    }


    return view('admissions.home', compact('paymen', 'admissiontype'));
}


    // END OF HOME FUNCTION PASSING PARAMETER USEFUL FOR THE BLADE

    // UTME FUNCTION PASSING PARAMETER USEFUL FOR THE BLADE
    public function utme()
    {
        $admissiontype = admissionType::where('status', 1)->orderBy('id', 'ASC')->paginate(20);
        $utme = DB::table('users')->where('users.id', session('userid')) //-> where('remitas.status_code', '01')
            ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
            ->select('users.surname', 'users.first_name', 'users.middle_name', 'users.phone', 'users.email', 'usersbiodata.status', )->first();
        $programs = Program::orderBy('name', 'ASC')->get();
        $subjects = subjects::orderBy('subject_name', 'ASC')->get();
        $country = CountryCodes::orderByRaw("CASE WHEN countryname = 'Nigeria' THEN -1 ELSE countryname END")->pluck('countryname', 'countryname');

        $utmeremita = DB::table('users')->where('users.id', session('userid')) //-> where('remitas.status_code', '01')
            ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
            ->leftJoin('remitas', 'remitas.user_id', '=', 'users.id')
            ->select('remitas.status_code', 'remitas.fee_type', 'remitas.created_at')->get();

        foreach ($utmeremita as $utm) {
            if ($utm->status_code == '01' && $utm->fee_type == 'Application Fee (Under Graduate) (₦7000)') {
                return view('admissions./utme', compact('utme', 'utmeremita', 'admissiontype'), ['programs' => $programs, 'subjects' => $subjects, 'country' => $country]);
            }
        }
        $signUpMsg = '<div class="alert alert-success text-align-center alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>You Have to make payment before filling out your application form, Please kindly generate RRR to continue</strong></div>';
        return redirect('/newPayment')->with('signUpMsg', $signUpMsg);
    }

    // PAYMENT FOR REMITA application fee
    public function payment()
    {
        $payment = DB::table('users')->where('users.id', session('userid'))
            ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')->get();
        $fee_types = fee_types::orderBy('status', 'ASC')
            ->where('status', 1)
            ->where('category', 1)
            ->get();
        $fee_typess = fee_types::orderBy('status', 'ASC')
            ->where('status', 1)
            ->where('category', 1)
            ->get();

        return view('admissions.newPayment', compact('payment'), ['fee_types' => $fee_types, 'fee_typess' => $fee_typess]);
    }
    private function getdptcollegid($course_applied)
    {
        $deptCol = array();

        $getdptcollege = DB::table('programs')->where('programs.name', $course_applied)
            ->join('academic_departments', 'programs.academic_department_id', '=', 'academic_departments.id')->first();

        if (!$getdptcollege) {
            // Handle the case when no matching program is found
            return null;
        }

        $deptCol['dept'] = $getdptcollege->id;

        $getdptcollege = DB::table('colleges')->where('id', $getdptcollege->college_id)->first();

        if (!$getdptcollege) {
            // Handle the case when no matching college is found
            return null;
        }

        $deptCol['col'] = $getdptcollege->id;

        return $deptCol;
    }

    public function schoolfeespayment()
    {
        $payment = DB::table('users')->where('users.id', session('userid'))
            ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')->first();
        if ($payment && ($payment->applicant_type == 'UTME' || $payment->applicant_type == 'DE' || $payment->applicant_type == 'Transfer')) {
            $utmeadmission = DB::table('users')->where('users.id', session('userid'))
                ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->join('approved_applicants', 'approved_applicants.user_id', '=', 'users.id')
                ->leftJoin('utme', 'utme.user_id', '=', 'users.id')
                ->leftJoin('academic_departments', 'academic_departments.id', '=', 'users.id')
                ->leftJoin('colleges', 'colleges.id', '=', 'users.id')
                ->leftJoin('programs', 'programs.id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.middle_name', 'approved_applicants.approval_date', 'utme.course_applied', 'academic_departments.name', 'colleges.name', 'programs.duration')->get();

            //$programs= programs::orderBy('name','ASC')->get();
            $facultyAndDept = array();
            foreach ($utmeadmission as $ca) {
                $facultyAndDept = $this->getdptcollegid($ca->course_applied);
            }
            $deadmission = DB::table('users')->where('users.id', session('userid'))
                ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->join('approved_applicants', 'approved_applicants.user_id', '=', 'users.id')
                ->leftJoin('de', 'de.user_id', '=', 'users.id')
                ->leftJoin('academic_departments', 'academic_departments.id', '=', 'users.id')
                ->leftJoin('colleges', 'colleges.id', '=', 'users.id')
                ->leftJoin('programs', 'programs.id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.middle_name', 'approved_applicants.approval_date', 'de.course_applied', 'academic_departments.name', 'colleges.name', 'programs.duration')->get();

            //$programs= programs::orderBy('name','ASC')->get();

            $facultyAndDept = array();
            foreach ($deadmission as $ca) {
                $facultyAndDept = $this->getdptcollegid($ca->course_applied);
            }
            $transferadmission = DB::table('users')->where('users.id', session('userid'))
                ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->join('approved_applicants', 'approved_applicants.user_id', '=', 'users.id')
                ->leftJoin('transfers', 'transfers.user_id', '=', 'users.id')
                ->leftJoin('academic_departments', 'academic_departments.id', '=', 'users.id')
                ->leftJoin('colleges', 'colleges.id', '=', 'users.id')
                ->leftJoin('programs', 'programs.id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.middle_name', 'approved_applicants.approval_date', 'transfers.course_applied', 'academic_departments.name', 'colleges.name', 'programs.duration')->get();

            //$programs= programs::orderBy('name','ASC')->get();

            $facultyAndDept = array();
            foreach ($transferadmission as $ca) {
                $facultyAndDept = $this->getdptcollegid($ca->course_applied);
            }

            $fee_types = fee_types::orderBy('name', 'ASC')
                ->where('status', 1)
                ->where('category', 3)
                //to make school fess not availbe for UG
                    //  ->where('category', 11)
                // ->where('gender_code', $payment->gender)
                // ->where('college_id', $facultyAndDept['col'])
                ->get();
            $fee_typess = fee_types::orderBy('name', 'ASC')
                ->where('status', 1)
                ->where('category', 3)
                //to make school fess not availbe for UG
                //    ->where('category', 11)
                ->get();

            return view('admissions.schoolfeespayment', compact('payment'), ['fee_types' => $fee_types, 'fee_typess' => $fee_typess]);

        } else {
            $pgadmission = DB::table('users')->where('users.id', session('userid'))
                ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->join('approved_applicants', 'approved_applicants.user_id', '=', 'users.id')
                ->leftJoin('pgs', 'pgs.user_id', '=', 'users.id')
                ->leftJoin('academic_departments', 'academic_departments.id', '=', 'users.id')
                ->leftJoin('colleges', 'colleges.id', '=', 'users.id')
                ->leftJoin('programs', 'programs.id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.middle_name', 'approved_applicants.approval_date', 'pgs.course_applied', 'academic_departments.name', 'colleges.name', 'programs.duration')->get();

            //$programs= programs::orderBy('name','ASC')->get();

            $facultyAndDept = array();
            foreach ($pgadmission as $ca) {
                $facultyAndDept = $this->getdptcollegid($ca->course_applied);
            }
            $fee_types = fee_types::orderBy('name', 'ASC')
                ->where('status', 1)
                ->where('category', 5)
            // ->where('college_id', $facultyAndDept['col'])
                ->get();
            $fee_typess = fee_types::orderBy('name', 'ASC')
                ->where('status', 1)
                ->where('category', 3)
                ->get();

            return view('admissions.schoolfeespayment', compact('payment'), ['fee_types' => $fee_types, 'fee_typess' => $fee_typess]);
        }

    }

    public function payremi(Request $req)
    {
        $user_id = session('userid');

        // Count the number of unpaid RRRs with status code 025 for the student
        $unpaid_rrr_count = DB::table('remitas')
            ->where('user_id', $user_id)
            ->where('status_code', '025')
            ->count();

        // if ($unpaid_rrr_count >= 5) {
                   if ($unpaid_rrr_count >= 3000) {
            // The student has already created 5 or more unpaid RRRs, so don't insert a new RRR
            // $json = array('success' => false, 'route' => '/home', 'msg' => 'You have reached the maximum number of unpaid Generated RRRs, Please pay your outstanding RRR before generating a new RRR. Visit ICT Unit or Bursary .');
            $json = array('success' => false, 'route' => '/home', 'msg' => 'You have reached the maximum number of unpaid Generated RRRs, Please pay your outstanding RRR before generating a new RRR. Go to Payment View and Delete unpaid RRR .');
            $jsonstring = json_encode($json, JSON_HEX_TAG);
            echo $jsonstring;
            return;
        }
        // DB::beginTransaction();
        try {
            DB::table('remitas')->insert([
                'user_id' => session('userid'),
                'rrr' => $req->rrr,
                'order_id' => $req->orderId,
                'fee_type' => $req->feeType,
                'fee_type_id' => $req->fee_type_id,
                'service_type_id' => $req->serviceTypeId,
                'amount' => $req->amount,
                'status_code' => $req->statuscode,
                'status' => $req->status,
                'request_ip' => $_SERVER['REMOTE_ADDR'],
            ]);
            // DB::table('usersbiodata')->where('user_id', session('userid'))->update([
            //     'status' => 5

            // ]);

            // //  Mail::to($req->email)->send(new Confirmsignup($mailData));
            // DB::commit();
            $json = array('success' => true, 'route' => '/paymentview/', 'id' => session('userid'));
            $jsonstring = json_encode($json, JSON_HEX_TAG);
            echo $jsonstring;
            //return redirect('/paymentview/'.session('userid'));
        } catch (QueryException $e) {
            // $statusMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> RRR not generated successfuly, please try again ' . $e->getMessage() . "###" . $req->rrr . '</div>';
            $statusMsg = 'RRR not generated successfuly, please try again or contact ICT';

            $json = array('success' => false, 'route' => '/home', 'msg' => $statusMsg);
            $jsonstring = json_encode($json, JSON_HEX_TAG);
            echo $jsonstring;
            // return redirect('/newPayment/')->with('mgs',$statusMsg);
        }
    }
    private function getcurrentsession(){
        $session = DB::table('bursary_sessions')->where('status', 1)
        ->select ('bursary_sessions.id')->first();
        $ses=$session->id;
        $currentsession =$ses;
        return $currentsession;
    }

    public function viewpayment($id)
    {
        $viewpayment = DB::table('remitas')->where('user_id', session('userid'))
            ->orderBy('status_code', 'ASC')->orderBy('created_at', 'DESC')
            // ->get();
            ->paginate(5);

        $verifyResponse = $this->verifyRRRALL();
        //$billing = $this->billstudent();

        // Retrieve the last data for the user
    //     $lastPayment = DB::table('student_billings')
    //         ->where('user_id', session('userid'))
    //         ->where('status', 1)
    //         ->where('session_id', $this->getcurrentsession())
    //         ->orderBy('created_at', 'desc')
    //         ->first();
    //         $allPayment = DB::table('student_billings')
    //         ->where('user_id', session('userid'))
    //         ->where('status', 1)
    //         ->where('session_id', $this->getcurrentsession())
    //         ->pluck('amount_paid');

    //      $totalAmountPaid = $allPayment->sum();
    //   $amountPaid = $lastPayment->amount_paid ?? 0;
    //         $debt = $lastPayment->debt ?? 0;
        // $balance = $lastPayment ? max(0, $lastPayment->debt) : '<i class="fas fa-spinner fa-spin"></i>';

      


        // $amountPaid = 0;
      


        // $balance = 0;

        // return view('admissions.paymentview', compact('viewpayment', 'verifyResponse', 'totalAmountPaid', 'balance'));
          return view('admissions.paymentview', compact('viewpayment', 'verifyResponse'));
    }
    public function billstudent()
    {
        $remitas = DB::table('remitas')->where('user_id', session('userid'))
            ->where('status_code', '01')
        // ->select('remitas.status_code', 'remitas.fee_type', 'remitas.amount', 'remitas.fee_type_id')
            ->get();

        if ($remitas->isNotEmpty()) {
            foreach ($remitas as $remita) {
                if ($remita->amount >= 170000 && strpos($remita->fee_type, 'Full Payment') !== false) {
                    // Insert into student_billings
                    // dd($remita);
                    // Your code to insert the record goes here

                    try {
                        $existingRrr = DB::table('student_billings')
                            ->where('rrr', $remita->rrr)
                            ->exists();

                        if (!$existingRrr) {
                            DB::table('student_billings')
                                ->insert([
                                    'user_id' => $remita->user_id,
                                    'rrr' => $remita->rrr,
                                    'amount_paid' => $remita->amount,
                                    'session_id' =>$this->getcurrentsession()
                                ]);

                            $signUpMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You have successfully edited the user </div>';
                            return redirect()->back()->with('signUpMsg', $signUpMsg);
                        } else {
                            $signUpMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> The rrr already exists. </div>';
                            return redirect()->back()->with('signUpMsg', $signUpMsg);
                        }
                    } catch (QueryException $e) {
                        $signUpMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your edit was not successful' . $e->getMessage() . ' </div>';
                        return redirect()->back()->with('signUpMsg', $signUpMsg);
                    }
                }
                if (($remita->amount >= 170000 && strpos($remita->fee_type, 'Part Payment') !== false)) {
                    try {
                        $remitasToInsert = [];

                        foreach ($remitas as $remita) {
                            if ($remita->amount >= 170000 && strpos($remita->fee_type, 'Part Payment') !== false) {
                                $existingRrr = DB::table('student_billings')
                                    ->where('rrr', $remita->rrr)
                                    ->exists();

                                if (!$existingRrr) {
                                    $previousDebt = DB::table('student_billings')
                                        ->where('user_id', $remita->user_id)
                                        ->orderBy('created_at', 'desc')
                                        ->value('debt');

                                    $amountPaid = $remita->amount;
                                    $debt = $previousDebt;

                                    if ($previousDebt > 0) {
                                        // Calculate the new debt amount
                                        $debt = max(0, $previousDebt - $amountPaid); // Ensure the debt is not negative
                                    } else {
                                        // Set the debt to the paid amount when no previous debt exists
                                        $debt = $amountPaid;
                                    }

                                    $remitasToInsert[] = [
                                        'user_id' => $remita->user_id,
                                        'rrr' => $remita->rrr,
                                        'amount_paid' => $amountPaid,
                                        'debt' => $debt,
                                        'session_id' =>$this->getcurrentsession()
                                    ];
                                }
                            }
                        }

                        if (!empty($remitasToInsert)) {
                            DB::table('student_billings')->insert($remitasToInsert);

                            $signUpMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You have successfully edited the user </div>';
                            return redirect()->back()->with('signUpMsg', $signUpMsg);
                        } else {
                            $signUpMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> The selected RRRs already exist or do not meet the condition. </div>';
                            return redirect()->back()->with('signUpMsg', $signUpMsg);
                        }
                    } catch (QueryException $e) {
                        $signUpMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your edit was not successful' . $e->getMessage() . ' </div>';
                        return redirect()->back()->with('signUpMsg', $signUpMsg);
                    }
                }

            }
        }

    }

    public function verifyRRRALL()
    {
        $remitas = Remitas::where('user_id', session('userid'))
            ->where('status_code', '025')
            ->get();

        $response = [];

        foreach ($remitas as $remita) {
            $verifyResponse = $remita->verifyRRR();

            if ($verifyResponse->status == "00") {
                $remita->status_code = "01";
                $remita->status = "Payment Successful";
                $update = "RRR " . $remita->rrr . " payment verified.";
            } else {
                $remita->status_code = "025";
                $remita->status = "Payment Reference generated";
                $update = "RRR " . $remita->rrr . " Pending or NOT PAID.";
            }

            try {
                $remita->save();
                $response[] = $update;

            } catch (\Exception $e) {
                $error = "Error Verifying RRR. Please contact ICT.";
                $response[] = $error;
            }
        }

        // return redirect()->back()
        // ->with('success', json_encode($response))->with('timeout', 5000);
        return $response;

    }

    //REMITA PAYMENT FOR ACCEPTANCE FEE
    // PAYMENT FOR REMITA
    public function paymentacceptance()
    {
        $payment = DB::table('users')->where('users.id', session('userid'))
            ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')->get();
        $fee_types = fee_types::orderBy('status', 'ASC')
            ->where('status', 1)
            ->where('category', 2)
            ->get();
        $fee_typess = fee_types::orderBy('status', 'ASC')
            ->where('status', 1)
            ->where('category', 2)
            ->get();
        return view('admissions.acceptancepayment', compact('payment'), ['fee_types' => $fee_types, 'fee_typess' => $fee_typess]);
    }
    public function payremiacceptance(Request $req)
    {
        $user_id = session('userid');

        // Count the number of unpaid RRRs with status code 025 for the student
        $unpaid_rrr_count = DB::table('remitas')
            ->where('user_id', $user_id)
            ->where('status_code', '025')
            ->count();

        if ($unpaid_rrr_count >= 5) {
            // The student has already created 5 or more unpaid RRRs, so don't insert a new RRR
            // $json = array('success' => false, 'route' => '/home', 'msg' => 'You have reached the maximum number of unpaid Generated RRRs, Please pay your outstanding RRR before generating a new RRR. Visit ICT Unit or Bursary .');
            $json = array('success' => false, 'route' => '/home', 'msg' => 'You have reached the maximum number of unpaid Generated RRRs, Please pay your outstanding RRR before generating a new RRR. Go to View Remita Payment and Delete unpaid RRR .');
            $jsonstring = json_encode($json, JSON_HEX_TAG);
            echo $jsonstring;
            return;
        }
        try {
            DB::table('remitas')->insert([
                'user_id' => session('userid'),
                'rrr' => $req->rrr,
                'order_id' => $req->orderId,
                'fee_type' => $req->feeType,
                'service_type_id' => $req->serviceTypeId,
                'amount' => $req->amount,
                'status_code' => $req->statuscode,
                'status' => $req->status,
                'request_ip' => $_SERVER['REMOTE_ADDR'],
            ]);
            $json = array('success' => true, 'route' => '/paymentview/', 'id' => session('userid'));
            $jsonstring = json_encode($json, JSON_HEX_TAG);
            echo $jsonstring;
            //return redirect('/paymentview/'.session('userid'));
        } catch (QueryException $e) {
            // $statusMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> RRR not generated successfuly, please try again ' . $e->getMessage() . "###" . $req->rrr . '</div>';
            $statusMsg = 'RRR not generated successfuly, please try again or contact ICT';
            $json = array('success' => false, 'route' => '/home', 'msg' => $statusMsg);
            $jsonstring = json_encode($json, JSON_HEX_TAG);
            echo $jsonstring;
            // return redirect('/newPayment/')->with('mgs',$statusMsg);
        }
    }

    //  public function viewpayment($id){
    //     $viewpayment = DB::table('remitas') -> where('user_id', session('userid'))->get();
    //     return view('admissions.paymentview', compact('viewpayment'));
    //  }
    // END OF UTME FUNCTION PASSING PARAMETER USEFUL FOR THE BLADE

//LOG PAYMENT
    public function logpay(Request $req)
    {
        try {
            DB::table('remitas')->where('rrr', $req->rrr)
                ->update([
                    'status_code' => $req->statuscode,
                    'status' => $req->status,
                    'request_ip' => $_SERVER['REMOTE_ADDR'],
                    'order_ref' => $req->orderRef,
                    'transaction_id' => $req->transaction_id,
                    'transaction_date' => Carbon::now(),
                    'channel' => "Remita Online",
                    'updated_at' => Carbon::now(),

                ]);
            $json = array('success' => true, 'route' => 'admissions/paymentview/', 'id' => session('userid'));
            $jsonstring = json_encode($json, JSON_HEX_TAG);
            echo $jsonstring;
        } catch (QueryException $e) {
            $statusMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> RRR not generated successfuly, please try again ' . $e->getMessage() . "###" . $req->rrr . '</div>';

            $json = array('success' => false, 'route' => 'admissions/newPayment', 'msg' => $statusMsg);
            $jsonstring = json_encode($json, JSON_HEX_TAG);
            echo $jsonstring;
            // return redirect('/newPayment/')->with('mgs',$statusMsg);
        }
    }

    // View/Print Receipt
    public function receipt($rrr)
    {

        $receipt = DB::table('remitas')->where('rrr', $rrr)
            ->leftJoin('users', 'remitas.user_id', '=', 'users.id')
            ->leftjoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
            ->select('remitas.*', 'users.surname', 'users.first_name', 'usersbiodata.middle_name', 'usersbiodata.gender', 'usersbiodata.passport', 'usersbiodata.passport_type', 'users.email', 'users.phone', )
            ->first();
        return view('admissions.receipt', compact('receipt'));
    }

    private function getdptcolleg($course_applied)
    {
        $deptCol = array();
        $getdptcollege = DB::table('programs')->where('programs.name', $course_applied)
            ->join('academic_departments', 'programs.academic_department_id', '=', 'academic_departments.id')->first();

        $deptCol['dept'] = $getdptcollege->name;

        $getdptcollege = DB::table('colleges')->where('id', $getdptcollege->college_id)->first();

        $deptCol['col'] = $getdptcollege->name;

        return $deptCol;
    }

    public function generatePDF()
    {

        $admission = DB::table('users')->where('users.id', session('userid'))->first();

        if ($admission->applicant_type == 'UTME') {

            return $this->utmeletterPDF();
        } elseif ($admission->applicant_type == 'DE') {
            return $this->deletterPDF();
        } elseif ($admission->applicant_type == 'Transfer') {
            return $this->transferletterPDF();
        } else {
            return $this->pgletterPDF();
        }
    }
    public function utmeletterPDF()
    {
        $utmeadmission = DB::table('users')->where('users.id', session('userid'))
            ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
            ->join('approved_applicants', 'approved_applicants.user_id', '=', 'users.id')
            ->leftJoin('utme', 'utme.user_id', '=', 'users.id')
            ->leftJoin('academic_departments', 'academic_departments.id', '=', 'users.id')
            ->leftJoin('colleges', 'colleges.id', '=', 'users.id')
            ->leftJoin('programs', 'programs.id', '=', 'users.id')
            ->select('users.*', 'usersbiodata.middle_name', 'approved_applicants.approval_date', 'utme.course_applied', 'academic_departments.name', 'colleges.name', 'programs.duration')->get();

        //$programs= programs::orderBy('name','ASC')->get();
        $facultyAndDept = array();
        foreach ($utmeadmission as $ca) {
            $facultyAndDept = $this->getdptcolleg($ca->course_applied);
        }

        return view('admissions.utmeletter', compact('utmeadmission', 'facultyAndDept'));
    }

    public function deletterPDF()
    {
        $deadmission = DB::table('users')->where('users.id', session('userid'))
            ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
            ->join('approved_applicants', 'approved_applicants.user_id', '=', 'users.id')
            ->leftJoin('de', 'de.user_id', '=', 'users.id')
            ->leftJoin('academic_departments', 'academic_departments.id', '=', 'users.id')
            ->leftJoin('colleges', 'colleges.id', '=', 'users.id')
            ->leftJoin('programs', 'programs.id', '=', 'users.id')
            ->select('users.*', 'usersbiodata.middle_name', 'approved_applicants.approval_date', 'de.course_applied', 'academic_departments.name', 'colleges.name', 'programs.duration')->get();

        //$programs= programs::orderBy('name','ASC')->get();

        $facultyAndDept = array();
        foreach ($deadmission as $ca) {
            $facultyAndDept = $this->getdptcolleg($ca->course_applied);
        }

        return view('admissions.deletterPDF', compact('deadmission', 'facultyAndDept'));
    }

    public function transferletterPDF()
    {
        $transferadmission = DB::table('users')->where('users.id', session('userid'))
            ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
            ->join('approved_applicants', 'approved_applicants.user_id', '=', 'users.id')
            ->leftJoin('transfers', 'transfers.user_id', '=', 'users.id')
            ->leftJoin('academic_departments', 'academic_departments.id', '=', 'users.id')
            ->leftJoin('colleges', 'colleges.id', '=', 'users.id')
            ->leftJoin('programs', 'programs.id', '=', 'users.id')
            ->select('users.*', 'usersbiodata.middle_name', 'approved_applicants.approval_date', 'transfers.course_applied', 'academic_departments.name', 'colleges.name', 'programs.duration')->get();

        //$programs= programs::orderBy('name','ASC')->get();

        $facultyAndDept = array();
        foreach ($transferadmission as $ca) {
            $facultyAndDept = $this->getdptcolleg($ca->course_applied);
        }

        return view('admissions.transferletterPDF', compact('transferadmission', 'facultyAndDept'));
    }

    public function pgletterPDF()
    {
        $pgadmission = DB::table('users')->where('users.id', session('userid'))
            ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
            ->join('approved_applicants', 'approved_applicants.user_id', '=', 'users.id')
            ->leftJoin('pgs', 'pgs.user_id', '=', 'users.id')
            ->leftJoin('academic_departments', 'academic_departments.id', '=', 'users.id')
            ->leftJoin('colleges', 'colleges.id', '=', 'users.id')
            ->leftJoin('programs', 'programs.id', '=', 'users.id')
            ->select('users.*', 'usersbiodata.middle_name', 'approved_applicants.approval_date', 'pgs.course_applied', 'academic_departments.name', 'colleges.name', 'programs.duration')->get();

        //$programs= programs::orderBy('name','ASC')->get();

        $facultyAndDept = array();
        foreach ($pgadmission as $ca) {
            $facultyAndDept = $this->getdptcolleg($ca->course_applied);
        }

        return view('admissions.pgletterPDF', compact('pgadmission', 'facultyAndDept'));
    }

    // DE FUNCTION PASSING PARAMETER USEFUL FOR THE BLADE
    public function de()
    {
        $de = DB::table('users')->where('users.id', session('userid')) //-> where('remitas.status_code', '01')
            ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
        //->leftJoin('remitas', 'remitas.user_id', '=', 'users.id')
            ->select('users.surname', 'users.first_name', 'users.phone', 'users.middle_name', 'users.email', 'usersbiodata.status', )->first();
        $programs = Program::orderBy('name', 'ASC')->get();
        $country = CountryCodes::orderByRaw("CASE WHEN countryname = 'Nigeria' THEN -1 ELSE countryname END")->pluck('countryname', 'countryname');
        $subjects = subjects::orderBy('subject_name', 'ASC')->get();
        $deremita = DB::table('users')->where('users.id', session('userid')) //-> where('remitas.status_code', '01')
            ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
            ->leftJoin('remitas', 'remitas.user_id', '=', 'users.id')
            ->select('remitas.status_code', 'remitas.fee_type', 'remitas.created_at')->get();

        foreach ($deremita as $der) {
            if ($der->status_code == '01' && $der->fee_type == 'Application Fee (Under Graduate) (₦7000)') {
                return view('admissions./de', compact('de', 'deremita'), ['programs' => $programs, 'subjects' => $subjects, 'country' => $country]);
            }
        }
        $signUpMsg = '<div class="alert alert-success text-align-center alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>You Have to make payment before filling out your application form, Please kindly generate RRR to continue</strong></div>';
        return redirect('/newPayment')->with('signUpMsg', $signUpMsg);
    }
    //  END OF DE FUNCTION PASSING PARAMETER USEFUL FOR THE BLADE

    // TRANSFER FUNCTION PASSING PARAMETER USEFUL FOR THE BLADE
    public function transfers()
    {
        $transfers = DB::table('users')->where('users.id', session('userid')) //-> where('remitas.status_code', '01')
            ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
        // ->leftJoin('remitas', 'remitas.user_id', '=', 'users.id')
            ->select('users.surname', 'users.first_name', 'users.phone', 'users.middle_name', 'users.email', 'usersbiodata.status')->first();
        $programs = Program::orderBy('name', 'ASC')->get();
        $country = CountryCodes::orderByRaw("CASE WHEN countryname = 'Nigeria' THEN -1 ELSE countryname END")->pluck('countryname', 'countryname');
        $subjects = subjects::orderBy('subject_name', 'ASC')->get();

        $transfersremita = DB::table('users')->where('users.id', session('userid')) //-> where('remitas.status_code', '01')
            ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
            ->leftJoin('remitas', 'remitas.user_id', '=', 'users.id')
            ->select('remitas.status_code', 'remitas.fee_type', 'remitas.created_at')->get();

        foreach ($transfersremita as $utm) {
            if ($utm->status_code == '01' && $utm->fee_type == 'Application Fee (Under Graduate) (₦7000)') {
                return view('admissions./transfers', compact('transfers', 'transfersremita'), ['programs' => $programs, 'subjects' => $subjects, 'country' => $country]);
            }
        }

        $signUpMsg = '<div class="alert alert-success text-align-center alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>You Have to make payment before filling out your application form, Please kindly generate RRR to continue</strong></div>';
        return redirect('/newPayment')->with('signUpMsg', $signUpMsg);
    }
    // END TRANSFER FUNCTION PASSING PARAMETER USEFUL FOR THE BLADE

    // TRANSFER FUNCTION PASSING PARAMETER USEFUL FOR THE BLADE
    public function pg()
    {
        $pg = DB::table('users')->where('users.id', session('userid')) //-> where('remitas.status_code', '01')
            ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
        //  ->leftJoin('remitas', 'remitas.user_id', '=', 'users.id')
            ->select('users.surname', 'users.first_name', 'users.phone', 'users.middle_name', 'users.email', 'usersbiodata.status', )->first();
        $programs = Program::orderBy('name', 'ASC')->get();
        $country = CountryCodes::orderByRaw("CASE WHEN countryname = 'Nigeria' THEN -1 ELSE countryname END")->pluck('countryname', 'countryname');
        $subjects = subjects::orderBy('subject_name', 'ASC')->get();
        $pgremita = DB::table('users')->where('users.id', session('userid')) //-> where('remitas.status_code', '01')
            ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
            ->leftJoin('remitas', 'remitas.user_id', '=', 'users.id')
            ->select('remitas.status_code', 'remitas.fee_type', 'remitas.created_at')->get();

        foreach ($pgremita as $utm) {
            if ($utm->status_code == '01' && $utm->fee_type == 'Application Fees (Postgraduate) (₦10000)') {
                return view('admissions./pg', compact('pg', 'pgremita'), ['programs' => $programs, 'subjects' => $subjects, 'country' => $country]);
            }
        }
        $signUpMsg = '<div class="alert alert-success text-align-center alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>You Have to make payment before filling out your application form, Please kindly generate RRR to continue</strong></div>';
        return redirect('/newPayment')->with('signUpMsg', $signUpMsg);
    }

    // END TRANSFER FUNCTION PASSING PARAMETER USEFUL FOR THE BLADE

    // TRANSFER FUNCTION PASSING PARAMETER USEFUL FOR THE BLADE
    // public function admission(){
    //     $admission = DB::table('users') -> where('users.id', session('userid'))
    //     ->leftJoin('usersbiodata','usersbiodata.user_id','=','users.id')->get();
    //     $programs= programs::orderBy('name','ASC')->get();

    //     // $programs= programs::orderBy('name','ASC')->get();
    //    // $programs= programs::where('masters','M.A' AND 'M.Sc')->orderBy('name','ASC')->get();
    //     $subjects= subjects::orderBy('subject_name', 'ASC')->get();
    //     return view('admissions.admission', compact('admission'),['programs'=>$programs,'subjects'=>$subjects]);
    // }
    //ADMISSIONFUNCTION PASSING USEFUL FOR THE BLADE this will be use full for Admission Letter
    public function admissionstatus()
    {
        $status = "";

        if (DB::table('approved_applicants')->where('user_id', session('userid'))->exists()) {
            $status = "Successful";
        } else if (DB::table('rejected_applicants')->where('user_id', session('userid'))->exists()) {
            $status = "Unsuccessful";
        } else {
            $status = "Pending";
        }
        $admission = DB::table('users')->where('users.id', session('userid'))
            ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
            ->leftJoin('utme', 'utme.user_id', '=', 'users.id')->get();

        return view('admissions./admission', compact('status', 'admission'));
    }

    public function completeadmissions()
    {

        $completeadmissions = DB::table('users')->where('users.id', session('userid'))
            ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
            ->leftJoin('utme', 'utme.user_id', '=', 'users.id')
            ->get();

        return view('admissions.completeadmission', compact('completeadmissions'));
    }

    // Function to covert image into binary for **UTME** SO the image can be uploaded
    private function getBinaryImage()
    {
        $fileName = $_FILES["passport"]["name"];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileSize = $_FILES["passport"]["size"];
        $allowTypes = array('jpg', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG');
        $maxFileSize = 300 * 1024; // Maximum file size in bytes (300KB)

        if (in_array($fileType, $allowTypes)) {
            if ($fileSize <= $maxFileSize) {
                $imgContent = file_get_contents($_FILES['passport']['tmp_name']);
                $binaryData = array($imgContent, $fileType);
                return $binaryData;
            } else {
                throw new Exception('Sorry, the uploaded image size should not exceed 300KB.');
            }
        } else {
            throw new Exception('Sorry, only JPG, JPEG, and PNG files are allowed to upload.');
        }
    }

    // END OF Function to covert image into binary for **UTME** SO the image can be uploaded

    private function getBinaryImagejamb()
    {
        $fileName = basename($_FILES["jamb"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg');
        if (in_array($fileType, $allowTypes)) {
            $imgContect = file_get_contents(addslashes($_FILES['jamb']['tmp_name']));
            $binaryData = array($imgContect, $fileType);
            return $binaryData;
        } else {
            $statusMsg = 'Sorry, only JPG. JPEG and PNG files are allowed to upload.';
            return redirect('/utme')->with('mgs', $statusMsg);
        }
    }

    private function getBinaryImageolevel1()
    {
        $fileName = basename($_FILES["olevel1"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG');
        if (in_array($fileType, $allowTypes)) {
            $imgContect = file_get_contents(addslashes($_FILES['olevel1']['tmp_name']));
            $binaryData = array($imgContect, $fileType);
            return $binaryData;
        } else {
            $statusMsg = 'Sorry, only JPG. JPEG and PNG files are allowed to upload.';
            return redirect('/admission')->with('mgs', $statusMsg);
        }
    }
    private function getBinaryImageolevel2()
    {
        $fileName = basename($_FILES["olevel2"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG');
        if (in_array($fileType, $allowTypes)) {
            $imgContect = file_get_contents(addslashes($_FILES['olevel2']['tmp_name']));
            $binaryData = array($imgContect, $fileType);
            return $binaryData;
        } else {
            $statusMsg = 'Sorry, only JPG. JPEG and PNG files are allowed to upload.';
            return redirect('/admission')->with('mgs', $statusMsg);
        }
    }

    // Function to covert image into binary for **DE** SO the image can be uploaded
    private function getBinaryImagede()
    {
        $fileName = basename($_FILES["passport"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg');
        if (in_array($fileType, $allowTypes)) {
            // Check file size
            if ($_FILES['passport']['size'] > 500000) {
                $statusMsg = 'Sorry, your file is too large.';
                $uploadOk = 0;
            }
            $imgContect = file_get_contents(addslashes($_FILES['passport']['tmp_name']));
            $binaryData = array($imgContect, $fileType);
            return $binaryData;
        } else {
            $statusMsg = 'Sorry, only JPG. JPEG and PNG files are allowed to upload.';
            return redirect('/de')->with('mgs', $statusMsg);
        }
    }
    // END Function to covert image into binary for **DE** SO the image can be uploaded

    // Function to covert image into binary for **TRANSFER** SO the image can be uploaded
    private function getBinaryImagetransfer()
    {
        $fileName = basename($_FILES["passport"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg');
        if (in_array($fileType, $allowTypes)) {
            $imgContect = file_get_contents(addslashes($_FILES['passport']['tmp_name']));
            $binaryData = array($imgContect, $fileType);
            return $binaryData;
        } else {
            $statusMsg = 'Sorry, only JPG. JPEG and PNG files are allowed to upload.';
            return redirect('/transfer')->with('mgs', $statusMsg);
        }
    }
    // END Function to covert image into binary for **TRANSFER** SO the image can be uploaded

    // Function to covert image into binary for **TRANSFER** SO the image can be uploaded
    private function getBinaryImagepg()
    {
        $fileName = basename($_FILES["passport"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg');
        if (in_array($fileType, $allowTypes)) {
            $imgContect = file_get_contents(addslashes($_FILES['passport']['tmp_name']));
            $binaryData = array($imgContect, $fileType);
            return $binaryData;
        } else {
            $statusMsg = 'Sorry, only JPG. JPEG and PNG files are allowed to upload.';
            return redirect('/pg')->with('mgs', $statusMsg);
        }
    }
    // END Function to covert image into binary for **TRANSFER** SO the image can be uploaded

    public function utmeuploads(Request $req)
    {
     
        $this->validate($req, [

            // 'jamb' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1048|dimensions:min_width=300',
            // 'olevel1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1048|dimensions:min_width=300',
            // 'olevel2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1048|dimensions:min_width=300',
        ],
            $messages = [
                // 'jamb.dimensions' => 'Result Image is too small. Must be at least 400px wide.',
                // 'olevel1.dimensions' => 'Olevel Image is too small. Must be at least 400px wide.',
                // 'olevel2.dimensions' => 'Olevel Image is too small. Must be at least 400px wide.',

            ]);
        // dd($req);
        DB::beginTransaction();

        try {

            // $img0 = array("", "");
            // if ($req->hasFile('jamb')) {

            //     $img0 = $this->getBinaryImagejamb();

            //     $img1 = array("", "");
            //     if ($req->hasFile('olevel1')) {

            //         $img1 = $this->getBinaryImageolevel1();
            //     }
            //     $img2 = array("", "");
            //     if ($req->hasFile('olevel2')) {

            //         $img2 = $this->getBinaryImageolevel2();
            //     }
            //process result upload
            $img = "";
            if ($req->hasFile('jamb')) {
                $img1 = Image::make($req->file('jamb'))->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $passport = base64_encode($img1->encode()->encoded);
                $img = $passport;
            } // end result

            $img1 = "";
            if ($req->hasFile('olevel1')) {
                $img2 = Image::make($req->file('olevel1'))->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $passport = base64_encode($img2->encode()->encoded);
                $img1 = $passport;
            } // end result

            $img2 = "";
            if ($req->hasFile('olevel2')) {
                $img3 = Image::make($req->file('olevel2'))->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $passport = base64_encode($img3->encode()->encoded);
                $img2 = $passport;
            } // end result

            DB::table('uploads')->insert([
                'user_id' => session('userid'),
                'jamb' => $img,
                // 'jamb_type' => $img0[1],
                'olevel1' => $img1,
                // 'olevel1_type' => $img1[1],
                'olevel2' => $img2,
                // 'olevel2_type' => $img2[1],
                'olevel_awaiting' => $req->olevel_awaiting,

                //   'passport'=>$req->passport,'passportype'=>$file_extension
            ]);

            // } else {
            //     $img0 = array("", "");
            //     if ($req->hasFile('jamb')) {

            //         $img0 = $this->getBinaryImagejamb();

            //         DB::table('uploads')->insert([
            //             'user_id' => session('userid'),
            //             'jamb' => $img0[0],
            //             'jamb_type' => $img0[1],
            //             'olevel_awaiting' => $req->olevel_awaiting,
            //         ]);
            //     }
            // }
            DB::table('usersbiodata')->where('user_id', session('userid'))->update([
                'status' => 4,

            ]);

            //  Mail::to($req->email)->send(new Confirmsignup($mailData));
            DB::commit();

            $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Your have sucessfully submitted your information</div>';
            return redirect('/admission')->with('signUpMsg', $signUpMsg);

        } catch (QueryException $e) {
            DB::rollBack();
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Unsecessful try again </div>';
                return redirect('/utme')->with('signUpMsg', $signUpMsg);
            } else {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Unsecessful try again' . $e->getMessage() . '</div>';
                return redirect('/utme')->with('signUpMsg', $signUpMsg);
            }
        }
    }
    public function transfersuploads(Request $req)
    {

        // dd($req);
        DB::beginTransaction();

        try {

            $img0 = array("", "");
            if ($req->hasFile('olevel1')) {

                $img0 = $this->getBinaryImageolevel1();

                $img2 = array("", "");
                if ($req->hasFile('olevel2')) {

                    $img2 = $this->getBinaryImageolevel2();
                }
                DB::table('uploads')->insert([
                    'user_id' => session('userid'),
                    'olevel1' => $img0[0],
                    'olevel1_type' => $img0[1],
                    'olevel2' => $img2[0],
                    'olevel2_type' => $img2[1],

                    //   'passport'=>$req->passport,'passportype'=>$file_extension
                ]);
            } else {
                $img0 = array("", "");
                if ($req->hasFile('olevel1')) {

                    $img0 = $this->getBinaryImageolevel1();

                    DB::table('uploads')->insert([
                        'user_id' => session('userid'),
                        'olevel1' => $img0[0],
                        'olevel1_type' => $img0[1],

                    ]);
                }
            }
            DB::table('usersbiodata')->where('user_id', session('userid'))->update([
                'status' => 4,

            ]);

            //  Mail::to($req->email)->send(new Confirmsignup($mailData));
            DB::commit();

            $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Your have sucessfully submitted your information</div>';
            return redirect('/admission')->with('signUpMsg', $signUpMsg);

        } catch (QueryException $e) {
            DB::rollBack();
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Unsecessful try again </div>';
                return redirect('/transfers')->with('signUpMsg', $signUpMsg);
            } else {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Unsecessful try again' . $e->getMessage() . '</div>';
                return redirect('/transfers')->with('signUpMsg', $signUpMsg);
            }
        }
    }
    // **************************************************************************************************
    // FUNCTION TO UPLOAD INTO THE USERSBIODATE OF A UTME APPLICANT
    public function utmebiodata(Request $req)
    {
        // dd($req);
        $this->validate($req, [

            'gender' => 'required|string|max:6',
            'dob' => 'required|string|max:50',
            'nationality' => 'required|string|max:100',
            'state_origin' => 'required|string|max:50',
            // 'lga_name' => 'required|string|max:100',
            'religion' => 'required|string|max:50',
            'address' => 'required|string|max:200',
            // 'passport' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1048|dimensions:min_width=300',
        ],
            $messages = [
                'passport.dimensions' => 'Passport Image is too small. Must be at least 400px wide.',

            ]);
        DB::beginTransaction();

        try {

            // $img = array("", "");
            // if ($req->hasFile('passport')) {

            //     $img = $this->getBinaryImage();
            // }
            //process Passport upload
            $img = "";
            if ($req->hasFile('passport')) {
                $img1 = Image::make($req->file('passport'))->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $passport = base64_encode($img1->encode()->encoded);
                $img = $passport;
            } // end Passport

            DB::table('usersbiodata')->insert([
                'user_id' => session('userid'),
                'middle_name' => $req->middle_name,
                'gender' => $req->gender,
                'religion' => $req->religion,
                'dob' => $req->dob,
                'nationality' => $req->nationality,
                'lga' => $req->lga,
                'state_origin' => $req->state_origin,
                'address' => $req->address,
                'session_id' => $this->getCurrentAdmissionSession(),
                'passport' => $img,
                // 'passport_type' => $img[1],
                'referral' => $req->referral,
                //   'passport'=>$req->passport,'passportype'=>$file_extension
            ]);

            DB::table('users')->where('id', session('userid'))->update([
                'applicant_type' => 'UTME',

            ]);
            DB::table('usersbiodata')->where('user_id', session('userid'))->update([
                'status' => 1,

            ]);

            //  Mail::to($req->email)->send(new Confirmsignup($mailData));
            DB::commit();

            $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Saving your Biodata</div>';
            return redirect('/utme');
            // ->with('signUpMsg',$signUpMsg);
        } catch (QueryException $e) {
            DB::rollBack();
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> You can not fill the form </div>';
                return redirect('/utme')->with('signUpMsg', $signUpMsg);
            } else {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong>  please try again later or call Veritas University help line</div>';
                //   $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong>  please try again later or call Veritas University help line'.$e->getMessage().'</div>';
                return redirect('/utme')->with('signUpMsg', $signUpMsg);
            }
        }
    }
    // END OF FUNCTION TO UPLOAD INTO THE USERSBIODATE OF A UTME APPLICANT

    public function utmesponsors(Request $req)
    {
        // dd($req);
        DB::beginTransaction();
        try {

            DB::table('sponsors')->insert([
                'user_id' => session('userid'),
                'sponsor_title' => $req->sponsor,
                'sponsor_relationship' => $req->sponsor_relationship,
                'name' => $req->name,
                'sponsors_phone' => $req->sponsors_phone,
                'sponsors_email' => $req->sponsors_email,
                'sponsors_address' => $req->sponsors_address,
                'occupation' => $req->occupation,
                //   'passport'=>$req->passport,'passportype'=>$file_extension
            ]);
            DB::table('usersbiodata')->where('user_id', session('userid'))->update([
                'status' => 2,

            ]);

            DB::commit();

            // $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Your Registration was successful, please follow the instruction sent to your mail to complete the process</div>';
            return redirect('/utme');
            // ->with('signUpMsg',$signUpMsg);

        } catch (QueryException $e) {
            DB::rollBack();
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> You can not fill the form twice</div>';
                return redirect('/utme')->with('signUpMsg', $signUpMsg);
            } else {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Please try again later </div>';
                //   $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Your registration was not successful, please try again later or call Muoga Market help line'.$e->getMessage().'</div>';
                return redirect('/utme');
                //   ->with('signUpMsg',$signUpMsg);
            }
        }
    }
    // END OF UTME SPONSOR FUNCTION THAT INSERT DATA INTO THE DATABASE

    // UTME FUCNTION THAT INSERT JAMB DETAILS INTO THE BASEBASE
    public function utmejamb(Request $req)
    {
        // dd($req);
        // $programs= programs::all();

        DB::beginTransaction();
        try {

            // $img = array("", "");
            // if ($req->hasFile('passport')) {

            //     $img = $this->getBinaryImagejamb();
            // }

            DB::table('utme')->insert([
                'user_id' => session('userid'),
                'jamb_reg_no' => $req->jamb_reg_no,
                'score' => $req->score,
                'course_applied' => $req->course_applied,
                'first_choice' => $req->first_choice,
                'second_choice' => $req->second_choice,
                'subject_1' => $req->subject_1,
                'subject_2' => $req->subject_2,
                'subject_3' => $req->subject_3,
                'subject_4' => $req->subject_4,
                // 'jamb' =>$img[0],
                // 'jamb_type' =>$img[1]

            ]);
            DB::table('usersbiodata')->where('user_id', session('userid'))->update([
                'status' => 3,

            ]);

            DB::commit();

            // $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Your Registration was successful, please follow the instruction sent to your mail to complete the process</div>';
            return redirect('/utme');
            //->with('signUpMsg',$signUpMsg);

        } catch (QueryException $e) {
            DB::rollBack();
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                //   $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> You have registered before, double registration is not alowed</div>';

                return redirect('/utme');
                //->with('signUpMsg',$signUpMsg);
            } else {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> please try again later or Veritas University help line</div>';
                //   $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> please try again later or call Muoga Market help line'.$e->getMessage().'</div>';
                return redirect('/utme')->with('signUpMsg', $signUpMsg);
            }
        }
    }

    // END OF UTME FUCNTION THAT INSERT JAMB DETAILS INTO THE BASEBASE

    // UTME FUCNTION THAT INSERT OLEVEL DETAILS INTO THE DATEBASE
    // function utmeolevel(Request $req)
    // {
    //     // dd($req);
    //     DB::beginTransaction();
    //     try {
    //         $olevel = array();
    //         if (isset($_POST['subject_1'])) {
    //             $subject = array("subject" => $req->subject_1, "exam" => $req->exam_1, "grade" => $req->grade_1);
    //             array_push($olevel, $subject);
    //         }
    //         if (isset($_POST['subject_2'])) {

    //             $subject = array("subject" => $req->subject_2, "exam" => $req->exam_2, "grade" => $req->grade_2);
    //             array_push($olevel, $subject);
    //         }
    //         if (isset($_POST['subject_3'])) {
    //             $subject = array("subject" => $req->subject_3, "exam" => $req->exam_3, "grade" => $req->grade_3);
    //             array_push($olevel, $subject);
    //         }
    //         if (isset($_POST['subject_4'])) {
    //             $subject = array("subject" => $req->subject_4, "exam" => $req->exam_4, "grade" => $req->grade_4);
    //             array_push($olevel, $subject);
    //         }
    //         if (isset($_POST['subject_5'])) {
    //             $subject = array("subject" => $req->subject_5, "exam" => $req->exam_5, "grade" => $req->grade_5);
    //             array_push($olevel, $subject);
    //         }
    //         if (isset($_POST['subject_6'])) {
    //             $subject = array("subject" => $req->subject_6, "exam" => $req->exam_6, "grade" => $req->grade_6);
    //             array_push($olevel, $subject);
    //         }
    //         if (isset($_POST['subject_7'])) {
    //             $subject = array("subject" => $req->subject_8, "exam" => $req->exam_8, "grade" => $req->grade_8);
    //             array_push($olevel, $subject);
    //         }
    //         if (isset($_POST['subject_8'])) {
    //             $subject = array("subject" => $req->subject_8, "exam" => $req->exam_8, "grade" => $req->grade_8);
    //             array_push($olevel, $subject);
    //         }
    //         if (isset($_POST['subject_9'])) {
    //             $subject = array("subject" => $req->subject_9, "exam" => $req->exam_9, "grade" => $req->grade_9);
    //             array_push($olevel, $subject);
    //         }
    //         if (isset($_POST['subject_10'])) {
    //             $subject = array("subject" => $req->subject_10, "exam" => $req->exam_10, "grade" => $req->grade_10);
    //             array_push($olevel, $subject);
    //         }
    //         if (isset($_POST['subject_11'])) {
    //             $subject = array("subject" => $req->subject_11, "exam" => $req->exam_11, "grade" => $req->grade_11);
    //             array_push($olevel, $subject);
    //         }
    //         if (isset($_POST['subject_12'])) {
    //             $subject = array("subject" => $req->subject_12, "exam" => $req->exam_12, "grade" => $req->grade_12);
    //             array_push($olevel, $subject);
    //         }

    //         DB::table('olevel')->insert([
    //             'user_id' => session('userid'),
    //             'olevel_result' => json_encode($olevel, JSON_HEX_TAG),
    //             'sitting' => $req->sitting

    //             //   'passport'=>$req->passport,'passportype'=>$file_extension
    //         ]);
    //         DB::table('usersbiodata')->where('user_id', session('userid'))->update([
    //             'status' => 4

    //         ]);

    //         DB::commit();

    //         //  Mail::to($req->email)->send(new Confirmsignup($mailData));

    //         $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Thank You for filling your Application Form</div>';
    //         return redirect('/admission')->with('signUpMsg', $signUpMsg);
    //     } catch (QueryException $e) {
    //         DB::rollBack();
    //         $error_code = $e->errorInfo[1];
    //         if ($error_code == 1062) {
    //             $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> You have registered before, double registration is not alowed</div>';
    //             return redirect('/utme')->with('signUpMsg', $signUpMsg);
    //         } else {
    //             $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Your registration was not successful, please try again later or call Muoga Market help line' . $e->getMessage() . '</div>';
    //             return redirect('/utme')->with('signUpMsg', $signUpMsg);
    //         }
    //     }
    // }
    // END OF UTME APPLICANT FUNCTIONS
    // *****************************************************************************

    // ***********************************************************************************

    // START OF DIRECT ENTRY FORM INSERTING INTO BIODATA
    public function debiodata(Request $req)
    {
        // dd($req);
        $this->validate($req, [

            'gender' => 'required|string|max:6',
            'dob' => 'required|string|max:50',
            'nationality' => 'required|string|max:100',
            'state_origin' => 'required|string|max:50',
            // 'lga_name' => 'required|string|max:100',
            'religion' => 'required|string|max:50',
            'address' => 'required|string|max:200',
            // 'passport' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1048|dimensions:min_width=300',
        ],
            $messages = [
                'passport.dimensions' => 'Passport Image is too small. Must be at least 400px wide.',

            ]);
        DB::beginTransaction();

        try {

            // $img = array("", "");
            // if ($req->hasFile('passport')) {

            //     $img = $this->getBinaryImagede();
            // }
            $img = "";
            if ($req->hasFile('passport')) {
                $img1 = Image::make($req->file('passport'))->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $passport = base64_encode($img1->encode()->encoded);
                $img = $passport;
                // if (filesize($req->file('passport')) > 900 * 1024) {
                //     $signUpMsg = ' <div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error! </strong>Passport image size exceeds the maximum allowed limit of 300KB. please try again</div>'
                //     ;
                //     return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
                // }
            } // end Passport

            DB::table('usersbiodata')->insert([
                'user_id' => session('userid'),
                'middle_name' => $req->middle_name,
                'gender' => $req->gender,
                'religion' => $req->religion,
                'dob' => $req->dob,
                'nationality' => $req->nationality,
                'lga' => $req->lga,
                'state_origin' => $req->state_origin,
                'address' => $req->address,
                'session_id' => $this->getCurrentAdmissionSession(),
                'passport' => $img,
                // 'passport_type' => $img[1],
                'referral' => $req->referral,
                //   'passport'=>$req->passport,'passportype'=>$file_extension
            ]);

            DB::table('users')->where('id', session('userid'))->update([
                'applicant_type' => 'DE',

            ]);
            DB::table('usersbiodata')->where('user_id', session('userid'))->update([
                'status' => 1,

            ]);

            //  Mail::to($req->email)->send(new Confirmsignup($mailData));
            DB::commit();

            $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Your have successfully save your information</div>';
            return redirect('/de')->with('signUpMsg', $signUpMsg);
        } catch (QueryException $e) {
            // DB::rollBack();
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Sorry try again</div>';
                return redirect('/de')->with('signUpMsg', $signUpMsg);
            } else {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Sorry try again' . $e->getMessage() . '</div>';
                return redirect('/de')->with('signUpMsg', $signUpMsg);
            }
        }
    }
    // END OF DE INSERTING INTO BIODATA

    //FUNCTION INSERTING SPONSOR OF DIRECT ENETRY DE INTO SPONSOR TABLE IN THE DATABASE
    public function desponsors(Request $req)
    {
        // dd($req);
        DB::beginTransaction();
        try {

            DB::table('sponsors')->insert([
                'user_id' => session('userid'),
                'sponsor_title' => $req->sponsor,
                'sponsor_relationship' => $req->sponsor_relationship,
                'name' => $req->name,
                'sponsors_phone' => $req->sponsors_phone,
                'sponsors_email' => $req->sponsors_email,
                'sponsors_address' => $req->sponsors_address,
                'occupation' => $req->occupation,
            ]);
            DB::table('usersbiodata')->where('user_id', session('userid'))->update([
                'status' => 2,

            ]);

            //  Mail::to($req->email)->send(new Confirmsignup($mailData));
            DB::commit();

            //  Mail::to($req->email)->send(new Confirmsignup($mailData));

            $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Saving your information</div>';
            return redirect('/de')->with('signUpMsg', $signUpMsg);
        } catch (QueryException $e) {
            DB::rollBack();
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Sorry try again</div>';
                return redirect('/de')->with('signUpMsg', $signUpMsg);
            } else {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Sorry try again' . $e->getMessage() . '</div>';
                return redirect('/de')->with('signUpMsg', $signUpMsg);
            }
        }
    }

    //INSERTING INTO THE APPLICANT TRANSFERINFORMATION TABLE
    public function deinformation(Request $req)
    {
        // dd($req);

        DB::beginTransaction();
        try {

            DB::table('de')->insert([
                'user_id' => session('userid'),
                'jamb_de_no' => $req->jamb_de_no,
                'qualification' => $req->qualification,
                'qualification_year' => $req->qualification_year,
                'qualification_number' => $req->qualification_number,
                'course_applied' => $req->course_applied,
            ]);
            DB::table('usersbiodata')->where('user_id', session('userid'))->update([
                'status' => 3,

            ]);

            DB::commit();

            //  Mail::to($req->email)->send(new Confirmsignup($mailData));

            $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Saving your information</div>';
            return redirect('/de')->with('signUpMsg', $signUpMsg);
        } catch (QueryException $e) {
            DB::rollBack();
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Sorry try again</div>';
                return redirect('/de')->with('signUpMsg', $signUpMsg);
            } else {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Sorry try again' . $e->getMessage() . '</div>';
                return redirect('/de')->with('signUpMsg', $signUpMsg);
            }
        }
    }
    // END OF tansfer FUCNTION THAT INSERT transfersinformation DETAILS INTO THE dateBASE

    // UTME FUCNTION THAT INSERT OLEVEL DETAILS INTO THE DATEBASE
    public function deolevel(Request $req)
    {

        DB::beginTransaction();
        try {
            $olevel = array();
            if (isset($_POST['subject_1'])) {
                $subject = array("subject" => $req->subject_1, "exam" => $req->exam_1, "grade" => $req->grade_1);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_2'])) {

                $subject = array("subject" => $req->subject_2, "exam" => $req->exam_2, "grade" => $req->grade_2);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_3'])) {
                $subject = array("subject" => $req->subject_3, "exam" => $req->exam_3, "grade" => $req->grade_3);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_4'])) {
                $subject = array("subject" => $req->subject_4, "exam" => $req->exam_4, "grade" => $req->grade_4);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_5'])) {
                $subject = array("subject" => $req->subject_5, "exam" => $req->exam_5, "grade" => $req->grade_5);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_6'])) {
                $subject = array("subject" => $req->subject_6, "exam" => $req->exam_6, "grade" => $req->grade_6);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_7'])) {
                $subject = array("subject" => $req->subject_8, "exam" => $req->exam_8, "grade" => $req->grade_8);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_8'])) {
                $subject = array("subject" => $req->subject_8, "exam" => $req->exam_8, "grade" => $req->grade_8);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_9'])) {
                $subject = array("subject" => $req->subject_9, "exam" => $req->exam_9, "grade" => $req->grade_9);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_10'])) {
                $subject = array("subject" => $req->subject_10, "exam" => $req->exam_10, "grade" => $req->grade_10);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_11'])) {
                $subject = array("subject" => $req->subject_11, "exam" => $req->exam_11, "grade" => $req->grade_11);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_12'])) {
                $subject = array("subject" => $req->subject_12, "exam" => $req->exam_12, "grade" => $req->grade_12);
                array_push($olevel, $subject);
            }

            DB::table('olevel')->insert([
                'user_id' => session('userid'),
                'olevel_result' => json_encode($olevel, JSON_HEX_TAG),
                'sitting' => $req->sitting,

                //   'passport'=>$req->passport,'passportype'=>$file_extension
            ]);
            DB::table('usersbiodata')->where('user_id', session('userid'))->update([
                'status' => 4,

            ]);

            DB::commit();

            //  Mail::to($req->email)->send(new Confirmsignup($mailData));

            $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Thank You for filling your Application Form</div>';
            return redirect('/admission')->with('signUpMsg', $signUpMsg);
        } catch (QueryException $e) {
            DB::rollBack();
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Sorry try again</div>';
                return redirect('/de')->with('signUpMsg', $signUpMsg);
            } else {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Sorry try again' . $e->getMessage() . '</div>';
                return redirect('/de')->with('signUpMsg', $signUpMsg);
            }
        }
    }
    // ******************************************************************************

    // *************************************************************************************
    // FUCTION FOR THE TRANSFER APPLICANT
    public function transfersbiodata(Request $req)
    {
        // dd($req);
        $this->validate($req, [

            'gender' => 'required|string|max:6',
            'dob' => 'required|string|max:50',
            'nationality' => 'required|string|max:100',
            'state_origin' => 'required|string|max:50',
            // 'lga_name' => 'required|string|max:100',
            'religion' => 'required|string|max:50',
            'address' => 'required|string|max:200',
            'passport' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1048|dimensions:min_width=300',
        ],
            $messages = [
                'passport.dimensions' => 'Passport Image is too small. Must be at least 400px wide.',

            ]);
        DB::beginTransaction();

        try {

            // $img = array("", "");
            // if ($req->hasFile('passport')) {

            //     $img = $this->getBinaryImagetransfer();
            // }
            $img = "";
            if ($req->hasFile('passport')) {
                $img1 = Image::make($req->file('passport'))->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $passport = base64_encode($img1->encode()->encoded);
                $img = $passport;
            } // end Passport
            DB::table('usersbiodata')->insert([
                'user_id' => session('userid'),
                'middle_name' => $req->middle_name,
                'gender' => $req->gender,
                'religion' => $req->religion,
                'dob' => $req->dob,
                'nationality' => $req->nationality,
                'lga' => $req->lga,
                'state_origin' => $req->state_origin,
                'address' => $req->address,
                'session_id' => $this->getCurrentAdmissionSession(),
                'passport' => $img,
                // 'passport' => $img[0],
                // 'passport_type' => $img[1],
                'referral' => $req->referral,
                //   'passport'=>$req->passport,'passportype'=>$file_extension
            ]);

            DB::table('users')->where('id', session('userid'))->update([
                'applicant_type' => 'Transfer',

            ]);
            DB::table('usersbiodata')->where('user_id', session('userid'))->update([
                'status' => 1,

            ]);

            //  Mail::to($req->email)->send(new Confirmsignup($mailData));
            DB::commit();

            $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Saving your information </div>';
            return redirect('/transfers')->with('signUpMsg', $signUpMsg);
        } catch (QueryException $e) {
            DB::rollBack();
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> SOrry try again</div>';
                return redirect('/transfers')->with('signUpMsg', $signUpMsg);
            } else {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Sorry try again' . $e->getMessage() . '</div>';
                return redirect('/transfers')->with('signUpMsg', $signUpMsg);
            }
        }
    }

    // INSERTING TRANSFER APPLICANT INTO SPONER TABLE
    public function transferssponsors(Request $req)
    {
        // dd($req);
        DB::beginTransaction();
        try {
            DB::table('sponsors')->insert([
                'user_id' => session('userid'),
                'sponsor_title' => $req->sponsor,
                'sponsor_relationship' => $req->sponsor_relationship,
                'name' => $req->name,
                'sponsors_phone' => $req->sponsors_phone,
                'sponsors_email' => $req->sponsors_email,
                'sponsors_address' => $req->sponsors_address,
                'occupation' => $req->occupation,

            ]);
            DB::table('usersbiodata')->where('user_id', session('userid'))->update([
                'status' => 2,

            ]);

            //  Mail::to($req->email)->send(new Confirmsignup($mailData));
            DB::commit();

            //  Mail::to($req->email)->send(new Confirmsignup($mailData));

            $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong>Saving your information </div>';
            return redirect('/transfers')->with('signUpMsg', $signUpMsg);
        } catch (QueryException $e) {
            DB::rollBack();
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Sorry you have filled the form already</div>';
                return redirect('/transfers')->with('signUpMsg', $signUpMsg);
            } else {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong>Sorry try again </div>';
                // $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong>Sorry try again' . $e->getMessage() . '</div>';
                return redirect('/transfers')->with('signUpMsg', $signUpMsg);
            }
        }
    }
    //end of transfer sponsor applicant inserting

    //INSERTING INTO THE APPLICANT TRANSFERINFORMATION TABLE
    public function transfersinformation(Request $req)
    {
        // dd($req);

        DB::beginTransaction();
        try {

            DB::table('transfers')->insert([
                'user_id' => session('userid'),
                'institution' => $req->institution,
                'matric_no' => $req->matric_no,
                'entry_year' => $req->entry_year,
                'level' => $req->level,
                'course' => $req->course,
                'cgpa' => $req->cgpa,
                'course_applied' => $req->course_applied,

            ]);
            DB::table('usersbiodata')->where('user_id', session('userid'))->update([
                'status' => 3,

            ]);

            DB::commit();

            //  Mail::to($req->email)->send(new Confirmsignup($mailData));

            $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Saving your information </div>';
            return redirect('/transfers')->with('signUpMsg', $signUpMsg);
        } catch (QueryException $e) {
            DB::rollBack();
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Sorry you have filed this section already </div>';
                return redirect('/transfers')->with('signUpMsg', $signUpMsg);
            } else {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Sorry try again' . $e->getMessage() . '</div>';
                return redirect('/transfers')->with('signUpMsg', $signUpMsg);
            }
        }
    }
    // END OF tansfer FUCNTION THAT INSERT transfersinformation DETAILS INTO THE dateBASE

    // TRANSFER FUCNTION THAT INSERT OLEVEL DETAILS INTO THE DATEBASE
    public function transfersolevel(Request $req)
    {
        // dd($req);

        DB::beginTransaction();
        try {
            $olevel = array();
            if (isset($_POST['subject_1'])) {
                $subject = array("subject" => $req->subject_1, "exam" => $req->exam_1, "grade" => $req->grade_1);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_2'])) {

                $subject = array("subject" => $req->subject_2, "exam" => $req->exam_2, "grade" => $req->grade_2);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_3'])) {
                $subject = array("subject" => $req->subject_3, "exam" => $req->exam_3, "grade" => $req->grade_3);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_4'])) {
                $subject = array("subject" => $req->subject_4, "exam" => $req->exam_4, "grade" => $req->grade_4);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_5'])) {
                $subject = array("subject" => $req->subject_5, "exam" => $req->exam_5, "grade" => $req->grade_5);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_6'])) {
                $subject = array("subject" => $req->subject_6, "exam" => $req->exam_6, "grade" => $req->grade_6);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_7'])) {
                $subject = array("subject" => $req->subject_8, "exam" => $req->exam_8, "grade" => $req->grade_8);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_8'])) {
                $subject = array("subject" => $req->subject_8, "exam" => $req->exam_8, "grade" => $req->grade_8);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_9'])) {
                $subject = array("subject" => $req->subject_9, "exam" => $req->exam_9, "grade" => $req->grade_9);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_10'])) {
                $subject = array("subject" => $req->subject_10, "exam" => $req->exam_10, "grade" => $req->grade_10);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_11'])) {
                $subject = array("subject" => $req->subject_11, "exam" => $req->exam_11, "grade" => $req->grade_11);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_12'])) {
                $subject = array("subject" => $req->subject_12, "exam" => $req->exam_12, "grade" => $req->grade_12);
                array_push($olevel, $subject);
            }

            DB::table('olevel')->insert([
                'user_id' => session('userid'),
                'olevel_result' => json_encode($olevel, JSON_HEX_TAG),
                'sitting' => $req->sitting,

                //   'passport'=>$req->passport,'passportype'=>$file_extension
            ]);
            DB::table('usersbiodata')->where('user_id', session('userid'))->update([
                'status' => 4,

            ]);

            DB::commit();

            //  Mail::to($req->email)->send(new Confirmsignup($mailData));

            $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Thank You for filling your Application Form</div>';
            return redirect('/admission')->with('signUpMsg', $signUpMsg);
        } catch (QueryException $e) {
            DB::rollBack();
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Sorry try again</div>';
                return redirect('/transfers')->with('signUpMsg', $signUpMsg);
            } else {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Sorry try again' . $e->getMessage() . '</div>';
                return redirect('/transfers')->with('signUpMsg', $signUpMsg);
            }
        }
    }
    // END OF olevel FUNCTIONS for transfers applicant

    // END OF TRANSFER INSERTING
    // ************************************************************************************

    // *******************************************************************************************
    // FUNCTION FOR BIODATE INSERTING OF PG APPLICANT
    public function pgbiodata(Request $req)
    {
        // dd($req);
        $this->validate($req, [

            'gender' => 'required|string|max:6',
            'dob' => 'required|string|max:50',
            'nationality' => 'required|string|max:100',
            'state_origin' => 'required|string|max:50',
            // 'lga_name' => 'required|string|max:100',
            'religion' => 'required|string|max:50',
            'address' => 'required|string|max:200',
            'passport' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1048|dimensions:min_width=300',
        ],
            $messages = [
                'passport.dimensions' => 'Passport Image is too small. Must be at least 400px wide.',

            ]);
        DB::beginTransaction();

        try {

            // $img = array("", "");
            // if ($req->hasFile('passport')) {

            //     $img = $this->getBinaryImagepg();
            // }
            if ($req->hasFile('passport')) {
                $img1 = Image::make($req->file('passport'))->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $passport = base64_encode($img1->encode()->encoded);
                $img = $passport;
            } // end Passport

            DB::table('usersbiodata')->insert([
                'user_id' => session('userid'),
                'middle_name' => $req->middle_name,
                'gender' => $req->gender,
                'religion' => $req->religion,
                'dob' => $req->dob,
                'nationality' => $req->nationality,
                'lga' => $req->lga,
                'state_origin' => $req->state_origin,
                'address' => $req->address,
                'session_id' => $this->getCurrentAdmissionSession(),
                'passport' => $img,
                // 'passport' => $img[0],
                // 'passport_type' => $img[1],
                'referral' => $req->referral,
                //   'passport'=>$req->passport,'passportype'=>$file_extension
            ]);

            DB::table('users')->where('id', session('userid'))->update([
                'applicant_type' => 'PG',

            ]);
            DB::table('usersbiodata')->where('user_id', session('userid'))->update([
                'status' => 1,

            ]);

            //  Mail::to($req->email)->send(new Confirmsignup($mailData));
            DB::commit();

            $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Saving your information </div>';
            return redirect('/pg')->with('signUpMsg', $signUpMsg);
        } catch (QueryException $e) {
            DB::rollBack();
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Sorry try again</div>';
                return redirect('/pg')->with('signUpMsg', $signUpMsg);
            } else {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Sorry try again' . $e->getMessage() . '</div>';
                return redirect('/pg')->with('signUpMsg', $signUpMsg);
            }
        }
    }
    // END OF PG BIODATE

    //PG SPONSOR INSTERTING
    public function pgsponsors(Request $req)
    {
        // dd($req);
        DB::beginTransaction();
        try {

            DB::table('sponsors')->insert([
                'user_id' => session('userid'),
                'sponsor_title' => $req->sponsor,
                'sponsor_relationship' => $req->sponsor_relationship,
                'name' => $req->name,
                'sponsors_phone' => $req->sponsors_phone,
                'sponsors_email' => $req->sponsors_email,
                'sponsors_address' => $req->sponsors_address,
                'occupation' => $req->occupation,
                //   'passport'=>$req->passport,'passportype'=>$file_extension
            ]);
            DB::table('usersbiodata')->where('user_id', session('userid'))->update([
                'status' => 2,

            ]);

            //  Mail::to($req->email)->send(new Confirmsignup($mailData));
            DB::commit();

            //  Mail::to($req->email)->send(new Confirmsignup($mailData));

            $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Saviing biodata</div>';
            return redirect('/pg')->with('signUpMsg', $signUpMsg);
        } catch (QueryException $e) {
            DB::rollBack();
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> YSorry try again</div>';
                return redirect('/pg')->with('signUpMsg', $signUpMsg);
            } else {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Sorry try again' . $e->getMessage() . '</div>';
                return redirect('/pg')->with('signUpMsg', $signUpMsg);
            }
        }
    }

    // END OF INSERTING INTO PG APPLICANT
    public function getpgurl()
    {
        return 'https://docs.google.com/forms/d/e/1FAIpQLSdPRhgBHMVU49nMEdyT5zOLQKwJqyp59HHz0OI2BYzsTTBeHw/viewform?usp=pp_url';
    }
    public function pginformation(Request $req)
    {
        // dd($req);

        DB::beginTransaction();
        try {

            DB::table('pgs')->insert([
                'user_id' => session('userid'),
                'mode' => $req->mode,
                'type' => $req->type,
                'research_topic' => $req->research_topic,
                'course_applied' => $req->course_applied,

                //   'passport'=>$req->passport,'passportype'=>$file_extension
            ]);
            DB::table('usersbiodata')->where('user_id', session('userid'))->update([
                'status' => 3,

            ]);
            DB::table('pg_educations')->insert([
                'user_id' => session('userid'),
                'institution' => $req->institution,
                'period' => $req->period,
                'course' => $req->course,
                'certificate_name' => $req->certificate_name,
                'certificate_type' => $req->certificate_type,
                'class_honour' => $req->class_honour,

            ]);
            DB::table('pg_referees')->insert([
                'user_id' => session('userid'),
                'name1' => $req->name1,
                'position1' => $req->position1,
                'institution1' => $req->institution1,
                'email1' => $req->email1,
                'name2' => $req->name2,
                'position2' => $req->position2,
                'institution2' => $req->institution2,
                'email2' => $req->email2,
                'name3' => $req->name3,
                'position3' => $req->position3,
                'institution3' => $req->institution3,
                'email3' => $req->email3,

            ]);
            $userreferee = DB::table('users')->where('id', session('userid'))->first();

            $mailData = [
                'title' => 'Welcome to Veritas University Abuja',
                'msg' => ' Please click on the button below to fill the Referee form ',
                'url' => $this->getpgUrl(),
                'surname' => $userreferee->first_name . " " . $userreferee->surname,
            ];

            Mail::to($req->email1)->send(new Referee($mailData));
            Mail::to($req->email2)->send(new Referee($mailData));
            Mail::to($req->email3)->send(new Referee($mailData));

            DB::commit();

            $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Saving your information</div>';
            return redirect('/pg')->with('signUpMsg', $signUpMsg);
        } catch (QueryException $e) {
            DB::rollBack();
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Sorry try again</div>';
                return redirect('/pg')->with('signUpMsg', $signUpMsg);
            } else {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Sorry try again' . $e->getMessage() . '</div>';
                return redirect('/pg')->with('signUpMsg', $signUpMsg);
            }
        }
    }

    //pgFUCNTION THAT INSERT OLEVEL DETAILS INTO THE DATEBASE
    public function pgolevel(Request $req)
    {
        // dd($req);
        try {
            $olevel = array();
            if (isset($_POST['subject_1'])) {
                $subject = array("subject" => $req->subject_1, "exam" => $req->exam_1, "grade" => $req->grade_1);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_2'])) {

                $subject = array("subject" => $req->subject_2, "exam" => $req->exam_2, "grade" => $req->grade_2);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_3'])) {
                $subject = array("subject" => $req->subject_3, "exam" => $req->exam_3, "grade" => $req->grade_3);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_4'])) {
                $subject = array("subject" => $req->subject_4, "exam" => $req->exam_4, "grade" => $req->grade_4);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_5'])) {
                $subject = array("subject" => $req->subject_5, "exam" => $req->exam_5, "grade" => $req->grade_5);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_6'])) {
                $subject = array("subject" => $req->subject_6, "exam" => $req->exam_6, "grade" => $req->grade_6);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_7'])) {
                $subject = array("subject" => $req->subject_8, "exam" => $req->exam_8, "grade" => $req->grade_8);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_8'])) {
                $subject = array("subject" => $req->subject_8, "exam" => $req->exam_8, "grade" => $req->grade_8);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_9'])) {
                $subject = array("subject" => $req->subject_9, "exam" => $req->exam_9, "grade" => $req->grade_9);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_10'])) {
                $subject = array("subject" => $req->subject_10, "exam" => $req->exam_10, "grade" => $req->grade_10);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_11'])) {
                $subject = array("subject" => $req->subject_11, "exam" => $req->exam_11, "grade" => $req->grade_11);
                array_push($olevel, $subject);
            }
            if (isset($_POST['subject_12'])) {
                $subject = array("subject" => $req->subject_12, "exam" => $req->exam_12, "grade" => $req->grade_12);
                array_push($olevel, $subject);
            }

            DB::table('olevel')->insert([
                'user_id' => session('userid'),
                'olevel_result' => json_encode($olevel, JSON_HEX_TAG),
                'sitting' => $req->sitting,

                //   'passport'=>$req->passport,'passportype'=>$file_extension
            ]);
            DB::table('usersbiodata')->where('user_id', session('userid'))->update([
                'status' => 4,

            ]);

            DB::commit();

            //  Mail::to($req->email)->send(new Confirmsignup($mailData));

            $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Thank You for filling your Application Form</div>';
            return redirect('/admission')->with('signUpMsg', $signUpMsg);
        } catch (QueryException $e) {
            DB::rollBack();
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> You have registered before, double registration is not alowed</div>';
                return redirect('/pg')->with('signUpMsg', $signUpMsg);
            } else {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Your registration was not successful, please try again later or call Muoga Market help line' . $e->getMessage() . '</div>';
                return redirect('/pg')->with('signUpMsg', $signUpMsg);
            }
        }
    }
    // END OF olevel FUNCTIONS for transfers applicant

    // *********************************************************************************************

    // *******************************************************************

    public function viewprofile()
    {

        // $app_id = base64_decode(urldecode($id));

        $applicantsDetails = "";
        if (session('usersType') == 'UTME') {
            $applicantsDetails = DB::table('users')->where('users.applicant_type', 'UTME')
                ->where('users.id', session('userid'))
                ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->leftJoin('utme', 'utme.user_id', '=', 'users.id')
                ->leftJoin('sponsors', 'sponsors.user_id', '=', 'users.id')
                ->leftJoin('olevel', 'olevel.user_id', '=', 'users.id')
                ->leftJoin('uploads', 'uploads.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.*', 'sponsors.*', 'utme.*', 'olevel.*', 'uploads.*')
                ->first();
            return view('admissions./viewUTMEprofile', compact('applicantsDetails'));
        } elseif (session('usersType') == 'DE') {
            $applicantsDetails = DB::table('users')->where('users.applicant_type', 'DE')
                ->where('users.id', session('userid'))
                ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->leftJoin('de', 'de.user_id', '=', 'users.id')
                ->leftJoin('sponsors', 'sponsors.user_id', '=', 'users.id')
                ->leftJoin('olevel', 'olevel.user_id', '=', 'users.id')
                ->leftJoin('uploads', 'uploads.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.*', 'sponsors.*', 'de.*', 'olevel.*', 'uploads.*')
                ->first();
            return view('admissions./viewDEprofile', compact('applicantsDetails'));
        } elseif (session('usersType') == 'Transfer') {
            $applicantsDetails = DB::table('users')->where('users.applicant_type', 'Transfer')
                ->where('users.id', session('userid'))
                ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->leftJoin('transfers', 'transfers.user_id', '=', 'users.id')
                ->leftJoin('sponsors', 'sponsors.user_id', '=', 'users.id')
                ->leftJoin('olevel', 'olevel.user_id', '=', 'users.id')
                ->leftJoin('uploads', 'uploads.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.*', 'sponsors.*', 'transfers.*', 'olevel.*', 'uploads.*')
                ->first();
            return view('admissions./viewTransferprofile', compact('applicantsDetails'));
        } elseif (session('usersType') == 'PG') {
            $applicantsDetails = DB::table('users')->where('users.applicant_type', 'PG')
                ->where('users.id', session('userid'))
                ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->leftJoin('pgs', 'pgs.user_id', '=', 'users.id')
                ->leftJoin('sponsors', 'sponsors.user_id', '=', 'users.id')
                ->leftJoin('pg_referees', 'pg_referees.user_id', '=', 'users.id')
                ->leftJoin('pg_educations', 'pg_educations.user_id', '=', 'users.id')
                ->leftJoin('olevel', 'olevel.user_id', '=', 'users.id')
                ->leftJoin('uploads', 'uploads.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.*', 'sponsors.*', 'pgs.*', 'olevel.*', 'pg_referees.*', 'pg_educations.*', 'uploads.*')
                ->first();
            return view('admissions./viewPGprofile', compact('applicantsDetails'));
        }
    }
    // END OF CLASS CLOSING TAG

    //*****************************************EDIT PROFILE ******************************************************

    public function editpassword()
    {
        $applicantsDetails = "";
        if (session('usersType') == 'UTME') {
            $applicantsDetails = DB::table('users')->where('users.applicant_type', 'UTME')
                ->where('users.id', session('userid'))
                ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->leftJoin('utme', 'utme.user_id', '=', 'users.id')
                ->leftJoin('sponsors', 'sponsors.user_id', '=', 'users.id')
                ->leftJoin('olevel', 'olevel.user_id', '=', 'users.id')
                ->leftJoin('uploads', 'uploads.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.*', 'sponsors.*', 'utme.*', 'olevel.*', 'uploads.*')
                ->first();
            $programs = Program::orderBy('name', 'ASC')->get();
            $subjects = subjects::orderBy('subject_name', 'ASC')->get();
            return view('admissions./changeuserpassword', compact('applicantsDetails'), ['programs' => $programs, 'subjects' => $subjects]);
        } elseif (session('usersType') == 'DE') {
            $applicantsDetails = DB::table('users')->where('users.applicant_type', 'DE')
                ->where('users.id', session('userid'))
                ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->leftJoin('de', 'de.user_id', '=', 'users.id')
                ->leftJoin('sponsors', 'sponsors.user_id', '=', 'users.id')
                ->leftJoin('olevel', 'olevel.user_id', '=', 'users.id')
                ->leftJoin('uploads', 'uploads.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.*', 'sponsors.*', 'de.*', 'olevel.*', 'uploads.*')
                ->first();
            $programs = Program::orderBy('name', 'ASC')->get();
            $subjects = subjects::orderBy('subject_name', 'ASC')->get();
            return view('admissions./changeuserpassword', compact('applicantsDetails'), ['programs' => $programs, 'subjects' => $subjects]);
        } elseif (session('usersType') == 'Transfer') {
            $applicantsDetails = DB::table('users')->where('users.applicant_type', 'Transfer')
                ->where('users.id', session('userid'))
                ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->leftJoin('transfers', 'transfers.user_id', '=', 'users.id')
                ->leftJoin('sponsors', 'sponsors.user_id', '=', 'users.id')
                ->leftJoin('uploads', 'uploads.user_id', '=', 'users.id')
                ->leftJoin('olevel', 'olevel.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.*', 'sponsors.*', 'transfers.*', 'olevel.*', 'uploads.*')
                ->first();
            $programs = Program::orderBy('name', 'ASC')->get();
            $subjects = subjects::orderBy('subject_name', 'ASC')->get();
            return view('admissions./changeuserpassword', compact('applicantsDetails'), ['programs' => $programs, 'subjects' => $subjects]);
        } elseif (session('usersType') == 'PG') {
            $applicantsDetails = DB::table('users')->where('users.applicant_type', 'PG')
                ->where('users.id', session('userid'))
                ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->leftJoin('pgs', 'pgs.user_id', '=', 'users.id')
                ->leftJoin('sponsors', 'sponsors.user_id', '=', 'users.id')
                ->leftJoin('pg_referees', 'pg_referees.user_id', '=', 'users.id')
                ->leftJoin('pg_educations', 'pg_educations.user_id', '=', 'users.id')
                ->leftJoin('olevel', 'olevel.user_id', '=', 'users.id')
                ->leftJoin('uploads', 'uploads.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.*', 'sponsors.*', 'pgs.*', 'olevel.*', 'pg_referees.*', 'pg_educations.*', 'uploads.*')
                ->first();
            $programs = Program::orderBy('name', 'ASC')->get();
            $subjects = subjects::orderBy('subject_name', 'ASC')->get();
            return view('admissions./changeuserpassword', compact('applicantsDetails'), ['programs' => $programs, 'subjects' => $subjects]);
        }
    }

    public function editprofile()
    {

        // $app_id = base64_decode(urldecode($id));

        $applicantsDetails = "";
        if (session('usersType') == 'UTME') {
            $applicantsDetails = DB::table('users')->where('users.applicant_type', 'UTME')
                ->where('users.id', session('userid'))
                ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->leftJoin('utme', 'utme.user_id', '=', 'users.id')
                ->leftJoin('sponsors', 'sponsors.user_id', '=', 'users.id')
                ->leftJoin('olevel', 'olevel.user_id', '=', 'users.id')
                ->leftJoin('uploads', 'uploads.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.*', 'sponsors.*', 'utme.*', 'olevel.*', 'uploads.*')
                ->first();
            $programs = Program::orderBy('name', 'ASC')->get();
            $subjects = subjects::orderBy('subject_name', 'ASC')->get();
            return view('admissions./editUTME', compact('applicantsDetails'), ['programs' => $programs, 'subjects' => $subjects]);
        } elseif (session('usersType') == 'DE') {
            $applicantsDetails = DB::table('users')->where('users.applicant_type', 'DE')
                ->where('users.id', session('userid'))
                ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->leftJoin('de', 'de.user_id', '=', 'users.id')
                ->leftJoin('sponsors', 'sponsors.user_id', '=', 'users.id')
                ->leftJoin('olevel', 'olevel.user_id', '=', 'users.id')
                ->leftJoin('uploads', 'uploads.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.*', 'sponsors.*', 'de.*', 'olevel.*', 'uploads.*')
                ->first();
            $programs = Program::orderBy('name', 'ASC')->get();
            $subjects = subjects::orderBy('subject_name', 'ASC')->get();
            return view('admissions./editDE', compact('applicantsDetails'), ['programs' => $programs, 'subjects' => $subjects]);
        } elseif (session('usersType') == 'Transfer') {
            $applicantsDetails = DB::table('users')->where('users.applicant_type', 'Transfer')
                ->where('users.id', session('userid'))
                ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->leftJoin('transfers', 'transfers.user_id', '=', 'users.id')
                ->leftJoin('sponsors', 'sponsors.user_id', '=', 'users.id')
                ->leftJoin('uploads', 'uploads.user_id', '=', 'users.id')
                ->leftJoin('olevel', 'olevel.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.*', 'sponsors.*', 'transfers.*', 'olevel.*', 'uploads.*')
                ->first();
            $programs = Program::orderBy('name', 'ASC')->get();
            $subjects = subjects::orderBy('subject_name', 'ASC')->get();
            return view('admissions./editTransfer', compact('applicantsDetails'), ['programs' => $programs, 'subjects' => $subjects]);
        } elseif (session('usersType') == 'PG') {
            $applicantsDetails = DB::table('users')->where('users.applicant_type', 'PG')
                ->where('users.id', session('userid'))
                ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->leftJoin('pgs', 'pgs.user_id', '=', 'users.id')
                ->leftJoin('sponsors', 'sponsors.user_id', '=', 'users.id')
                ->leftJoin('pg_referees', 'pg_referees.user_id', '=', 'users.id')
                ->leftJoin('pg_educations', 'pg_educations.user_id', '=', 'users.id')
                ->leftJoin('olevel', 'olevel.user_id', '=', 'users.id')
                ->leftJoin('uploads', 'uploads.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.*', 'sponsors.*', 'pgs.*', 'olevel.*', 'pg_referees.*', 'pg_educations.*', 'uploads.*')
                ->first();
            $programs = Program::orderBy('name', 'ASC')->get();
            $subjects = subjects::orderBy('subject_name', 'ASC')->get();
            return view('admissions./editPG', compact('applicantsDetails'), ['programs' => $programs, 'subjects' => $subjects]);
        }
    }

    public function changepassword(Request $req)
    {

        if ($req->password == $req->password_confirmation) {
            DB::table('users')->where('email', $req->email)
                ->update([

                    'email' => $req->email,
                    //Hash::make to encrpty or hash the password
                    'password' => Hash::make($req->password),
                ]);

            $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Your Password Change was Successfull</div>';
            return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
        } else {
            $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Password mismatched</div>';
            return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
        }
    }

    //EDIT UTME PROFILE

    public function editbiodata(Request $req)
    {
        $validatedData = $req->validate([
            'gender' => 'required|string|max:6',
            'dob' => 'required|string|max:50',
            'nationality' => 'required|string|max:100',
            'state_origin' => 'required|string|max:50',
            'religion' => 'required|string|max:50',
            'address' => 'required|string|max:200',
            // 'passport' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1048|dimensions:min_width=300',
        ], $messages = [
            'passport.dimensions' => 'Passport Image is too small. Must be at least 400px wide.',
            'passport.max' => 'Passport Image size exceeds the allowed limit. Maximum file size is 1048KB.',
        ]);

        DB::beginTransaction();

        try {
            // Check if passport image is uploaded
            if ($req->hasFile('passport')) {
                $img1 = Image::make($req->file('passport'))->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $passport = base64_encode($img1->encode()->encoded);
                $img = $passport;

                if (filesize($req->file('passport')) > 900 * 1024) {
                    $signUpMsg = ' <div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error! </strong>Passport image size exceeds the maximum allowed limit of 300KB. please try again</div>'
                    ;
                    return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
                }

                // Update passport image and other biodata fields
                DB::table('users')->where('id', session('userid'))->update([
                    'id' => session('userid'),
                    'surname' => $req->surname,
                    'first_name' => $req->first_name,
                    'phone' => $req->phone,
                    'email' => $req->email,
                ]);

                DB::table('usersbiodata')->where('user_id', session('userid'))->update([
                    'user_id' => session('userid'),
                    'middle_name' => $req->middle_name,
                    'gender' => $req->gender,
                    'religion' => $req->religion,
                    'dob' => $req->dob,
                    'nationality' => $req->nationality,
                    'lga' => $req->lga,
                    'state_origin' => $req->state_origin,
                    'address' => $req->address,
                    'passport' => $img,
                    'referral' => $req->referral,
                ]);
            } else {
                // Update other biodata fields without changing the passport image
                DB::table('users')->where('id', session('userid'))->update([
                    'id' => session('userid'),
                    'surname' => $req->surname,
                    'first_name' => $req->first_name,
                    'phone' => $req->phone,
                    'email' => $req->email,
                ]);

                DB::table('usersbiodata')->where('user_id', session('userid'))->update([
                    'user_id' => session('userid'),
                    'middle_name' => $req->middle_name,
                    'gender' => $req->gender,
                    'religion' => $req->religion,
                    'dob' => $req->dob,
                    'nationality' => $req->nationality,
                    'lga' => $req->lga,
                    'state_origin' => $req->state_origin,
                    'address' => $req->address,
                    'referral' => $req->referral,
                ]);
            }

            DB::commit();

            $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Your have successfully updated your Biodata</div>';
            return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
        } catch (QueryException $e) {
            DB::rollBack();
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Unsuccessful, please try again</div>';
                return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
            } else {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Unsuccessful, please try again' . $e->getMessage() . '</div>';
                return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
            }
        }
    }

    public function editsponsors(Request $req)
    {
        // dd($req);
        DB::beginTransaction();
        try {

            DB::table('sponsors')->where('user_id', session('userid'))->update([
                'user_id' => session('userid'),
                'name' => $req->name,
                'sponsors_phone' => $req->sponsors_phone,
                'sponsors_email' => $req->sponsors_email,
                'sponsors_address' => $req->sponsors_address,
                'occupation' => $req->occupation,
                //   'passport'=>$req->passport,'passportype'=>$file_extension
            ]);

            //  Mail::to($req->email)->send(new Confirmsignup($mailData));
            DB::commit();

            //  Mail::to($req->email)->send(new Confirmsignup($mailData));

            $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> You have Successful Updated your Sponsor Information</div>';
            return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
        } catch (QueryException $e) {
            DB::rollBack();
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Your Update was unsucessful</div>';
                return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
            } else {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Your Update was unsucessful' . $e->getMessage() . '</div>';
                return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
            }
        }
    }

    public function editutmeuploads(Request $req)
    {
        $this->validate($req, [
            'jamb' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1048|dimensions:min_width=300',
            'olevel1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1048|dimensions:min_width=300',
            'olevel2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1048|dimensions:min_width=300',
        ],
            $messages = [
                'jamb.dimensions' => 'Result Image is too small. Must be at least 400px wide.',
                'olevel1.dimensions' => 'Olevel Image is too small. Must be at least 400px wide.',
                'olevel2.dimensions' => 'Olevel Image is too small. Must be at least 400px wide.',
            ]);

        DB::beginTransaction();

        try {
            // Process result upload
            if ($req->hasFile('jamb')) {
                $img1 = Image::make($req->file('jamb'))->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $passport = base64_encode($img1->encode()->encoded);
                $img = $passport;

                DB::table('uploads')->where('user_id', session('userid'))->update([
                    'jamb' => $img,
                ]);
            }

            // Process olevel1 upload
            if ($req->hasFile('olevel1')) {
                $img2 = Image::make($req->file('olevel1'))->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $passport = base64_encode($img2->encode()->encoded);
                $img1 = $passport;

                DB::table('uploads')->where('user_id', session('userid'))->update([
                    'olevel1' => $img1,
                ]);
            }

            // Process olevel2 upload
            if ($req->hasFile('olevel2')) {
                $img3 = Image::make($req->file('olevel2'))->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $passport = base64_encode($img3->encode()->encoded);
                $img2 = $passport;

                DB::table('uploads')->where('user_id', session('userid'))->update([
                    'olevel2' => $img2,
                ]);
            }

            DB::commit();

            $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Your have successfully updated your certificate</div>';
            return redirect('/editprofile')->with('signUpMsg', $signUpMsg);

        } catch (QueryException $e) {
            DB::rollBack();
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Unsuccessful, please try again</div>';
                return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
            } else {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Unsuccessful, please try again' . $e->getMessage() . '</div>';
                return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
            }
        }
    }

    // function editolevel(Request $req)
    // {
    //     // dd($req);
    //     try {
    //         $olevel = array();
    //         if (isset($_POST['subject_1'])) {
    //             $subject = array("subject" => $req->subject_1, "exam" => $req->exam_1, "grade" => $req->grade_1);
    //             array_push($olevel, $subject);
    //         }
    //         if (isset($_POST['subject_2'])) {

    //             $subject = array("subject" => $req->subject_2, "exam" => $req->exam_2, "grade" => $req->grade_2);
    //             array_push($olevel, $subject);
    //         }
    //         if (isset($_POST['subject_3'])) {
    //             $subject = array("subject" => $req->subject_3, "exam" => $req->exam_3, "grade" => $req->grade_3);
    //             array_push($olevel, $subject);
    //         }
    //         if (isset($_POST['subject_4'])) {
    //             $subject = array("subject" => $req->subject_4, "exam" => $req->exam_4, "grade" => $req->grade_4);
    //             array_push($olevel, $subject);
    //         }
    //         if (isset($_POST['subject_5'])) {
    //             $subject = array("subject" => $req->subject_5, "exam" => $req->exam_5, "grade" => $req->grade_5);
    //             array_push($olevel, $subject);
    //         }
    //         if (isset($_POST['subject_6'])) {
    //             $subject = array("subject" => $req->subject_6, "exam" => $req->exam_6, "grade" => $req->grade_6);
    //             array_push($olevel, $subject);
    //         }
    //         if (isset($_POST['subject_7'])) {
    //             $subject = array("subject" => $req->subject_8, "exam" => $req->exam_8, "grade" => $req->grade_8);
    //             array_push($olevel, $subject);
    //         }
    //         if (isset($_POST['subject_8'])) {
    //             $subject = array("subject" => $req->subject_8, "exam" => $req->exam_8, "grade" => $req->grade_8);
    //             array_push($olevel, $subject);
    //         }
    //         if (isset($_POST['subject_9'])) {
    //             $subject = array("subject" => $req->subject_9, "exam" => $req->exam_9, "grade" => $req->grade_9);
    //             array_push($olevel, $subject);
    //         }
    //         if (isset($_POST['subject_10'])) {
    //             $subject = array("subject" => $req->subject_10, "exam" => $req->exam_10, "grade" => $req->grade_10);
    //             array_push($olevel, $subject);
    //         }
    //         if (isset($_POST['subject_11'])) {
    //             $subject = array("subject" => $req->subject_11, "exam" => $req->exam_11, "grade" => $req->grade_11);
    //             array_push($olevel, $subject);
    //         }
    //         if (isset($_POST['subject_12'])) {
    //             $subject = array("subject" => $req->subject_12, "exam" => $req->exam_12, "grade" => $req->grade_12);
    //             array_push($olevel, $subject);
    //         }

    //         DB::table('olevel')->where('user_id', session('userid'))->update([
    //             'user_id' => session('userid'),
    //             'olevel_result' => json_encode($olevel, JSON_HEX_TAG),
    //             'sitting' => $req->sitting

    //             //   'passport'=>$req->passport,'passportype'=>$file_extension
    //         ]);

    //         DB::commit();

    //         //  Mail::to($req->email)->send(new Confirmsignup($mailData));

    //         $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> You have Successfully Updated your Olevel</div>';
    //         return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
    //     } catch (QueryException $e) {
    //         DB::rollBack();
    //         $error_code = $e->errorInfo[1];
    //         if ($error_code == 1062) {
    //             $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Unsucessfully Please try again!</div>';
    //             return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
    //         } else {
    //             $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Unsucessfully Please try again!' . $e->getMessage() . '</div>';
    //             return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
    //         }
    //     }
    // }

// UTME UPDATE PROFILE JAMB
    public function editutmejamb(Request $req)
    {

        DB::beginTransaction();
        try {

            DB::table('utme')->where('user_id', session('userid'))->update([
                'user_id' => session('userid'),
                'jamb_reg_no' => $req->jamb_reg_no,
                'score' => $req->score,
                'course_applied' => $req->course_applied,
                'first_choice' => $req->first_choice,
                'second_choice' => $req->second_choice,
                'subject_1' => $req->subject_1,
                'subject_2' => $req->subject_2,
                'subject_3' => $req->subject_3,
                'subject_4' => $req->subject_4,

            ]);

            DB::commit();

            $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> You have Successfully Updated your  Information </div>';
            return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
        } catch (QueryException $e) {
            DB::rollBack();
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Unsucessfully Please try again!</div>';
                return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
            } else {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Unsucessfully Please try again!' . $e->getMessage() . '</div>';
                return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
            }
        }
    }
    // END OF UTME FUCNTION THAT INSERT JAMB DETAILS INTO THE BASEBASE
    public function editdeinformation(Request $req)
    {
        // dd($req);

        DB::beginTransaction();
        try {

            DB::table('de')->where('user_id', session('userid'))->update([
                'user_id' => session('userid'),
                'jamb_de_no' => $req->jamb_de_no,
                'qualification' => $req->qualification,
                'qualification_year' => $req->qualification_year,
                'qualification_number' => $req->qualification_number,
                'course_applied' => $req->course_applied,

            ]);

            DB::commit();

            $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> You have successfully updated your Diect Entry information</div>';
            return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
        } catch (QueryException $e) {
            DB::rollBack();
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Error try again </div>';
                return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
            } else {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Your update was not successful try again' . $e->getMessage() . '</div>';
                return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
            }
        }
    }
    public function edittransfersinformation(Request $req)
    {
        // dd($req);

        DB::beginTransaction();
        try {

            DB::table('transfers')->where('user_id', session('userid'))->update([
                'user_id' => session('userid'),
                'institution' => $req->institution,
                'matric_no' => $req->matric_no,
                'entry_year' => $req->entry_year,
                'level' => $req->level,
                'course' => $req->course,
                'cgpa' => $req->cgpa,
                'course_applied' => $req->course_applied,

            ]);

            DB::commit();

            $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> You have successfully update Transfer information</div>';
            return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
        } catch (QueryException $e) {
            DB::rollBack();
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Erro try again</div>';
                return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
            } else {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Your update of Transfer information was not successful, please try again later' . $e->getMessage() . '</div>';
                return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
            }
        }
    }
    //EDIT PG PROFILE

    public function editpginformation(Request $req)
    {
        // dd($req);

        DB::beginTransaction();
        try {

            DB::table('pgs')->where('user_id', session('userid'))->update([
                'user_id' => session('userid'),
                'mode' => $req->mode,
                'type' => $req->type,
                'research_topic' => $req->research_topic,
                'course_applied' => $req->course_applied,

                //   'passport'=>$req->passport,'passportype'=>$file_extension
            ]);

            DB::table('pg_educations')->where('user_id', session('userid'))->update([
                'user_id' => session('userid'),
                'institution' => $req->institution,
                'period' => $req->period,
                'course' => $req->course,
                'certificate_name' => $req->certificate_name,
                'certificate_type' => $req->certificate_type,
                'class_honour' => $req->class_honour,

            ]);
            DB::table('pg_referees')->where('user_id', session('userid'))->update([
                'user_id' => session('userid'),
                'name1' => $req->name1,
                'position1' => $req->position1,
                'institution1' => $req->institution1,
                'email1' => $req->email1,
                'name2' => $req->name2,
                'position2' => $req->position2,
                'institution2' => $req->institution2,
                'email2' => $req->email2,
                'name3' => $req->name3,
                'position3' => $req->position3,
                'institution3' => $req->institution3,
                'email3' => $req->email3,

            ]);
            $userreferee = DB::table('users')->where('id', session('userid'))->first();

            $mailData = [
                'title' => 'School of PostGraduate Studies',
                'msg' => ' Please click on the button below to fill the Referee form ',
                'url' => $this->getpgUrl(),
                'surname' => $userreferee->first_name . " " . $userreferee->surname,
            ];

            Mail::to($req->email1)->send(new Referee($mailData));
            Mail::to($req->email2)->send(new Referee($mailData));
            Mail::to($req->email3)->send(new Referee($mailData));

            DB::commit();

            $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Your have Sucessfully updated your PG information.</div>';
            return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
        } catch (QueryException $e) {
            DB::rollBack();
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Unsucessfully Try again</div>';
                return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
            } else {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Your profile was not updated please try again' . $e->getMessage() . '</div>';
                return redirect('/editprofile')->with('signUpMsg', $signUpMsg);
            }
        }
    }

    //pgFUCNTION THAT INSERT OLEVEL DETAILS INTO THE DATEBASE

    // END OF CLASS CLOSING TAG

// public function userapp(){
//     $userapp = DB::table('users')->where('id', session('userid'))->first();
//     return view('admissions.home', compact('userapp'));
// }

//NEW UPDATE FUNCTIONS

    public function editusers($id)
    {
        if ($this->hasPriviledge("editusersinfo", session('adminId'))) {
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
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
            return view('admissions.error', compact('loginMsg'));
        }
    }

    public function editusersinfo(Request $req)
    {
        if ($this->hasPriviledge("editusersinfo", session('adminId'))) {

            try {
                DB::table('users')->where('email', $req->email)
                    ->update([

                        'first_name' => $req->first_name,
                        'surname' => $req->surname,
                        'email' => $req->email,
                        'phone' => $req->phone,
                        'applicant_type' => $req->applicant_type,
                        'email_verified_at' => $req->email_verified_at,

                    ]);
                $approvalMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You have successful Edited the User </div>';
                return redirect('/admissions.adminallUsers')->with('approvalMsg', $approvalMsg);

            } catch (QueryException $e) {
                $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your Edit was not successful' . $e->getMessage();' </div>';
                return redirect('/admissions.adminallUsers')->with('approvalMsg', $approvalMsg);
                // return redirect('/newPayment/')->with('mgs',$statusMsg);
            }
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
            return view('admissions.error', compact('loginMsg'));
        }
    }

    public function resetuserspassword(Request $req)
    {
        if ($this->hasPriviledge("resetuserpassword", session('adminId'))) {

            try {
                $newpass = 'welcome';
                DB::table('users')->where('email', $req->email)
                    ->update([

                        // 'email' => $req->email,
                        //Hash::make to encrpty or hash the password
                        'password' => Hash::make($newpass),

                    ]);
                $approvalMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> User Password has been Reset to <strong>welcome</strong> </div>';
                return redirect('/adminallUsers')->with('approvalMsg', $approvalMsg);
                // return redirect('allUsers');
            } catch (QueryException $e) {
                $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your Verification was not successful' . $e->getMessage();' </div>';
                return redirect('/adminallUsers')->with('approvalMsg', $approvalMsg);
                // return redirect('/newPayment/')->with('mgs',$statusMsg);
            }
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
            return view('admissions.error', compact('loginMsg'));
        }
    }
    public function resetadminpassword(Request $req)
    {
        if ($this->hasPriviledge("resetadminpassword", session('adminId'))) {

            try {
                $newpass = 'welcome@123';
                DB::table('admin')->where('email', $req->email)
                    ->update([

                        // 'email' => $req->email,
                        //Hash::make to encrpty or hash the password
                        'password' => Hash::make($newpass),

                    ]);
                $approvalMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Admin Password has been Reset to <strong>welcome@123</strong> </div>';
                return redirect('/viewAdmins')->with('approvalMsg', $approvalMsg);
                // return redirect('allUsers');
            } catch (QueryException $e) {
                $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your password reset not successful' . $e->getMessage();' </div>';
                return redirect('/viewAdmins')->with('approvalMsg', $approvalMsg);
                // return redirect('/newPayment/')->with('mgs',$statusMsg);
            }
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
            return view('admissions.error', compact('loginMsg'));
        }
    }

    // ADD REMITA SERVICE TYPE

    public function addRemitaServiceType(Request $req)
    {
        if ($this->hasPriviledge("addRemitaServiceType", session('adminId'))) {

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

                ]);

                //  Mail::to($req->email)->send(new Confirmsignup($mailData));
                DB::commit();

                $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong></strong>Remita Service Type Successfully Added! </div>';
                return redirect('/addRemitaServiceType')->with('signUpMsg', $signUpMsg);
                // return redirect('/viewRemitaServiceType');
                // ->with('signUpMsg',$signUpMsg);
            } catch (QueryException $e) {
                DB::rollBack();
                $error_code = $e->errorInfo[1];
                if ($error_code == 1062) {
                    $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> You cant add Thesame Serice Type Twice </div>';
                    return redirect('/addRemitaServiceType')->with('signUpMsg', $signUpMsg);
                } else {
                    $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong>  Try again /div>';
                    //   $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong>  please try again later or call Veritas University help line'.$e->getMessage().'</div>';
                    return redirect('/addRemitaServiceType')->with('signUpMsg', $signUpMsg);
                }
            }
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
            return view('admissions.error', compact('loginMsg'));
        }
    }
    public function viewRemitaServiceType()
    {
        if ($this->hasPriviledge("viewRemitaServiceType", session('adminId'))) {
            $fee_types = fee_types::orderBy('status', 'ASC')
                ->where('status', 1)
                ->get();
            $fee_typess = fee_types::orderBy('status', 'ASC')
                ->where('status', 2)
                ->get();
            return view('admissions./viewRemitaServiceType', compact('fee_typess'), ['fee_types' => $fee_types, ['fee_types' => $fee_typess]]);
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
            return view('admissions.error', compact('loginMsg'));
        }
    }

    public function editRemitaServiceType(Request $req, $id)
    {
        if ($this->hasPriviledge("editRemitaServiceType", session('adminId'))) {
            $fee_types = DB::table('fee_types')
                ->where('provider_code', $id)
                ->select('fee_types.*')
                ->first();
            return view('admissions./editRemitaServiceType', compact('fee_types'), ['fee_types' => $fee_types]);
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
            return view('admissions.error', compact('loginMsg'));
        }
    }

    public function editRemitaServiceTypefee(Request $req)
    {
        if ($this->hasPriviledge("editRemitaServiceType", session('adminId'))) {
            try {
                DB::table('fee_types')->where('provider_code', $req->provider_code)
                    ->update([

                        'name' => $req->name,
                        'amount' => $req->amount,
                        'provider_code' => $req->provider_code,

                    ]);
                $signUpMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You have successful Edited this Service Type </div>';
                return redirect('/viewRemitaServiceType')->with('signUpMsg', $signUpMsg);

            } catch (QueryException $e) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your Edit was not successful' . $e->getMessage();' </div>';
                return redirect('viewRemitaServiceType')->with('signUpMsg', $signUpMsg);
                // return redirect('/newPayment/')->with('mgs',$statusMsg);
            }
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
            return view('admissions.error', compact('loginMsg'));
        }
    }

    public function suspendRemitaServiceType(Request $req)
    {
        if ($this->hasPriviledge("suspendRemitaServiceType", session('adminId'))) {
            try {
                DB::table('fee_types')->where('provider_code', $req->provider_code)
                    ->update([

                        'status' => "2",

                    ]);
                $signUpMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You have successful Suspended this Service Type </div>';
                return redirect('/viewRemitaServiceType')->with('signUpMsg', $signUpMsg);

            } catch (QueryException $e) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your Suspend was not successful' . $e->getMessage();' </div>';
                return redirect('viewRemitaServiceType')->with('signUpMsg', $signUpMsg);
                // return redirect('/newPayment/')->with('mgs',$statusMsg);
            }
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
            return view('admissions.error', compact('loginMsg'));
        }

    }

    public function activeRemitaServiceType(Request $req)
    {
        if ($this->hasPriviledge("activeRemitaServiceType", session('adminId'))) {
            try {
                DB::table('fee_types')->where('provider_code', $req->provider_code)
                    ->update([

                        'status' => "1",

                    ]);
                $signUpMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You have successful Activated this Service Type </div>';
                return redirect('/viewRemitaServiceType')->with('signUpMsg', $signUpMsg);

            } catch (QueryException $e) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your Activation was not successful' . $e->getMessage();' </div>';
                return redirect('viewRemitaServiceType')->with('signUpMsg', $signUpMsg);
                // return redirect('/newPayment/')->with('mgs',$statusMsg);
            }
        } else {
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
            return view('admissions.error', compact('loginMsg'));
        }

    }

}
