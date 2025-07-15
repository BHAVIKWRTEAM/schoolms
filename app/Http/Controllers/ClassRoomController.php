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
        return view('class_rooms.index',compact('classRooms'));

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
            'name'=>'required|string|max:30',
            'section'=>'nullable|string|max:5'
        ]);

        ClassRoom::create($formFields);
        return redirect()->route('class-rooms.index')->with('success','Class Added Successfully');
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
    public function edit($id)
    {
        //
        $classRoom = ClassRoom::findorfail($id);
        return view('class_rooms.edit',compact('classRoom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $formFields = $request->validate([
            'name'=>'required|string|max:30',
            'section'=>'required|string|max:20'
        ]);

        $classRoom = ClassRoom::findorfail($id);
        $classRoom->update($formFields);
        return redirect()->route('class-rooms.index')->with('success','Class updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $classRoom = ClassRoom::findorfail($id);
        $classRoom->delete();
        return redirect()->route('class-rooms.index')->with('success','Class Deleted');
    }
}
