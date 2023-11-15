<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
class StaffWorkProfile extends Model implements Auditable
{
    //
    use \OwenIt\Auditing\Auditable;
    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }

    public function position()
    {
        return $this->belongsTo('App\StaffPosition', 'staff_position_id');
    }

    public function type()
    {
        return $this->belongsTo('App\StaffType', 'staff_type_id');
    }

    public function admin()
    {
        return $this->belongsTo('App\AdminDepartment', 'admin_department_id');
    }

    public function employmentType()
    {
        return $this->belongsTo('App\EmploymentType', 'employment_type_id');
    }


} // end Class
