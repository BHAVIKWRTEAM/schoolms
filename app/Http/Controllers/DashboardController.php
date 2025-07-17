<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function teacherDashboard()
    {
        $teacher = Auth::user()->teacher; // Assuming User hasOne Teacher
        return view('dashboard.teacher', compact('teacher'));
    }
}
