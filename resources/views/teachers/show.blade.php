<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Teacher Profile
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <div class="flex items-center space-x-6">
                    @if ($teacher->photo)
                        <img src="{{ asset('uploads/teachers/' . $teacher->photo) }}" alt="Profile Photo"
                             class="w-24 h-24 rounded-full object-cover">
                    @else
                        <div class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center text-gray-500">
                            N/A
                        </div>
                    @endif

                    <div>
                        <h3 class="text-2xl font-bold">{{ $teacher->first_name }} {{ $teacher->last_name }}</h3>
                        <p class="text-gray-600">{{ $teacher->qualification }}</p>
                        <p class="text-gray-600 text-sm">Experience: {{ $teacher->experience }}</p>
                    </div>
                </div>

                <hr class="my-6">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <strong>Email:</strong> {{ $teacher->email }}
                    </div>
                    <div>
                        <strong>Phone:</strong> {{ $teacher->phone ?? '-' }}
                    </div>
                    <div>
                        <strong>Gender:</strong> {{ $teacher->gender ?? '-' }}
                    </div>
                    <div>
                        <strong>Date of Birth:</strong> {{ $teacher->dob ?? '-' }}
                    </div>
                    <div class="sm:col-span-2">
                        <strong>Address:</strong><br>
                        {{ $teacher->address }}<br>
                        {{ $teacher->city }}, {{ $teacher->state }} {{ $teacher->zip_code }}
                    </div>
                    <div class="sm:col-span-2">
                        <strong>Bio:</strong><br>
                        <p class="text-gray-700 mt-1">{{ $teacher->bio ?? '-' }}</p>
                    </div>
                </div>

                <hr class="my-6">

                <div>
                    <h4 class="font-semibold mb-2">Assigned Subjects</h4>
                    @if($teacher->subjects->count())
                        <ul class="list-disc list-inside text-gray-700">
                            @foreach ($teacher->subjects as $subject)
                                <li>{{ $subject->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">No subjects assigned</p>
                    @endif
                </div>

                <div class="mt-6">
                    <a href="{{ route('teachers.index') }}"
                       class="text-blue-600 hover:underline">&larr; Back to list</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
