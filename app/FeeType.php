<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeeType extends Model
{
    //
    //delivery_code

    public function remitas()
    {
        return $this->hasMany('App\Remita');
    }
    public function paidRemitas()
    {
        return $this->hasMany('App\Remita')->where('status_code',1);
    }

    public function getFeesAttribute()
    {
        return $this->name." (N".number_format($this->amount).")";
    }

    public function deliveryAttribute()
    {
        $code = $this->delivery_code;
        if($code == 1)
        {
            $delivery = "All Students";
        }
        else if($code == 2)
        {
            $delivery = "Science Students";
        }
        else if($code == 3)
        {
            $delivery = "Non-Science Students";
        }
        else
        {
            $delivery = "Special Students";
        }
        return $delivery;
    }

    public function genderAttribute()
    {
        $code = $this->gender_code;
        if($code == 1)
        {
            $gender = "All Students";
        }
        else if($code == 2)
        {
            $gender = "Male Students";
        }
        else if($code == 3)
        {
            $gender = "Female Students";
        }
        else
        {
            $gender = "Any";
        }
        return $gender;
    }

    public function paid(){
        $paid = Remita::where('fee_type_id',$this->id)->where('status_code',1)->get();
        return $paid->sum('amount');
    }
} //end Class
