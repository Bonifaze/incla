<?php

// namespace App\Models;
namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;

    public function setFirstNameAttribute($value) {
        $this->attributes['first_name'] = ucwords(strtolower($value));
    }

    public function setMiddleNameAttribute($value) {
        $this->attributes['middle_name'] = ucwords(strtolower($value));
    }

    public function setSurnameAttribute($value) {
        $this->attributes['surname'] = ucwords(strtoupper($value));
    }

    public function setEmailAttribute($value) {
        $this->attributes['email'] = strtolower($value);
    }
    public function getFullNameAttribute()
    {
        return "{$this->surname} {$this->first_name} {$this->middle_name}  ";
    }
}
