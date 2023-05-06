<?php

namespace App\Http\Controllers;

use PDF;
use Mail;
use Exception;
use App\Course;
use App\Remita;
use App\FeeType;
use App\Session;
use App\Student;
use Carbon\Carbon;
use App\StudentDebt;
use Remita\HTTPUtil;
use App\ProgramCourse;
use App\StudentResult;
use App\Models\Remitas;
use App\StudentAcademic;
use App\Models\fee_types;
use Illuminate\Http\Request;
use App\SemesterRegistration;
use App\Mail\ExceptionOccured;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Remita\TestRRRGeneratorAndStatus;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\Debug\ExceptionHandler as SymfonyExceptionHandler;

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

    public function feespayment()
    {
        // $payment = DB::table('students')->where('id', session('userid'))->get();
        $payment = Auth::guard('student')->user();
            // ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')->get();

        $fee_types = fee_types::orderBy('status', 'ASC')
        ->where('status', 1)
        ->where('category', '>', '2')
        // ->where('category', 3)
        ->get();
        $fee_typess = fee_types::orderBy('status', 'ASC')
        ->where('status', 1)
        ->where('category',4)
        ->get();

        return view('students.RemitaPayment', compact('payment'),['fee_types' => $fee_types, 'fee_typess' => $fee_typess]);
    }

//To INSERT THE GENERATE RRR INTO THE DB
   public function payremi(Request $req)
    {
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
                'request_ip' => $_SERVER['REMOTE_ADDR']
            ]);
            // DB::table('usersbiodata')->where('user_id', session('userid'))->update([
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
                    'updated_at' => Carbon::now()

                ]);
            $json = array('success' => true, 'route' => '/students/remita/paymentview/', 'id' => Auth::guard('student')->user()->id);
            $jsonstring = json_encode($json, JSON_HEX_TAG);
            echo $jsonstring;
        } catch (QueryException $e) {
            $statusMsg = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> RRR  Logged successfuly, please contact ICT ' . $e->getMessage() . "###" . $req->rrr . '</div>';

            $json = array('success' => false, 'route' => '/students/remita/feestype', 'msg' => $statusMsg);
            $jsonstring = json_encode($json, JSON_HEX_TAG);
            echo $jsonstring;
            // return redirect('/newPayment/')->with('mgs',$statusMsg);
        }
    }


    public function viewpayment($id)
    {

        $viewpayment = DB::table('remitas')->where('student_id', Auth::guard('student')->user()->id)
            ->orderBy('status_code', 'ASC')->orderBy('created_at', 'DESC')
            ->get();

            $verifyResponse = $this->verifyRRRALL();
            return view('students.paymentview', compact('viewpayment', 'verifyResponse'));
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
                $update = "RRR ". $remita->rrr." payment verified.";
            } else {
                $remita->status_code = "025";
                $remita->status = "Payment Reference generated";
                $update = "RRR ".$remita->rrr." Pending or NOT PAID.";
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
        if($response->status == "00")
        {
            //  dd($response);

           $remita->status_code = "01";
           $remita->status = "Payment Successful";
           $update = "RRR ". $remita->rrr." payment verified.";
        }
        else
        {
            // dd($response);
            $remita->status_code = "025";
            $remita->status = "Payment Reference generatedd";
            // dd($response);
            //verify transaction time and transaction date
            $update = "RRR ".$remita->rrr." Payment pending or NOT PAID.";
        }
        try{
            $remita->save();
            //  dd($remita);
            return redirect()->back()
                ->with('success',$update);
        }
        catch (\Exception $e)
        {
            // $error = "Error Verifying RRR. Please contact ICT.".$e->getMessage();
            $error = "Error Verifying RRR. Please contact ICT.";
            return redirect()->back()
                ->with('error',$error);

        }

    }// end verifyRRR

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
   $remitas = Remita::where('rrr',$request->RRR)->where('order_id',$request->orderID)->get();
    if($remitas->count() > 0)
    {
        $remita = $remitas->first();

        $response = $remita->verifyRRR();
        dd($response);
        if($response->status == "01")
        {
            $remita->status_code = $response->status;
            dd($response->status);
            $update = $remita->rrr." payment verified.";
        }
        else
        {
            $remita->status_code = $response->status;
            //verify transaction time and transaction date
            $update = $remita->rrr." pending payment.";
        }
        try{
            $remita->save();
            return redirect()->route('students.paymentview')
                ->with('update',$update);
        }
        catch (\Exception $e)
        {
            $error = "Error saving Remita information. Please contact ICT.".$e->getMessage();
            return redirect()->route('students.paymentview')
                ->with('error',$error);
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

    public function remitaPrint($id){
        //get instance
        $remita = Remita::find($id);

        //verify remita
        if($remita){
            $response = $remita->verifyRRR();

        if($response->status == 1) {
            $student = $remita->student;
            $academic = $student->academic;
            $feeType = $remita->feeType;
            return view('students.remita-print',compact('student','remita','academic','feeType'));
        }
        else {
            $error = "Requested Remita payment details not found. Please contact Support on .".'app.REMITA_EMAIL';
            return redirect()->route('student.remita')
                ->with('error',$error);
        }
        }
        else {
            $error = "Requested Remita record not found. Please contact Support on .".'app.REMITA_EMAIL';
            return redirect()->route('student.remita')
                ->with('error',$error);
        }

    }

} // end Class


