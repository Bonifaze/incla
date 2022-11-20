<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:staff');
    }

    public function getCourseRegistrationDates(){

    }
}// end SettingsController
