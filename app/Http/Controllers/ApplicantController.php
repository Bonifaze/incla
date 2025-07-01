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
use App\Session;
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
        return 'https://portal.incla.edu.ng';
    }

    // Registeration Fuction
    public function register(Request $req)
    {
        $req->validate([
            'surname' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email',
            'country' => 'required|string',
            'password' => 'required|confirmed|min:6', // This handles matching
        ]);
    
        DB::beginTransaction();
    
        try {
            $idcard = DB::table('users')->insertGetId([
                'surname' => $req->surname,
                'first_name' => $req->first_name,
                'middle_name' => $req->middle_name,
                'phone' => $req->phone,
                'email' => $req->email,
                'Nationality' => $req->country,
                'session_id' => $this->getCurrentAdmissionSession(),
                'password' => Hash::make($req->password),
            ]);
    
            $mailData = [
                'title' => 'Welcome to Institute of Consecrated Life in Africa (InCLA)',
                'msg' => 'Thank you for Registering, please click the button below to activate your account',
                'url' => $this->getBaseUrl() . '/confirmation/?applicant=' . base64_encode($idcard),
                'surname' => $req->first_name . " " . $req->middle_name . " " . $req->surname,
            ];
    
            DB::table('password_resets')->insert([
                'email' => $req->email,
                'token' => 'welcome',
            ]);
    
            Mail::to($req->email)->send(new Confirmsignup($mailData));
            Mail::to('noreply@portal.incla.edu.ng')->send(new Confirmsignup($mailData));
    
            DB::commit();
    
            $signUpMsg = '<div class="alert alert-success alert-dismissible text-lg"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> ' . $req->first_name . ' Your registration was successful. Please follow the instruction sent to ' . $req->email . ' to complete the process</div>';
    
            return redirect('/register')->with('signUpMsg', $signUpMsg);
    
        } catch (QueryException $e) {
            DB::rollBack();
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> You have registered before</div>';
            } else {
                $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Your registration was not successful. Please try again later or contact InCLA University help line</div>';
            }
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

                    if ($users->status >= 1) {

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
                'title' => 'Welcome to INCLA Portal',
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
            ->select('remitas.status_code', 'remitas.amount', 'remitas.fee_type', 'remitas.fee_type_id', 'remitas.created_at')
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
        if ($paymen && $paymen->status >= 1) {
            return redirect('/admission');
        }

        return view('admissions.home', compact('paymen', 'admissiontype'));
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
    private function getcurrentsession()
    {
        $session = DB::table('bursary_sessions')->where('status', 1)
            ->select('bursary_sessions.id')->first();
        $ses = $session->id;
        $currentsession = $ses;
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


    public function generatePDF()
    {

        $admission = DB::table('users')->where('users.id', session('userid'))->first();

        return $this->letterPDF();

    }


    public function letterPDF()
    {

        //$programs= programs::orderBy('name','ASC')->get();

        // Get the current user's details
        $pgadmission = DB::table('users')
            ->where('users.id', session('userid'))
            ->join('approved_applicants', 'approved_applicants.user_id', '=', 'users.id')
            ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
            ->leftJoin('academic_record', 'academic_record.user_id', '=', 'users.id')
            ->leftJoin('academic_departments', 'academic_departments.id', '=', 'users.id')
            ->leftJoin('colleges', 'colleges.id', '=', 'users.id')
            ->leftJoin('programs', 'programs.id', '=', 'users.id')
            ->get();

        //  dd($pgadmission);

        // Dynamically fetch the program ID based on the course_program from the user's data
        if ($pgadmission && isset($pgadmission->course_program)) {
            $programId = DB::table('programs')
                ->where('name', $pgadmission->course_program)
                ->value('id');
            $pgadmission->program_id = $programId ?? null; // Add program_id to the details
        }
        //  dd($pgadmission);

        return view('admissions.letterPDF', compact('pgadmission', ));
    }


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
            ->get();
        $programs = Program::orderBy('name', 'ASC')->pluck('name', 'id');
        $sessions = Session::where('status', 1)->value('id');

        // Get the current user's details
        $applicantsDetails = DB::table('users')
            ->where('users.id', session('userid'))
            ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
            ->leftJoin('academic_record', 'academic_record.user_id', '=', 'users.id')
            ->leftJoin('sponsors', 'sponsors.user_id', '=', 'users.id')
            ->leftJoin('uploads', 'uploads.user_id', '=', 'users.id')
            ->select('users.*', 'usersbiodata.*', 'sponsors.*', 'academic_record.*', 'uploads.*')
            ->first();

        // Dynamically fetch the program ID based on the course_program from the user's data
        if ($applicantsDetails && isset($applicantsDetails->course_program)) {
            $programId = DB::table('programs')
                ->where('name', $applicantsDetails->course_program)
                ->value('id');
            $applicantsDetails->program_id = $programId ?? null; // Add program_id to the details
        }

        return view('admissions./admission', compact('status', 'admission', 'applicantsDetails', 'sessions'));
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




     public function getpgurl()
    {
        return 'https://docs.google.com/forms/d/e/1FAIpQLSdPRhgBHMVU49nMEdyT5zOLQKwJqyp59HHz0OI2BYzsTTBeHw/viewform?usp=pp_url';
    }


    public function editpassword()
    {

        $applicantsDetails = DB::table('users')
            ->where('users.id', session('userid'))

            ->select('users.*', )
            ->first();

        return view('admissions./changeuserpassword', compact('applicantsDetails'));

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



    public function editbiodata(Request $req)
    {
        $validatedData = $req->validate([
            'gender' => 'required|string|max:6',
            'dob' => 'required|string|max:50',

            'state_origin' => 'required|string|max:50',

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

                    'gender' => $req->gender,

                    'dob' => $req->dob,

                    'lga' => $req->lga,
                    'state_origin' => $req->state_origin,
                    'address' => $req->address,
                    'passport' => $img,

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

                    'gender' => $req->gender,

                    'dob' => $req->dob,

                    'lga' => $req->lga,
                    'state_origin' => $req->state_origin,
                    'address' => $req->address,

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
                'sponsor_surname' => $req->sponsor_surname,
                'sponsor_othername' => $req->sponsor_othername,
                'sponsors_phone' => $req->sponsors_phone,
                'sponsors_email' => $req->sponsors_email,
                'sponsors_address' => $req->sponsors_address,

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
            'cert' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1048|dimensions:min_width=300',
            'olevel1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1048|dimensions:min_width=300',

        ],
            $messages = [
                'cert.dimensions' => 'Result Image is too small. Must be at least 400px wide.',
                'olevel1.dimensions' => 'Olevel Image is too small. Must be at least 400px wide.',

            ]);

        DB::beginTransaction();

        try {
            // Process result upload
            if ($req->hasFile('cert')) {
                $img1 = Image::make($req->file('cert'))->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $passport = base64_encode($img1->encode()->encoded);
                $img = $passport;

                DB::table('uploads')->where('user_id', session('userid'))->update([
                    'cert' => $img,
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




    public function editusers($id)
    {
        if ($this->hasPriviledge("editusersinfo", session('adminId'))) {


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
                    //   $signUpMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong>  please try again later or call Institute of Consecrated Life in Africa (InCLA) help line'.$e->getMessage().'</div>';
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

    public function submitForm(Request $req)
    {

        //dd($req);

        DB::beginTransaction();

        try {

            // Handle Passport Upload
            $passportImage = null;
            if ($req->hasFile('passport')) {
                $image = Image::make($req->file('passport'))->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $passportImage = base64_encode($image->encode()->encoded);
            }
            $signatureImage = null;
            if ($req->hasFile('signature')) {
                $image = Image::make($req->file('signature'))->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $signatureImage = base64_encode($image->encode()->encoded);
            }

            // Insert Biodata
            DB::table('usersbiodata')->insert([
                'user_id' => session('userid'),
                'title' => $req->title,
                'gender' => $req->gender,
                'dob' => $req->dob,
                'blood_group' => $req->blood_group,
                'genotype' => $req->genotype,
                'lga' => $req->lga,
                'state_origin' => $req->state_origin,
                'address' => $req->address,
                'session_id' => $this->getCurrentAdmissionSession(),
                'passport' => $passportImage,
                'signature' => $signatureImage,

            ]);

            // Update Biodata Status
            DB::table('usersbiodata')->where('user_id', session('userid'))
                ->update(['status' => 1]);

            DB::table('users')->where('id', session('userid'))
                ->update(['applicant_type' => $req['admission-type']]);

            // Insert Sponsor Information
            DB::table('sponsors')->insert([
                'user_id' => session('userid'),
                'sponsor_surname' => $req->sponsor_surname,
                'sponsor_othername' => $req->sponsor_othername,
                'sponsors_phone' => $req->sponsor_phone,
                'sponsors_email' => $req->sponsor_email,
                'sponsors_address' => $req->sponsor_address,

            ]);

            // Insert Academic Record
            DB::table('academic_record')->insert([
                'user_id' => session('userid'),
                'admission_type' => $req['admission-type'],
                'course_program' => $req->course_program,
                'school_attended' => $req->school_attended,
                'certificates_obtained' => $req->certificates_obtained,
                'pr_topic' => $req->pr_topic,
            ]);

            // Handle File Uploads
            $certImage = $this->handleFileUpload($req->file('cert'));
            $olevel1Image = $this->handleFileUpload($req->file('olevel1'));
            $olevel2Image = $this->handleFileUpload($req->file('olevel2'));

            // Insert Uploads
            DB::table('uploads')->insert([
                'user_id' => session('userid'),
                'cert' => $certImage,
                'olevel1' => $olevel1Image,
                'olevel2' => $olevel2Image,
                'olevel_awaiting' => $req->olevel_awaiting,
            ]);

            DB::commit();

            $signUpMsg = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Your have sucessfully submitted your information</div>';
            return redirect('/admission')->with('signUpMsg', $signUpMsg);
        } catch (\Exception $e) {
            DB::rollBack();

            // Log the error message for debugging purposes
            \Log::error('Error saving biodata: ' . $e->getMessage());

            $errorMessage = $e instanceof \Illuminate\Database\QueryException  && $e->errorInfo[1] == 1062
            ? 'You cannot fill the form again.'
            : 'Please try again later or contact support.';

            // Add the exception message to the displayed error for debugging (only in development)
            $exceptionMessage = config('app.debug') ? ' Debug Info: ' . $e->getMessage() : '';

            $signUpMsg = '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Error!</strong> ' . $errorMessage . $exceptionMessage . '
                  </div>';
            return redirect('/home')->with('signUpMsg', $signUpMsg);
        }
    }

/**
 * Handle file upload and return base64 encoded string.
 */
    private function handleFileUpload($file)
    {
        if ($file) {
            $image = Image::make($file)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            return base64_encode($image->encode()->encoded);
        }
        return null;
    }

    public function viewprofile()
    {
        // Fetch the user's type directly from the database
        $userType = DB::table('users')
            ->where('id', session('userid'))
            ->value('applicant_type'); // Assuming 'applicant_type' is the column for user type

        $applicantsDetails = "";

        if (in_array($userType, ['Diploma', 'Licentiate', 'Certificate'])) {
            $applicantsDetails = DB::table('users')
                ->where('users.applicant_type', $userType) // Use the fetched user type
                ->where('users.id', session('userid'))
                ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->leftJoin('academic_record', 'academic_record.user_id', '=', 'users.id')
                ->leftJoin('sponsors', 'sponsors.user_id', '=', 'users.id')
                ->leftJoin('uploads', 'uploads.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.*', 'sponsors.*', 'academic_record.*', 'uploads.*')
                ->first();

            return view('admissions./viewprofile', compact('applicantsDetails'));
        }

        // Optionally handle cases where userType is not one of the allowed values
        return redirect()->back()->with('error', 'Invalid user type.');
    }

    public function editprofile()
    {
        // Fetch the user's type directly from the database
        $userType = DB::table('users')
            ->where('id', session('userid'))
            ->value('applicant_type'); // Assuming 'applicant_type' is the column for user type

        $applicantsDetails = "";

        if (in_array($userType, ['Diploma', 'Licentiate', 'Certificate'])) {
            $applicantsDetails = DB::table('users')
                ->where('users.applicant_type', $userType) // Use the fetched user type
                ->where('users.id', session('userid'))
                ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->leftJoin('academic_record', 'academic_record.user_id', '=', 'users.id')
                ->leftJoin('sponsors', 'sponsors.user_id', '=', 'users.id')

                ->leftJoin('uploads', 'uploads.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.*', 'sponsors.*', 'academic_record.*', 'uploads.*')
                ->first();

            return view('admissions./editprofile', compact('applicantsDetails'));
        }

        // Optionally handle cases where userType is not one of the allowed values
        return redirect()->back()->with('error', 'Invalid user type.');
    }

}
