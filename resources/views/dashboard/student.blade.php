{{-- 
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
@endif --}}
@vite('resources/css/app.css')

@php
    $student = \App\Models\Student::where('user_id', Auth::id())->first();
    // $user->getRoleNames(); 
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Student Details
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="flex justify-center">
            <!-- Centered card with 40% width -->
            <div class="w-5/7 bg-white rounded-xl shadow-lg overflow-hidden">
                <!-- Header with gradient background -->
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-8 text-center">
                    @if ($student->photo)
                        <img src="{{ asset('uploads/students/' . $student->photo) }}" 
                             alt="Student Photo" 
                             style="height: 130px"
                             class="rounded-full mx-auto mb-4 mt-5 pt-10 border-4 border-white shadow-lg object-cover">
                    @else
                        <div class="w-24 h-24 rounded-full mx-auto mb-4 border-4 border-white shadow-lg bg-gray-300 flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    @endif
                    
                    <h1 class="text-2xl font-bold text-black mb-1">
                        {{ $student->first_name }} {{ $student->last_name }}
                    </h1>
                    <p class="text-blue-100 text-sm">
                        Roll No: {{ $student->roll_no }}
                    </p>
                    <p class="text-blue-100 text-sm">
                        {{ $student->classroom->name }} {{ $student->classroom->section ? '- ' . $student->classroom->section : '' }}
                    </p>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <div class="space-y-6">
                        <!-- Contact Information -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Contact Information
                            </h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                    <span class="text-sm font-medium text-gray-500">Email</span>
                                    <span class="text-sm text-gray-900">{{ $student->email }}</span>
                                </div>
                                
                                @if ($student->phone)
                                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                    <span class="text-sm font-medium text-gray-500">Phone</span>
                                    <span class="text-sm text-gray-900">{{ $student->phone }}</span>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Personal Information -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Personal Information
                            </h3>
                            <div class="space-y-3">
                                @if ($student->gender)
                                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                    <span class="text-sm font-medium text-gray-500">Gender</span>
                                    <span class="text-sm text-gray-900">{{ $student->gender }}</span>
                                </div>
                                @endif
                                
                                @if ($student->dob)
                                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                    <span class="text-sm font-medium text-gray-500">Date of Birth</span>
                                    <span class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($student->dob)->format('M d, Y') }}</span>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Address Information -->
                        @if ($student->address || $student->city || $student->state || $student->zip_code)
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Address Information
                            </h3>
                            <div class="space-y-3">
                                @if ($student->address)
                                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                    <span class="text-sm font-medium text-gray-500">Address</span>
                                    <span class="text-sm text-gray-900">{{ $student->address }}</span>
                                </div>
                                @endif
                                
                                @if ($student->city || $student->state || $student->zip_code)
                                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                    <span class="text-sm font-medium text-gray-500">Location</span>
                                    <span class="text-sm text-gray-900">
                                        @if ($student->city){{ $student->city }}@endif
                                        @if ($student->city && ($student->state || $student->zip_code)), @endif
                                        @if ($student->state){{ $student->state }}@endif
                                        @if ($student->state && $student->zip_code) @endif
                                        @if ($student->zip_code){{ $student->zip_code }}@endif
                                    </span>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endif

                        <!-- System Information -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                System Information
                            </h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                    <span class="text-sm font-medium text-gray-500">Created At</span>
                                    <span class="text-sm text-gray-900">{{ $student->created_at->format('M d, Y H:i A') }}</span>
                                </div>
                                
                                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                    <span class="text-sm font-medium text-gray-500">Last Updated</span>
                                    <span class="text-sm text-gray-900">{{ $student->updated_at->format('M d, Y H:i A') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="bg-gray-50 px-6 py-4 flex justify-between items-center border-t border-gray-200">
                    {{-- <a href="{{ route('students.index') }}"
                       class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Students
                    </a> --}}
                    
                    <div class="flex space-x-2">
                        {{-- <a href="{{ route('students.edit', $student->id) }}"
                           class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-black bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </a> --}}
                        
                        {{-- <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                    onclick="return confirm('Are you sure you want to delete this student?')">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Delete
                            </button>
                        </form> --}}
                    </div>
                </div>
            </div>  
        </div>
    </div>
</x-app-layout>