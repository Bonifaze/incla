<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Remita;
use App\Student;
use Illuminate\Http\Request;

class APIController extends Controller
{
    //
    public function confirmationNotification(Request $request)
    {
       //verify all records exist

        //get record for verification
        $remitaHook = new Remita();
        $remitaHook->rrr = (int)$request[0]['rrr'];
        $remitaHook->channel = $request[0]['channel'];
        //$remitaHook->billerName = $request[0]['billerName'];
        $remitaHook->amount = (double)$request[0]['amount'];
        $remitaHook->transaction_date = $request[0]['transactiondate'];
        $remitaHook->debit_date = $request[0]['debitdate'];
        $remitaHook->bank_code = $request[0]['bank'];
        $remitaHook->branch_code = $request[0]['branch'];
        $remitaHook->service_type_id = (int)$request[0]['serviceTypeId'];
        $remitaHook->order_ref = $request[0]['orderRef'];
        $remitaHook->order_id = (int)$request[0]['orderId'];
        //$remitaHook->payer_name = $request[0]['payerName'];
        //$remitaHook->payer_phone_number = $request[0]['payerPhoneNumber'];
        //$remitaHook->payer_email = $request[0]['payerEmail'];
        // $cs = $request[0]['customFieldData'];

        $remita = new Remita();
        if($remita->hookVerification($remitaHook))
        {
            //save payment updates

            //return response
            return "Ok";
        }
        else{
            return "Not Ok";
        }
       
// code testing.
/*
        return \Response::$request->rrr;
        $student = Student::findOrFail($request[0]['rrr']);
        return \Response::json($student);

        if($request->isJson())
   {
       $data = $request[0];
       return $data['rrr'];
       $remita = new Remita();
       //find remita with same rrr, order id and student id
       //get first
       //iniate variables
       //verify payment
       //update payment status
       // mail ict
       //mail student
       //mail parent

       return $data['rrr'];

   }
        $data = '{"rrr":"110002071256","channnel":"CARDPAYMENT","billerName":"SYSTEMSPECS","channel":"CARDPAYMENT","amount":200.0,"transactiondate":"2020-12-20 00:00:00", "debitdate":"2020-12-20 11:17:03", "bank":"232","branch":"","serviceTypeId":"2020978", "orderRef":"6954148807", "orderId":"6954148807", "payerName":"Test Test", "payerPhoneNumber":"07055542122",
       "payeremail":"test@test.com.ng", "type":"PY", "customFieldData":[{ "DESCRIPTION":"Name On Account", "PIVAL":"Test Test" },  { "DESCRIPTION":"Walletid", "PIVAL":"1234567" } ],  "parentRRRDetails":{}, "chargeFee":101.61, "paymentDescription":"SYSTEMSPECS WALLET", "integratorsEmail":"", "integratorsPhonenumber":"" }]}';

*/

    }


    public function test(Request $request)
    {
        //return $request;
        $student = Student::findOrFail($request[0]['rrr']);
        return \Response::json($student);
    }


} // end Class
