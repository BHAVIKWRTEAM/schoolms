<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
     public function index()
    {
       
        return view('welcome');
    }


    public function teacherDashboard()
    {
        $teacher = Auth::user()->teacher; // Assuming User hasOne Teacher
        return view('dashboard.teacher', compact('teacher'));
    }

    // public function studentDashboard()
    // {
    //     $student = Auth::user()->student; // Assuming User hasOne Teacher
    //     return view('dashboard.student', compact('student'));
    // }

    // public function adminDashboard()
    // {
    //     $teacher = Auth::user()->admin; // Assuming User hasOne Teacher
    //     return view('dashboard.admin', compact('admin'));
    // }
}
