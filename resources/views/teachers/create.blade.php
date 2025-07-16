<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add New Teacher
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <p class="mb-4 text-gray-600">Use the form below to add a new teacher to the system.</p>

                <!-- We'll add the form here next -->
                <form action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Form fields will be added here step by step -->

                    <div class="mb-4">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                        <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}"
                            class="mt-1 block w-full text-black text-black text-black rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            required>
                        @error('first_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}"
                            class="mt-1 block w-full text-black text-black rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            required>
                        @error('last_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="mt-1 block w-full text-black text-black rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            required>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                            class="mt-1 block w-full text-black text-black rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        @error('phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                        <select name="gender" id="gender"
                            class="mt-1 block w-full text-black rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="">-- Select Gender --</option>
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('gender')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="dob" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                        <input type="date" name="dob" id="dob" value="{{ old('dob') }}"
                            class="mt-1 block w-full text-black rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        @error('dob')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="qualification" class="block text-sm font-medium text-gray-700">Qualification</label>
                        <input type="text" name="qualification" id="qualification"
                            value="{{ old('qualification') }}"
                            class="mt-1 block w-full text-black rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        @error('qualification')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="experience" class="block text-sm font-medium text-gray-700">Experience</label>
                        <input type="text" name="experience" id="experience" value="{{ old('experience') }}"
                            placeholder="e.g. 5 years"
                            class="mt-1 block w-full text-black rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        @error('experience')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                        <textarea name="bio" id="bio" rows="4"
                            class="mt-1 block w-full text-black rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('bio') }}</textarea>
                        @error('bio')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <input type="text" name="address" id="address" value="{{ old('address') }}"
                            class="mt-1 block w-full text-black rounded-md border-gray-300 shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('address')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-4">
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <input type="text" name="city" id="city" value="{{ old('city') }}"
                                class="mt-1 block w-full text-black rounded-md border-gray-300 shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500">
                            @error('city')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                            <input type="text" name="state" id="state" value="{{ old('state') }}"
                                class="mt-1 block w-full text-black rounded-md border-gray-300 shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500">
                            @error('state')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="zip_code" class="block text-sm font-medium text-gray-700">Zip Code</label>
                            <input type="text" name="zip_code" id="zip_code" value="{{ old('zip_code') }}"
                                class="mt-1 block w-full text-black rounded-md border-gray-300 shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500">
                            @error('zip_code')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Profile Photo -->
                    <div class="mb-4">
                        <label for="photo" class="block text-sm font-medium text-gray-700">Profile Photo</label>
                        <input type="file" name="photo" id="photo"
                            class="mt-1 block w-full text-black text-sm text-gray-700 border border-gray-300 rounded-md cursor-pointer">
                        @error('photo')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>



                    <div class="mt-6">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Save Teacher
                        </button>
                    </div>



                </form>


            </div>
        </div>
    </div>
</x-app-layout>
