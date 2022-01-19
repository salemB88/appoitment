<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class doctor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['firstName', 'lastName', 'email', 'phone', 'gender', 'description'];

    public function daysWorks()
    {
        return $this->hasMany(daysWork::class);
    }

    public function departments()
    {
        return $this->belongsToMany(department::class, 'doctor_departments');
    }
}
