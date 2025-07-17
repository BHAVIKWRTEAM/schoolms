<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        // Basic Info
        'first_name',
        'last_name',
        'email',
        'phone',

        // Personal Info
        'gender',
        'dob',

        // Professional Info
        'qualification',
        'experience',
        'bio',

        // Address
        'address',
        'city',
        'state',
        'zip_code',

        // Profile Photo
        'photo',

        // Linked user
        'user_id',
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class,'subject_teacher');
    }
}
