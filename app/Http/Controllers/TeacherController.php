<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    //
    public function dashboard()
    {
        return view('dashboard.teacher');
    }

    public function index()
    {
        $teachers = Teacher::with('subjects')->get();
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('teachers.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|unique:teachers,email',
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|in:Male,Female,Other',
            'dob' => 'nullable|date',
            'qualification' => 'nullable|string|max:100',
            'experience' => 'nullable|string|max:100',
            'bio' => 'nullable|string|max:500',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'zip_code' => 'nullable|string|max:20',
            'photo' => 'nullable|image|max:2048', // 2MB max


            'subjects' => 'nullable|array',
            'subjects.*' => 'exists:subjects,id',
        ]);
        // 1️⃣ Create login user for teacher

        $user = User::create([
            'name' => $formFields['first_name'] . ' ' . $formFields['last_name'],
            'email' => $formFields['email'],
            'password' => Hash::make('Teacher@123'),
        ]);

        $user->assignRole('Teacher');

        // 2️⃣ Handle image upload
        if ($request->hasFile('photo')) {
            $filename = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/teachers'), $filename);
            $formFields['photo'] = $filename;
        }

        // 3️⃣ Link teacher to user
        $formFields['user_id'] = $user->id;

        // 4️⃣ Save teacher
        $teacher = Teacher::create($formFields);

        if (!empty($formFields['subjects'])) {
            $teacher->subjects()->attach($formFields['subjects']);
        }


        return redirect()->route('teachers.index')->with('success', 'Teacher added successfully');
    }

    public function edit($id)
    {
        $teacher = Teacher::findorfail($id);
        $subjects = Subject::all();
        return view('teachers.edit', compact('teacher', 'subjects'));
    }

    public function update(Request $request,Teacher $teacher){
        $formFields = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|in:Male,Female,Other',
            'dob' => 'nullable|date',
            'qualification' => 'nullable|string|max:100',
            'experience' => 'nullable|string|max:100',
            'bio' => 'nullable|string|max:500',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'zip_code' => 'nullable|string|max:20',
            'photo' => 'nullable|image|max:2048', // 2MB max


            'subjects' => 'nullable|array',
            'subjects.*' => 'exists:subjects,id',
        ]);

        if ($request->hasFile('photo')) {
            $filename = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/teachers'), $filename);
            $formFields['photo'] = $filename;
        }

             // Always sync subjects
            $teacher->subjects()->sync($formFields['subjects']?? []);
        

        $teacher->update($formFields);
        return redirect()->route('teachers.index')->with('success','Details updated successfully');
    }

    public function show(Teacher $teacher){
        $teacher->load('subjects');
        return view('teachers.show',compact('teacher'));
    }

    public function destroy(Teacher $teacher){
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success','Teacher deleted successfully');
    }



}
