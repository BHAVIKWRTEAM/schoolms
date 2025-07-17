<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    //bb
    // show all students

    public function index(Request $request,)
    {

        $query = Student::query();
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }



        // $students = Student::all();
        // $students = Student::with('classRoom')->paginate(4);
        $students = $query->with('classRoom')->latest()->paginate(3);
        return view('students.index', compact('students'));
    }

    // show form to create new student
    public function create()
    {
        $classRooms = ClassRoom::all();
        return view('students.create', compact('classRooms'));
    }

    // save students to database
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|unique:students,email',
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|in:Male,Female,Other',
            'dob' => 'nullable|date',
            'class_id' => 'required|exists:class_rooms,id',


            'roll_no'    => [
                'required',
                Rule::unique('students')->where(function ($query) use ($request) {
                    return $query->where('class_id', $request->class_id);
                }),
            ],


            // 'roll_no' => 'required|string|max:50',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'zip_code' => 'nullable|string|max:20',
            'photo' => 'nullable|image|max:2048', // max 2MB

        ]);

        // 1️⃣ Create a user for this student
        $password = 'Student@123';; // or use a default password
        $user = User::create([
            'name' => $formFields['first_name'] . ' ' . $formFields['last_name'],
            'email' => $formFields['email'],
            'password' => Hash::make($password),
        ]);
        $user->assignRole('Student');



        // handle image upload if provided
        if ($request->hasFile('photo')) {
            $filename = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/students'), $filename);
            $formFields['photo'] = $filename;
        }

        // 3️⃣ Link the user_id
        $formFields['user_id'] = $user->id;


        Student::create($formFields);
        return redirect()->route('students.index')->with('success', 'Student Added Successfully');
    }

    // show single listing

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    // edit student form
    public function edit(Student $student)
    {
        $classRooms = ClassRoom::all();
        return view('students.edit', compact('student', 'classRooms'));
    }

    // save updated student
    public function update(Request $request, Student $student)
    {
        $formFields = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|in:Male,Female,Other',
            'dob' => 'nullable|date',
            'class_id' => 'required|exists:class_rooms,id',
            'roll_no' => 'required|string|max:50',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'zip_code' => 'nullable|string|max:20',
            'photo' => 'nullable|image|max:2048', // max 2MB
        ]);

          // handle image upload if provided
        if ($request->hasFile('photo')) {
            $filename = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/students'), $filename);
            $formFields['photo'] = $filename;
        }

        $student->update($formFields);
        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    // delete student
    public function destroy(Student $student)
    {

        if ($student->photo && file_exists(public_path('uploads/students/' . $student->photo))) {
            unlink(public_path('uploads/students/' . $student->photo));
        }

        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted Succesfully');
    }

    public function dashboard()
    {
        $student = Student::where('user_id', auth()->id())->first();
        return view('dashboard.student', compact('student'));
    }
}
