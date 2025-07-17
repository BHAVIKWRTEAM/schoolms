@vite('resources/css/app.css')
<x-app-layout>

@if (session('success'))
    <div class="mb-4 text-green-700 bg-green-100 border border-green-300 px-4 py-2 rounded">
        {{ session('success') }}
    </div>
@endif

{{-- search form --}}
<form method="GET" action="{{ route('students.index') }}" class="mb-4 mx-auto">
    <div class="flex items-center space-x-2">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or email"
            class="border-gray-300 rounded px-3 py-2 w-64">
        <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">
            Search
        </button>
    </div>

   
</form>













<div class="overflow-x-auto bg-white rounded shadow-md">
    <table class="w-full text-sm text-gray-700 text-left">
        <thead class="bg-indigo-50 text-sm font-semibold text-gray-800 border-b border-indigo-200">
            <tr>
                <th class="px-4 py-3 text-left">#</th>
                <th class="px-4 py-3 text-left">Photo</th>
                <th class="px-4 py-3 text-left">Name</th>
                <th class="px-4 py-3 text-left">Email</th>
                <th class="px-4 py-3 text-left">Class</th>
                <th class="px-4 py-3 text-left">Roll No</th>
                <th class="px-4 py-3 text-left">Actions <a href="{{ route('students.create') }}"
                        class="ml-10 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add New Student</a></th>
                <th class="px-4 py-3 text-left">
                    
                </th>
                 
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($students as $student)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-3 align-middle">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3 align-middle">
                        @if ($student->photo)
                            <img src="{{ asset('uploads/students/' . $student->photo) }}" alt="Photo"
                                style="height: 120; width: 120"
                                class="rounded-full object-cover border border-gray-300">
                        @else
                            <span class="text-gray-400">—</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 align-middle font-medium">{{ $student->first_name }} {{ $student->last_name }}
                    </td>
                    <td class="px-4 py-3 align-middle">{{ $student->email }}</td>
                    <td class="px-4 py-3 align-middle">{{ $student->classRoom->name ?? '-' }}</td>
                    <td class="px-4 py-3 align-middle">{{ $student->roll_no }}</td>
                    {{-- <td class="px-4 py-3 align-middle">
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('students.show', $student) }}"
                            class="inline-flex items-center px-3 py-1 text-xs font-medium text-black bg-blue-500 rounded-full hover:bg-blue-600 transition">
                            View
                        </a>
                        <a href="{{ route('students.edit', $student) }}"
                            class="inline-flex items-center px-3 py-1 text-xs font-medium text-black bg-yellow-500 rounded-full hover:bg-yellow-600 transition">
                            Edit
                        </a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this student?');"
                            class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center px-3 py-1 text-xs font-medium text-white bg-red-500 rounded-full hover:bg-red-600 transition">
                                Delete
                            </button>
                        </form>
                    </div>
                </td> --}}
                    <td class="px-4 py-3 align-middle">
                        <div class="flex flex-wrap gap-2">
                            {{-- View Button --}}
                            <a href="{{ route('students.show', $student) }}"
                                class="inline-flex items-center justify-center px-4 py-2 text-xs font-semibold text-white bg-blue-500 rounded-md hover:bg-blue-600 transition appearance-none">
                                View
                            </a>

                            {{-- Edit Button --}}
                            <a href="{{ route('students.edit', $student) }}"
                                class="inline-flex items-center justify-center px-4 py-2 text-xs font-semibold text-white bg-yellow-500 rounded-md hover:bg-yellow-600 transition appearance-none">
                                Edit
                            </a>

                            {{-- Delete Button --}}
                            <form action="{{ route('students.destroy', $student) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this student?');"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class=" inline-flex items-center justify-center px-4 py-2 text-xs font-semibold text-white bg-red-500 rounded-md hover:bg-red-600 transition appearance-none">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-4 py-6 text-center text-gray-500">No students found.</td>
                </tr>
            @endforelse
        </tbody>

    </table>
    <div class="mt-4">
        {{ $students->links() }}
    </div>
</div>
</x-app-layout>