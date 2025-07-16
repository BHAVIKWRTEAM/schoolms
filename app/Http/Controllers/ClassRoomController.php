<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //show all classes
        $classRooms = ClassRoom::all(); //fetch all class records
        return view('class_rooms.index', compact('classRooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('class_rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $formFields = $request->validate([
            'name' => 'required|string|max:30',
            'section' => 'nullable|string|max:5',
            'subjects' => 'nullable|array',
            'subjects.*' => 'exists:subjects,id',
        ]);

        $classRoom = ClassRoom::create([
            'name' => $formFields['name'],
            'section' => $formFields['section'],
        ]);

        if (!empty($formFields['subjects'])) {
            $classRoom->subjects()->attach($formFields['subjects']);
        }

        return redirect()->route('class-rooms.index')->with('success', 'Class Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassRoom $classRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassRoom $classRoom)
    {
        //
        // $classRoom = ClassRoom::findorfail($id);
        return view('class_rooms.edit', compact('classRoom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassRoom $classRoom)
    {
        //
        $formFields = $request->validate([
        'name' => 'required|string|max:100',
        'section' => 'nullable|string|max:5',
        'subjects' => 'nullable|array',
        'subjects.*' => 'exists:subjects,id',
    ]);

       
        $classRoom->update($formFields);

        $classRoom->subjects()->sync($request->subjects ?? []);

        return redirect()->route('class-rooms.index')->with('success', 'Class updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassRoom $classRoom)
    {
        //
        $classRoom->delete();
        return redirect()->route('class-rooms.index')->with('success', 'Class Deleted');
    }
}
