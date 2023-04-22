<?php

use App\Remita;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerifyRemitaBankController extends Controller
{
    public function index()
    {
        $remitas = Remita::orderBy('created_at', 'DESC')->orderBy('student_id', 'ASC')->where('status_code', '025')->paginate(50);
        return view('payments', compact('remitas'));
    }
}
