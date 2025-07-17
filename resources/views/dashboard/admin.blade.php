<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold mb-6">Welcome, {{ Auth::user()->name }}!</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Students -->
                    <a href="{{ route('students.index') }}" class="block p-5 bg-blue-100 hover:bg-blue-200 rounded-lg shadow text-center">
                        <h4 class="text-lg font-bold mb-2">Manage Students</h4>
                        <p class="text-sm text-gray-600">View, add, edit, or remove students</p>
                    </a>

                    <!-- Teachers -->
                    <a href="{{ route('teachers.index') }}" class="block p-5 bg-green-100 hover:bg-green-200 rounded-lg shadow text-center">
                        <h4 class="text-lg font-bold mb-2">Manage Teachers</h4>
                        <p class="text-sm text-gray-600">Add teachers and assign subjects</p>
                    </a>

                    <!-- Classes -->
                    <a href="{{ route('class-rooms.index') }}" class="block p-5 bg-yellow-100 hover:bg-yellow-200 rounded-lg shadow text-center">
                        <h4 class="text-lg font-bold mb-2">Manage Classes</h4>
                        <p class="text-sm text-gray-600">Create and edit class information</p>
                    </a>

                    <!-- Subjects -->
                    <a href="{{ route('subjects.index') }}" class="block p-5 bg-purple-100 hover:bg-purple-200 rounded-lg shadow text-center">
                        <h4 class="text-lg font-bold mb-2">Manage Subjects</h4>
                        <p class="text-sm text-gray-600">Add and assign subjects to classes/teachers</p>
                    </a>

                  
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
