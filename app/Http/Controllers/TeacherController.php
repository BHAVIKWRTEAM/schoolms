<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
    public function dashboard(){
        return view('dashboard.teacher');
    }

    public function index(){
        $teachers = \App\Models\Teacher::latest()->get();
        return view('teachers.index',compact('teachers'));
    }

  


}
