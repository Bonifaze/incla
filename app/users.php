<?php

// namespace App\Models;
namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
    public function getFullNameAttribute()
    {
        return "{$this->first_name}  {$this->surname}";
    }
}
