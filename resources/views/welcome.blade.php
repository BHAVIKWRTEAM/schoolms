<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Welcome to School Management System
        </h2>
    </x-slot>

    <div class="center py-8 px-6 mt-10 max-w-4xl mx-auto bg-white shadow sm:rounded-lg">
        @auth
            <p class="text-gray-700 text-lg">You are logged in as <strong>{{ Auth::user()->name }}</strong> ({{ Auth::user()->getRoleNames()->first() }})</p>

            <div class="mt-4">
                <a href="{{ route('login.redirect') }}" class="text-blue-600 hover:underline">Go to Dashboard</a>
            </div>
        @else
            {{-- <p class="text-gray-700 text-lg">Welcome to our School Management System. Please login to continue.</p>

            <div class="mt-4 space-x-4">
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
                
            </div> --}}
            <div class="flex flex-col items-center justify-center text-center">
    <p class="text-gray-800 text-xl font-medium mb-6">
        Please log in to continue.
    </p>

    <div class="flex space-x-6">
        <a href="{{ route('login') }}" 
           class="inline-block bg-blue-600 text-black font-semibold px-8 py-3 rounded-lg shadow-md hover:bg-blue-700 transition duration-300 ease-in-out transform hover:-translate-y-1">
            Login
        </a>
        {{-- <a href="{{ route('register') }}" 
           class="inline-block bg-green-600 text-white font-semibold px-8 py-3 rounded-lg shadow-md hover:bg-green-700 transition duration-300 ease-in-out transform hover:-translate-y-1">
            Register
        </a> --}}
    </div>
</div>
        @endauth
    </div>
</x-app-layout>
