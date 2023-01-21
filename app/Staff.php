<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Mail;

class Staff extends Authenticatable
{
    use Notifiable;

    protected $guard = 'staff';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'surname', 'type', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['full_name'];



    public function workProfile()
    {
        return $this->hasOne('App\StaffWorkProfile');
    }

    public function contact()
    {
        return $this->hasOne('App\StaffContact');
    }

    public function courses()
    {
        return $this->hasMany('App\ProgramCourse','lecturer_id','id');
    }




    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->middle_name} {$this->surname}";
    }

    // public function getDobAttribute()
    // {
    //     $date = $this->getOriginal('dob');
    //     //$dob = \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('d-M-Y');
    //     //return $dob;
    //     return $date;
    // }









    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_staff', 'staff_id', 'role_id')->withTimestamps();
    }

    public function permissions()
    {

        $perms = array();

        foreach ($this->roles as $role)
        {
            foreach ($role->permissions as $perm)
            {

                $perms[] = $perm;

            }
        }

        $permissions = \Illuminate\Database\Eloquent\Collection::make($perms);

        $unique = $permissions->unique();

        return $unique->values()->all();



    }

    public function hasPermission($permit)
    {

        $perms = array();

        foreach ($this->roles as $role)
        {
            foreach ($role->permissions as $perm)
            {

                $perms[] = $perm;

            }
        }


        $permissions = \Illuminate\Database\Eloquent\Collection::make($perms);



        return $permissions->contains($permit);



    }


    public function assignRole(Role $role)
    {
        return $this->roles()->save($role);
    }

    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }
        return !! $role->intersect($this->roles)->count();
    }


    public function mailer()
    {
        //
        try {
            $to_name = 'Lawrence';
            $to_email = 'lawrencechrisojor@gmail.com';
            $data = array('name'=>"Lawrence Chris", "body" => "A test mail");
            Mail::send('emails.welcome', $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject('Admission Portal Registration');
                $message->from('ict@veritas.edu.ng','ICT Unit');});
                return true;
        } catch (\Throwable $t) {
            return false;
        }
    }


    public function isAcademic()
    {
        if($this->workProfile->admin->academic)
        {
            return true;
        }
        else{
            return false;
        }
    }

} // end Class Staff
