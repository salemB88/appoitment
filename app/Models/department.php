<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class department extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'description'];


    public function doctors()
    {
        return $this->belongsToMany(doctor::class, 'doctor_departments');
    }
}
