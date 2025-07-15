<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginRedirectController extends Controller
{
    //bb
    public function redirect(Request $request){
        $user = Auth::user();

        if($user->hasRole('Admin')){
            return redirect()->route('admin.dashboard');
        }
        if($user->hasRole('Student')){
            return redirect()->route('student.dashboard');
        }
        if($user->hasRole('Teacher')){
            return redirect()->route('teacher.dashboard');
        }
    }
}

// Auto-Redirect to Correct Dashboard After Login