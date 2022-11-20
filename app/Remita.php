<?php

namespace App;

use Mail;
use App\Mail\RemitaWebHook;
use Illuminate\Database\Eloquent\Model;

class Remita extends Model
{
    //
    public function student()
    {
        return $this->belongsTo('App\Student', 'student_id');
    }

    public function feeType()
    {
        return $this->belongsTo('App\FeeType', 'fee_type_id');
    }


    public function users()
    {
        return $this->belongsTo('App\users', 'user_id');
    }

    public function generateRRR($data,$customField)
    {
      $apiKey = config('app.REMITA_API_KEY');
      $merchantId = config('app.REMITA_MERCHANT_ID');
      $orderId = $data->orderId;
      $hash = hash('sha512', $merchantId . $data->serviceTypeId . $orderId . $data->amount . $apiKey);
      //$url = utf8_encode('https://remitademo.net/remita/exapp/api/v1/send/api/echannelsvc/merchant/api/paymentinit');
       $url = utf8_encode('https://login.remita.net/remita/exapp/api/v1/send/api/echannelsvc/merchant/api/paymentinit');
        $jsonData = array(
          'serviceTypeId' => utf8_encode($data->serviceTypeId),
          'amount' => utf8_encode($data->amount),
          'merchantId' => $merchantId,
          'apiKey' => $apiKey,
          'orderId' => utf8_encode($orderId),
          'payerName' => $data->payerName,
          'payerEmail' => $data->payerEmail,
          'payerPhone' => $data->payerPhone,
          'description' => $data->description,
          'customField' => $customField
      );

        $headers = array(
            'Content-Type: application/json',
            'Authorization: remitaConsumerKey=' . $merchantId . ',remitaConsumerToken=' . $hash
        );
        $response = $this->postMethod($url, $headers, json_encode($jsonData));
        if($response == false)
        {
            $error =  'Connection to Remita server has failed with error #%d: %s ';
            $response = $this->formatResponse('jsonp ({"statuscode":"-1","error":"Connection to Remita server has failed. Contact ICT Unit ","status":"Remita Error"})');
            return $response;
        }
        else
        {
          return $response;
        }

    } // end generateRRR

    public function postMethod($url, $headers, $data = false)
    {
        try {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            $data2 = array($data);
            if ($data2)
                $url = sprintf("%s?%s", $url, http_build_query($data2));

            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($curl);
            curl_close($curl);
            return $this->formatResponse($result);
        }
        catch(\Exception $e) {
            $error =
                'Connection to Remita server has failed with error #%d: %s '.
                $e->getCode() . " - Message: " . $e->getMessage(). E_USER_ERROR;
            $response = json_encode('{"statuscode":"-1","error" : "$error"}');
            return $response;


            }
    }


    public function formatResponse($response)
    {
        $result = $response;
        $result = substr($result, 7);
        $newLength = strlen($result);
        $result = substr($result, 0, $newLength - 1);
        return json_decode($result);
    }

    public function verifyRRR()
    {
        $apiKey = config('app.REMITA_API_KEY');
        $merchantId = config('app.REMITA_MERCHANT_ID');
        $hash = hash('sha512', $this->rrr . $apiKey . $merchantId);
        $url = utf8_encode(config('app.REMITA_DOMAIN')."/remita/ecomm/". $merchantId . "/" . $this->rrr . "/" . $hash . "/status.reg");

        $headers = array(
            'Content-Type: application/json',
            'Authorization: remitaConsumerKey=' . $merchantId . ',remitaConsumerToken=' . $hash
        );
        $response = json_decode($this->getMethod($url, $headers));
        if($response == false)
        {
            $error =  'Connection to Remita server has failed with error #%d: %s ';
            $response = $this->formatResponse('jsonp ({"statuscode":"-1","error":"Connection to Remita server has failed. Contact ICT Unit ","status":"Remita Error"})');
            return $response;
        }
        else
        {
            return $response;
        }

    } // end verifyRRR

