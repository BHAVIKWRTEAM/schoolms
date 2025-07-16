@php
    $student = \App\Models\Student::where('user_id', Auth::id())->first();
    // $user->getRoleNames(); 
@endphp

@if($student)
    <h2 class="text-xl font-bold">Welcome, {{ $student->first_name }}</h2>
    <p>Email: {{ $student->email }}</p>
    <p>Class: {{ $student->classRoom->name ?? 'N/A' }}</p>
@else
    <p>Your student profile is not linked properly. Please contact admin.</p>
@endif
