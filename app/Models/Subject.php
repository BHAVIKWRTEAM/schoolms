<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
    'name',
    'description',
];

    public function classRooms(){
        return $this->belongsToMany(ClassRoom::class,'class_room_subject');
    }

    public function teacher(){
        return $this->belongsToMany(Teacher::class,'subject_teacher');
    }

}