    public function getMethod($url, $headers)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function rrrLink()
    {
        if($this->status_code == 01)
        {
          $link  = "<a class='btn btn-success' href=route('student.remita-generate') > View Details </a>";

        }
        else
        {
            $link = "<a class='btn btn-outline-warning' href=route('student.remita-generate') > Verify Payment </a>";
        }
        return $link;
    }
    public function getStatusAttribute()
    {
        $code = $this->status_code;
           if($code == 25)
            {
                $status = "Reference Generated";
            }
            else if($code == 21)
            {
                $status = "Transaction Pending";
            }
            else if($code == 01)
            {
                $status = "Transaction Approved";
            }
            else if($code == 30)
            {
                $status = "Insufficient Balance";
            }
            else if($code == 02)
            {
                $status = "Transaction Failed";
            }
            else if($code == 00)
            {
                $status = "Transaction Completed";
            }
            else
            {
                $status = "Unknown Error";
            }
            return $status;
   }

    public function getFeesAttribute()
    {
        $fee = $this->fee_id;
        if($fee == 1)
        {
            $fees = "School Fees";
        }
        else if($fee == 2)
        {
            $fees = "Undergraduate Acceptance Fee";
        }
        else if($fee == 3)
        {
            $fees = "Late Course Registration";
        }
        else if($fee == 4)
        {
            $fees = "ID Card Replacement";
        }
        else
        {
            $fees = "Other fees";
        }
        return $fees;
    }

    public function hookVerification($hook)
    {
        //validate variables
        if(!is_int($hook->rrr))
        {
          return false;
        }
        $remita = $this->where('rrr',$hook->rrr)
            ->where('amount',$hook->amount)
            ->where('service_type_id',$hook->service_type_id)
            ->where('order_id',$hook->order_id)->first();

        if($remita !== null)
        {
            //check rrr status code shows paid
            $response = $remita->verifyRRR();
            if($response->status === "01")
            {
                //update the payment
                try{
                  $remita->channel = $hook->channel;
                  $remita->transaction_date = $hook->transaction_date;
                  $remita->debit_date = $hook->debit_date;
                  $remita->bank_code = $hook->bank_code;
                  $remita->branch_code = $hook->branch_code;
                  $remita->order_ref = $hook->order_ref;
                  $remita->request_ip = "$hook";
                  $remita->save();

                  //send email to me and ICT
                    $message = "WebHook Payment Notification for ".$hook->rrr." completed.";
                    Mail::to('lawrencechrisojor@gmail.com')->send(new RemitaWebHook($message));
                    Mail::to('ict@veritas.edu.ng')->send(new RemitaWebHook($message));
                    return true;
                }
                catch(\Exception $e) {
                    return false;
                }

            }
            else{
                return false;
            }

        }
        else{
            return false;
        }
    }

    public function bankName(){
        $code = $this->bank_code;
        $bank = "";
        switch ($code) {
            case 57:
                $bank = "Zenith Bank";
                break;
            case 44:
                $bank = "Access Bank";
                break;
            case 58:
                $bank = "Guaranty Trust Bank";
                break;
            case 23:
                $bank = "CITI Bank";
                break;
            case 63:
                $bank = "Diamond Bank";
                break;
            case 50:
                $bank = "Eco Bank Nigeria";
                break;
            case 70:
                $bank = "Fidelity Bank";
                break;
            case 11:
                $bank = "First Bank Nigeria";
                break;
            case 30:
                $bank = "Heritage Bank";
                break;
            case 301:
                $bank = "Jaiz Bank";
                break;
            case 82:
                $bank = "Keystone Bank";
                break;
            case 76:
                $bank = "Skye Bank";
                break;
            case 39:
                $bank = "Stanbic-IBTC Bank";
                break;
            case 68:
                $bank = "Standard Chartered";
                break;
            case 232:
                $bank = "Sterling Bank";
                break;
            case 32:
                $bank = "Union Bank";
                break;
            case 33:
                $bank = "United Bank for Africa";
                break;
            case 215:
                $bank = "Unity Bank";
                break;
            case 35:
                $bank = "Wema Bank";
                break;
            case 101:
                $bank = "Providous";
                break;
            case 100:
                $bank = "Suntrust";
                break;
            default:
                $bank = "Unknown";
        }
        return $bank;
    }
}  // end Class
