<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Teachers
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="flex justify-between mb-4">
                    <p class="text-gray-600">List of all teachers.</p>
                    <a href="{{ route('teachers.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add New Teacher</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-700 border border-gray-300">
                        <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                            <tr>
                                <th class="px-4 py-2">#</th>
                                <th class="px-4 py-2">Photo</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Phone</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($teachers as $teacher)
                                <tr class="border-t">
                                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2">
                                        @if($teacher->photo)
                                            <img src="{{ asset('uploads/teachers/' . $teacher->photo) }}" alt="Photo" class="h-10 w-10 rounded-full object-cover">
                                        @else
                                            <span class="text-gray-400 italic">No photo</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">{{ $teacher->first_name }} {{ $teacher->last_name }}</td>
                                    <td class="px-4 py-2">{{ $teacher->email }}</td>
                                    <td class="px-4 py-2">{{ $teacher->phone ?? '-' }}</td>
                                    <td class="px-4 py-2">
                                        <!-- Placeholder for now -->
                                        <a href="#" class="text-blue-600 hover:underline">View</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-2 text-center text-gray-500">No teachers found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
