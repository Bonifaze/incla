<?php

namespace App\Models;

use App\Staff;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StaffRoleAssignmentLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'role_id',
        'assigned_by',
        'remove_by',
        'updated_at',
        'created_at',
    ];

    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function assignedBy()
    {
        return $this->belongsTo('App\Staff','assigned_by');
    }


    public function getStaffNameAttribute()
    {
        return Staff::find($this->assigned_by)?->full_name;
    }

    public function getStaffNameremoveAttribute()
    {
        return Staff::find($this->removed_by)?->full_name;
    }


}
