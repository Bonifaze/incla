<?php

namespace App\Http\Controllers;

use App\FeeType;
use App\Models\CourseRegistrations;
use App\Models\fee_types;
use App\Models\Remitas;
use App\Remita;
use App\Student;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentPaymentsController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:student');
    }
     private function getcurrentsession(){
        $session = DB::table('bursary_sessions')->where('status', 1)
        ->select ('bursary_sessions.id')->first();
        $ses=$session->id;
        $currentsession =$ses;
        return $currentsession;
    }
    public function feespayment()
    {
        $courseReg = CourseRegistrations::where('status', 1)->orderBy('id', 'ASC')->paginate(20);
        // $payment = DB::table('students')->where('id', session('userid'))->get();
        $payment = Auth::guard('student')->user();
        // $id=  $payment->id
        $student = Student::findOrFail($payment->id);
        // dd($student);
        $contact = $student->contact;
        $academic = $student->academic;
        if ($level = $student->academic->level < 600) {
            $gender = $payment->gender;

            $gender_code = $student->gender;


            // ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')->get();

            $fee_types = FeeType::orderBy('name', 'ASC')
            // ->select('id', 'name', 'amount', 'status', 'category', 'gender_code')
                ->where('status', 1)
                ->where('category', 3)
            // ->where('gender_code', $gender_code)

                 ->where('category', '>', 2)
                 ->whereHas('college', function ($query) use ($academic) {
                     $query->where('id', $academic->college()->id);
                 })
                ->get();

            $fee_typess = fee_types::orderBy('name', 'ASC')
                ->where('status', 1)
                ->where('category', 4)
                ->get();

            return view('students.RemitaPayment', compact('payment'), ['fee_types' => $fee_types, 'fee_typess' => $fee_typess, 'courseReg' => $courseReg]);
        }else{
            $fee_types = fee_types::orderBy('name', 'ASC')
            ->where('status', 1)
            ->where('category', 5)
            ->get();

            $fee_typess = fee_types::orderBy('name', 'ASC')
            ->where('status', 1)
            ->where('category', 4)
            ->get();

        return view('students.RemitaPayment', compact('payment'), ['fee_types' => $fee_types, 'fee_typess' => $fee_typess, 'courseReg' => $courseReg]);
        }
    }

    public function Otherfees()
    {
        $courseReg = CourseRegistrations::where('status', 1)->orderBy('id', 'ASC')->paginate(20);
        $payment = Auth::guard('student')->user();
        $fee_typess = fee_types::orderBy('name', 'ASC')
            ->where('status', 1)
            ->where('category', 4)
            ->get();
        return view('students.RemitaPaymentOtherfee', compact('payment'), ['fee_typess' => $fee_typess, 'courseReg' => $courseReg]);
    }

    public function payremi(Request $req)
    {
        $student_id = Auth::guard('student')->user()->id;

        // Count the number of unpaid RRRs with status code 025 for the student
        $unpaid_rrr_count = DB::table('remitas')
            ->where('student_id', $student_id)
            ->where('status_code', '025')
            ->count();

        // if ($unpaid_rrr_count >= 5) {
               if ($unpaid_rrr_count >= 5) {
            // The student has already created 5 or more unpaid RRRs, so don't insert a new RRR
            // $json = array('success' => false, 'route' => '/students/remita/feestype', 'msg' => 'You have reached the maximum number of unpaid Generated RRRs, Please pay your outstanding RRR before generating a new RRR. Visit ICT Unit or Bursary .');
            $json = array('success' => false, 'route' => '/students/remita/feestype', 'msg' => 'You have reached the maximum number of unpaid Generated RRRs, Please pay your outstanding RRR before generating a new RRR. Go to View Remita Payment and Delete unpaid RRR .');
            $jsonstring = json_encode($json, JSON_HEX_TAG);
            echo $jsonstring;
            return;
        }
        // DB::beginTransaction();
        try {
            DB::table('remitas')->insert([
                // 'user_id' => session('userid'),
                // 'student_id' =>$req->id,
                'student_id' => Auth::guard('student')->user()->id,
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
            // DB::table('usersbiodata')->where('student_id', Auth::guard('student')->user()->id)->update([
            //     'status' => 5

            // ]);

            // //  Mail::to($req->email)->send(new Confirmsignup($mailData));
            // DB::commit();
            // $json = array('success' => true, 'route' => '/paymentview/', 'id' => session('userid'));
            $json = array('success' => true, 'route' => '/students/remita/paymentview/', 'id' => Auth::guard('student')->user()->id);
            $jsonstring = json_encode($json, JSON_HEX_TAG);
            echo $jsonstring;
            //return redirect('/paymentview/'.session('userid'));
        } catch (QueryException $e) {
            // $statusMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> RRR not generated successfuly, please try again ' . $e->getMessage() . "###" . $req->rrr . '</div>';
            $statusMsg = 'RRR not generated successfuly, please try again or contact ICT';

            $json = array('success' => false, 'route' => '/students/remita/feestype', 'msg' => $statusMsg);
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
            $json = array('success' => true, 'route' => '/students/remita/paymentview/', 'id' => Auth::guard('student')->user()->id);
            $jsonstring = json_encode($json, JSON_HEX_TAG);
            echo $jsonstring;
        } catch (QueryException $e) {
            $statusMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> RRR not generated successfuly, please try again ' . $e->getMessage() . "###" . $req->rrr . '</div>';

            $json = array('success' => false, 'route' => '/students/remita/feestype', 'msg' => $statusMsg);
            $jsonstring = json_encode($json, JSON_HEX_TAG);
            echo $jsonstring;
            // return redirect('/newPayment/')->with('mgs',$statusMsg);
        }
    }

    public function viewpayment($id)
    {
    $courseReg = CourseRegistrations::where('status', 1)->orderBy('id', 'ASC')->paginate(20);

           // $viewpayment = DB::table('remitas')->where('student_id', Auth::guard('student')->user()->id)
        //     ->orderBy('status_code', 'ASC')->orderBy('created_at', 'DESC')
        //     // ->get();
        //     ->paginate(4);

    // $viewpayment = DB::table('remitas')
    // ->where('student_id', Auth::guard('student')->user()->id)
    // ->where(function($query) {
    //     // Select remita with status_code 01
    //     $query->where('status_code', 1)
    //         ->orWhere(function($subquery) {
    //             // Select remita with status_code 025 that are not older than 30 days
    //             $subquery->where('status_code', 25)
    //                 ->where('updated_at', '>=', Carbon::now()->subDays(30)->toDateString());
    //         });
    // })
    // ->orderBy('status_code', 'ASC')
    // ->orderBy('created_at', 'DESC')
    // ->paginate(5);
      $viewpayment = DB::table('remitas')->where('student_id', Auth::guard('student')->user()->id)
            ->orderBy('status_code', 'ASC')->orderBy('created_at', 'DESC')
          ->paginate(5);

        $verifyResponse = $this->verifyRRRALL();

     //   $billing = $this->billstudent();

        // Retrieve the last data for the user
        // $lastPayment = DB::table('student_billings')
        // ->where('student_id', Auth::guard('student')->user()->id)
        // ->where('status', 1)
        // ->where('session_id', $this->getcurrentsession())
        //     ->orderBy('created_at', 'desc')
        //     ->first();
        //     $allPayment = DB::table('student_billings')
        //     ->where('student_id', Auth::guard('student')->user()->id)
        //     ->where('status', 1)
        //     ->where('session_id', $this->getcurrentsession())
        //     ->pluck('amount_paid');

        // $totalAmountPaid = $allPayment->sum();
        // $amountPaid = $lastPayment->amount_paid ?? 0;
        // $debt = $lastPayment->debt ?? 0;
        // $balance = $lastPayment ? max(0, $lastPayment->debt) : '<i class="fas fa-spinner fa-spin"></i>';

        // $totalAmountPaid = 0;
        // $amountPaid = 0;
        // $debt = 0


        // $balance = 0;
        // return view('students.paymentview', compact('viewpayment', 'verifyResponse', 'courseReg', 'totalAmountPaid', 'balance' ));

        return view('students.paymentview', compact('viewpayment', 'verifyResponse', 'courseReg',  ));
    }

    public function billstudent()
    {
        $remitas = DB::table('remitas')->where('student_id', Auth::guard('student')->user()->id)
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

                           // $signUpMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You have successfully edited the user </div>';
                           $signUpMsg='';
                            return redirect()->back()->with('signUpMsg', $signUpMsg);
                        } else {
                            // $signUpMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> The rrr already exists. </div>';
                            $signUpMsg='';
                            return redirect()->back()->with('signUpMsg', $signUpMsg);
                        }
                    } catch (QueryException $e) {
                        // $signUpMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your edit was not successful' . $e->getMessage() . ' </div>';
                        $signUpMsg='';
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
                                        ->where('student_id', $remita->student_id)
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
                                        'student_id' => $remita->student_id,
                                        'rrr' => $remita->rrr,
                                        'amount_paid' => $amountPaid,
                                        'debt' => $debt,
                                        'session_id' => $this->getcurrentsession()
                                    ];
                                }
                            }
                        }

                        if (!empty($remitasToInsert)) {
                            DB::table('student_billings')->insert($remitasToInsert);

                            // $signUpMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You have successfully edited the user </div>';
                            $signUpMsg='';
                            return redirect()->back()->with('signUpMsg', $signUpMsg);
                        } else {
                            // $signUpMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> The selected RRRs already exist or do not meet the condition. </div>';
                            $signUpMsg='';
                            return redirect()->back()->with('signUpMsg', $signUpMsg);
                        }
                    } catch (QueryException $e) {
                        //$signUpMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Your edit was not successful' . $e->getMessage() . ' </div>';
                        $signUpMsg='';
                        return redirect()->back()->with('signUpMsg', $signUpMsg);
                    }
                }

            }
        }

    }

    public function verifyRRRALL()
    {
        $remitas = Remitas::where('student_id', Auth::guard('student')->user()->id)
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

    public function receipt($rrr)
    {
        $receipt = DB::table('remitas')->where('rrr', $rrr)
            ->leftJoin('students', 'remitas.student_id', '=', 'students.id')
            ->select('remitas.*', 'students.surname', 'students.first_name', 'students.middle_name', 'students.gender', 'students.email', 'students.phone', )
        // ->leftjoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
            ->first();
        return view('students.receipt', compact('receipt'));
    }

    // public function remita()
    // {
    //  $student = Auth::guard('student')->user();
    //  //enable for a particular student for testing
    //     /*
    //  if($student->id != 4127)
    //     {
    //         return redirect()->route('student.home')
    //             ->with('error',"Remita payment will go live soon. Kindly check back later.");
    //     }
    //  */
    //  $remitas = $student->remitas;
    //     $unpaid = $student->remitas->where('status_code','>',1)->count();
    //  return view('students.remita',compact('student','remitas','unpaid'));
    // }

    // public function generateRRR()
    // {
    //     $student = Auth::guard('student')->user();
    //     $feeTypes = FeeType::where('status',1)->get()->pluck('fees','id');
    //     $unpaid = $student->remitas->where('status_code','>',1)->count();
    //     if($unpaid > 10)
    //     {
    //         return redirect()->route('student.home')
    //             ->with('error',"you have too many unpaid reference numbers. Visit ICT department");
    //     }
    //     return view('students.generate_rrr',compact('student','feeTypes'));
    // }

    // public function rrrGeneration(Request $request)
    // {
    //     $this->validate($request, [
    //         'fee_type_id' => 'required|integer',
    //         'student_id' => 'required|integer',
    //     ]);
    //     $feeType = FeeType::findOrFail($request->fee_type_id);
    //     $student = Student::findOrFail($request->student_id);
    //     $data = collect();
    //    //initialize variables
    //     $data->serviceTypeId = $feeType->provider_code;
    //     $data->amount = $feeType->amount;
    //     $data->payerName = $student->full_name;
    //     $data->payerEmail = $student->email;
    //     $data->payerPhone = $student->phone;
    //     $data->description = $feeType->name;
    //     $data->orderId = round(microtime(true) * 1000);

    //     $customField = collect();
    //     $customField->name = "Student ID";
    //     $customField->value = $student->id;
    //     $customField->type = "ALL";

    //     $remita = new Remita();
    //     $response = $remita->generateRRR($data,$customField);
    //     if($response->statuscode == "025")
    //     {
    //         //save rrr and return
    //         $remita->student_id = $student->id;
    //         $remita->rrr = $response->RRR;
    //         $remita->order_id = $data->orderId;
    //         $remita->fee_type_id = $feeType->id;
    //         $remita->service_type_id = $data->serviceTypeId;
    //         $remita->amount = $data->amount;
    //         $remita->status_code = $response->statuscode;

    //         try{
    //            $remita->save();
    //                return redirect()->route('student.remita')
    //                    ->with('update',"Generated RRR: ".$response->RRR);
    //         }
    //         catch (\Exception $e)
    //         {
    //             return redirect()->route('student.remita')
    //                 ->with('error',"Error saving Remita information. Please contact ICT.".$e->getMessage());
    //         }
    //     }
    //     else
    //     {
    //         //return with error
    //         return redirect()->route('student.remita')
    //             ->with('error',"Error from remita server generating RRR");
    //     }

    // }// end rrrGeneration

    public function verifyRRR(Request $request)
    {

        $this->validate($request, [
            'remita_id' => 'required|integer',
        ]);
        $remita = Remitas::findOrFail($request->remita_id);
        // dd($remita);
        // $remita =DB::table('remitas')->where('rrr', $request->rrr)->get();
        $response = $remita->verifyRRR();
        if ($response->status == "00") {
            //  dd($response);

            $remita->status_code = "01";
            $remita->status = "Payment Successful";
            $update = "RRR " . $remita->rrr . " payment verified.";
        } else {
            // dd($response);
            $remita->status_code = "025";
            $remita->status = "Payment Reference generated";
            // dd($response);
            //verify transaction time and transaction date
            $update = "RRR " . $remita->rrr . " Payment pending or NOT PAID.";
        }
        try {
            $remita->save();
            //  dd($remita);
            return redirect()->back()
                ->with('success', $update);
        } catch (\Exception $e) {
            // $error = "Error Verifying RRR. Please contact ICT.".$e->getMessage();
            $error = "Error Verifying RRR. Please contact ICT.";
            return redirect()->back()
                ->with('error', $error);

        }

    } // end verifyRRR

    // public function pay2(Request $request)
    // {
    //     $this->validate($request, [
    //         'remita_id' => 'required|integer',
    //     ]);

    //     $remita = Remita::findOrFail($request->remita_id);
    //     return view('students.remita_pay',compact('remita'));

    // }// end pay

    // public function pay(Request $request)
    // {
    //     //

    // }// makePay

//public function paymentResponse($rrr,$orderId)
    public function paymentResponse(Request $request)
    {
        $sample = "https://yourwebsite.com/response.php?RRR=300008248091&orderID=1633889789819";
        $status = "https://remitademo.net/remita/exapp/api/v1/send/api/echannelsvc/{{merchantId}}/{{orderId}}/{{apiHash}}/orderstatus.reg";
        $this->validate($request, [
            'RRR' => 'required|numeric',
            'orderID' => 'required|numeric',
        ]);
        $remitas = Remita::where('rrr', $request->RRR)->where('order_id', $request->orderID)->get();
        if ($remitas->count() > 0) {
            $remita = $remitas->first();

            $response = $remita->verifyRRR();
            dd($response);
            if ($response->status == "01") {
                $remita->status_code = $response->status;
                dd($response->status);
                $update = $remita->rrr . " payment verified.";
            } else {
                $remita->status_code = $response->status;
                //verify transaction time and transaction date
                $update = $remita->rrr . " pending payment.";
            }
            try {
                $remita->save();
                return redirect()->route('students.paymentview')
                    ->with('update', $update);
            } catch (\Exception $e) {
                $error = "Error saving Remita information. Please contact ICT." . $e->getMessage();
                return redirect()->route('students.paymentview')
                    ->with('error', $error);
            }
        }
    }

    // public function paymentConfirmation(Request $request)
    // {
    //     $this->validate($request, [
    //         'fee_type_id' => 'required|integer',
    //         'student_id' => 'required|integer',
    //     ]);
    //     $student = Student::findOrFail($request->student_id);
    //     if($student->id != 4127)
    //     {
    //         return redirect()->route('student.home')
    //             ->with('error',"Remita payment will go live soon. Kindly check back later.");
    //     }
    //     $data = collect();
    //     //initialize variables
    //     $data->serviceTypeId = "4430731";
    //     $data->amount = $request->fee_type_id;
    //     $data->payerName = $student->full_name;
    //     $data->payerEmail = $student->email;
    //     $data->payerPhone = $student->phone;
    //     $data->description = "Student Fees";
    //     $data->orderId = round(microtime(true) * 1000);

    //     $customField = collect();
    //     $customField->name = "Student ID";
    //     $customField->value = $student->id;
    //     $customField->type = "ALL";

    //     $remita = new Remita();
    //     $response = $remita->generateRRR($data,$customField);
    //     if($response->statuscode == "025")
    //     {
    //         //save rrr and return
    //         $remita->student_id = $student->id;
    //         $remita->rrr = $response->RRR;
    //         $remita->order_id = $data->orderId;
    //         $remita->fee_type_id = $request->fee_type_id;
    //         $remita->service_type_id = $data->serviceTypeId;
    //         $remita->amount = $data->amount;
    //         $remita->status_code = $response->statuscode;

    //         try{
    //             $remita->save();
    //             return redirect()->route('student.remita')
    //                 ->with('update',"Generated RRR: ".$response->RRR);
    //         }
    //         catch (\Exception $e)
    //         {
    //             $error = "Error saving Remita information. Please contact ICT.".$e->getMessage();
    //             return redirect()->route('student.remita')
    //                 ->with('error',$error);
    //         }
    //     }
    //     else
    //     {
    //         //return with error
    //         return redirect()->route('student.remita')
    //             ->with('error',$response->error);
    //     }

    // }// end payementConfirmation

    // public function confirmationNotification(Request $request)
    // {

    //    $data = '{"rrr":"110002071256","channnel":"CARDPAYMENT","billerName":"SYSTEMSPECS","channel":"CARDPAYMENT","amount":200.0,"transactiondate":"2020-12-20 00:00:00", "debitdate":"2020-12-20 11:17:03", "bank":"232","branch":"","serviceTypeId":"2020978", "orderRef":"6954148807", "orderId":"6954148807", "payerName":"Test Test", "payerPhoneNumber":"07055542122",
    //    "payeremail":"test@test.com.ng", "type":"PY", "customFieldData":[{ "DESCRIPTION":"Name On Account", "PIVAL":"Test Test" },  { "DESCRIPTION":"Walletid", "PIVAL":"1234567" } ],  "parentRRRDetails":{}, "chargeFee":101.61, "paymentDescription":"SYSTEMSPECS WALLET", "integratorsEmail":"", "integratorsPhonenumber":"" }]}';

    //    //if($request->json())
    //     //{
    //         //mail response
    //         try {

    //             //Mail::to('lawrencechrisojor@gmail.com')->send(new ExceptionOccured($request->toJson()));

    //         } catch (Exception $ex) {

    //         }
    //     //}

    // }

    public function remitaPrint($id)
    {
        //get instance
        $remita = Remita::find($id);

        //verify remita
        if ($remita) {
            $response = $remita->verifyRRR();

            if ($response->status == 1) {
                $student = $remita->student;
                $academic = $student->academic;
                $feeType = $remita->feeType;
                return view('students.remita-print', compact('student', 'remita', 'academic', 'feeType'));
            } else {
                $error = "Requested Remita payment details not found. Please contact Support on ." . 'app.REMITA_EMAIL';
                return redirect()->route('student.remita')
                    ->with('error', $error);
            }
        } else {
            $error = "Requested Remita record not found. Please contact Support on ." . 'app.REMITA_EMAIL';
            return redirect()->route('student.remita')
                ->with('error', $error);
        }

    }

} // end Class
