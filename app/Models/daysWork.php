<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class daysWork extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['day','time_start','time_end','spend_time','doctor_id'];


    public function doctor(){
        return $this->belongsTo(doctor::class);
    }
}
