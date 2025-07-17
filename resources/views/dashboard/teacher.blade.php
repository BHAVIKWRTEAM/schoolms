<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Teacher Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <h3 class="text-xl font-semibold mb-4">Welcome, {{ $teacher->first_name }}!</h3>

                @if ($teacher->photo)
                    <img src="{{ asset('uploads/teachers/' . $teacher->photo) }}" alt="Photo"
                        style="height: 100px; margin-top: 20px; margin-bottom: 20px;" class="rounded-full object-cover">
                @else
                    <span class="text-gray-400 italic">No photo</span>
                @endif

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <strong>Email:</strong> {{ $teacher->email }}
                    </div>
                    <div>
                        <strong>Phone:</strong> {{ $teacher->phone ?? '-' }}
                    </div>
                    <div>
                        <strong>Qualification:</strong> {{ $teacher->qualification ?? '-' }}
                    </div>
                    <div>
                        <strong>Experience:</strong> {{ $teacher->experience ?? '-' }}
                    </div>
                </div>

                <div class="mt-6">
                   <h4 class="font-semibold mb-2">
                            Assigned Subjects ({{ $teacher->subjects->count() }})
                        </h4>
                    @if ($teacher->subjects->count())
                        
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
<a href="{{ route('students.index') }}"
                            class=" px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">See Students</a>
                </div>
                

            </div>
        </div>
    </div>
</x-app-layout>
