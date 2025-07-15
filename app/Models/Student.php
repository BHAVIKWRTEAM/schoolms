<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
    'first_name',
    'last_name',
    'email',
    'phone',
    'gender',
    'dob',
    'class_id',
    'roll_no',
    'address',
    'city',
    'state',
    'zip_code',
    'photo',
];

public function classRoom(){
    return $this->belongsTo(ClassRoom::class,'class_id');
}
}

