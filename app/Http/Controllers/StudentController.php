<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //bb
    // show all students

    public function index(){
        $students = Student::all();
        return view('students.index',compact(('students')));
    }

    // show form to create new student
    public function create(){
        return view('students.create');
    }

    // save students to database
    public function store(Request $request){
        $formFields = $request->validate([
        'first_name' => 'required|string|max:50',
        'last_name' => 'required|string|max:50',
        'email' => 'required|email|unique:students,email',
        'phone' => 'nullable|string|max:20',
        'gender' => 'nullable|in:Male,Female,Other',
        'dob' => 'nullable|date',
        'class_id' => 'required|exists:classes,id',
        'roll_no' => 'required|string|max:50',
        'address' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:100',
        'state' => 'nullable|string|max:100',
        'zip_code' => 'nullable|string|max:20',
        'photo' => 'nullable|image|max:2048', // max 2MB

        ]);

        Student::create($formFields);
        return redirect()->route('students.index')->with('success','Student Added Successfully');

    }

    // show single listing

    public function show(Student $student){
        return view('students.show',compact('student'));
    }

    // edit student form
    public function edit(Student $student){
        return view('students.edit',compact('student'));
    }

    // save updated student
    public function update(Request $request, Student $student){
           $formFields = $request->validate([
        'first_name' => 'required|string|max:50',
        'last_name' => 'required|string|max:50',
        'email' => 'required|email|unique:students,email',
        'phone' => 'nullable|string|max:20',
        'gender' => 'nullable|in:Male,Female,Other',
        'dob' => 'nullable|date',
        'class_id' => 'required|exists:classes,id',
        'roll_no' => 'required|string|max:50',
        'address' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:100',
        'state' => 'nullable|string|max:100',
        'zip_code' => 'nullable|string|max:20',
        'photo' => 'nullable|image|max:2048', // max 2MB
        ]);

        $student->update($formFields);
        return redirect()->route('students.index')->with('success','Student updated successfully');
    }

    // delete student
    public function destroy(Student $student){
        $student->delete();
        return redirect()->route('students.index')->with('success','Student deleted Succesfully');
    }

}
