<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    class RemitaBankPaymentController extends Controller
    {
        //
        public function index()
        {
            $remitas = DB::table('remitas')
                ->where('status_code', '=', '025')
                ->paginate(25);

            return view('remitas.remitaBankVerification', ['remitas' => $remitas]);
        }
    }
