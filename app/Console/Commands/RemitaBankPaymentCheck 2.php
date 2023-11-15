<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class RemitaBankPaymentCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remita:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for Remita bank payments';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $remitas = DB::table('remitas')->where('status_code', '=', '025')->get();

        foreach ($remitas as $remita) {
            // Use the Remita payment API to check for payment
            // $apiKey = config('app.REMITA_API_KEY');
            // $merchantId = config('app.REMITA_MERCHANT_ID');
            $apiKey = "1946";
            $merchantId = "2547916";
            $apiHash = hash('sha512', $remita->rrr . $apiKey . $merchantId);

            $url = str_replace(['{{rrr}}', '{{apiHash}}'], [$remita->rrr, $apiHash], 'https://remitademo.net/remita/exapp/api/v1/send/api/2547916/{{rrr}}/{{apiHash}}/status.reg');
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    "Authorization: remitaConsumerKey=2547916,remitaConsumerToken=$apiHash"
                ),
            ));

            $response = curl_exec($curl);
            $decodedResponse = json_decode($response);

            curl_close($curl);
            return view('remitas.remitaBankResponse', ['remitas' => $decodedResponse]);

            // if ($decodedResponse->status == '01') {
            //     // Update the status code to 01 in the database
            //     DB::table('remitas')->where('id', $remita->id)->update(['status_code' => '01']);
            // }
        }
    }
}
