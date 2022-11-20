<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    //returns course registration end date
    public function endDate(){
        $end_date = \Carbon\Carbon::create('2022-8-29')->format('Y-m-d');
        return $end_date;
    }
    public function levels(){
        return [100,200,300,400,500,600,700,800,900];
    }

    public function staffSemester(){
        return 1;
    }

    public function staffSession(){
        return 1;
    }

    public function studentSemester(){
        return 2;
    }
    public function studentSession(){
        return 2;
    }

    //returns course registration start date

    //returns list of active course registration levels

    //returns minimum balance for course registration or result view

    //returns course registration for transfer students

    //returns course registration for DE students

    // returns program exempted from course registration deadlines

    //reset course registration settings

    //black list students from course registration

    //white lists students from course registration

    //returns courses that that minimum of specified number of courses for available levels



}// end settings class
