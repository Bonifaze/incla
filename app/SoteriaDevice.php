<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoteriaDevice extends Model
{
    //
    public function setMacAddressAttribute($value) {
        $this->attributes['mac_address'] = strtolower($value);
    }

    public function setFullNameAttribute($value) {
        $this->attributes['full_name'] = ucwords(strtolower($value));
    }
    public function validMac($mac_address)
 {
     return preg_match(
         "/^([0-9A-Fa-f]{2}[:]){5}([0-9A-Fa-f]{2})$/", $mac_address
     );
 }

 public function userType()
 {
     if($this->user_type_id == 1)
     {
         return "Student";
     }
     else if($this->user_type_id == 2)
     {
         return "Staff";
     }
     else if($this->user_type_id == 3)
     {
         return "Official";
     }
     else if($this->user_type_id == 1)
     {
         return "Guest";
     }
     else
     {
         return "Unknown";
     }
 }

 public function getIP($group_id)
 {
     $range = $this->groupRange($group_id);
     $devices = self::where('group_id',$group_id)->orderBy('ip_address','DESC')->get();
     if($devices->first() == NULL)
     {
         $next = $range['start'];
     }
     else
     {
         $next = $devices->first()->ip_address + 1;
     }
     if(fmod($next,256) == 0)
     {
         $next = $next +1;
     }
     if($next > $range['stop'])
     {
         return redirect()->route('soteria.home')
             ->with('error', 'Maximum devices for this group reached. <br />');
     }
     else{
         return $next;
     }

 }

 public function groupRange($group_id)
 {
     $range = array();
     if($group_id == 1)
     {
         //students
         //10.10.9.1 - 10.10.14.254
         $range['start'] = 168429825;
         $range['stop'] = 168431358;
     }
     else if($group_id == 2)
     {
         //staff
         //10.10.6.1 - 10.10.7.254
         $range['start'] = 168429057;
         $range['stop'] = 168429566;
     }
     else if($group_id == 3)
     {
         //official
         //10.10.5.1 - 10.10.5.254
         $range['start'] = 168428801;
         $range['stop'] = 168429054;
     }
     else
     {
         //guest and others
         //10.10.15.1 - 10.10.15.254
         $range['start'] = 168431361;
         $range['stop'] = 168431614;
     }

     return $range;
 }
}// end Class
