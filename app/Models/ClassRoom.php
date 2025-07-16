<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'section']; //bb

    public function subjects(){
        return $this->belongsToMany(Subject::class,'class_room_subject');
    }
}
