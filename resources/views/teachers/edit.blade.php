<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Teacher
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <p class="mb-4 text-gray-600">Use the form below to add a new teacher to the system.</p>

                <!-- We'll add the form here next -->
                <form action="{{ route('teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Form fields will be added here step by step -->

                    <div class="mb-4">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                        <input type="text" name="first_name" id="first_name" value="{{ $teacher->first_name }}"
                            class="mt-1 block w-full text-black text-black text-black rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            required>
                        @error('first_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text" name="last_name" id="last_name" value="{{ $teacher->last_name }}"
                            class="mt-1 block w-full text-black text-black rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            required>
                        @error('last_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" value="{{ $teacher->email }}"
                            class="mt-1 block w-full text-black text-black rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm "
                            required readonly>
                        <small class="text-gray-500">Email Id cannot be changed.</small>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                        <input type="text" name="phone" id="phone" value="{{ $teacher->phone }}"
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
                            <option value="Male" {{ $teacher->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $teacher->gender == 'Female' ? 'selected' : '' }}>Female
                            </option>
                            <option value="Other" {{ $teacher->gender == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('gender')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="dob" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                        <input type="date" name="dob" id="dob" value="{{ $teacher->dob }}"
                            class="mt-1 block w-full text-black rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        @error('dob')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="qualification" class="block text-sm font-medium text-gray-700">Qualification</label>
                        <input type="text" name="qualification" id="qualification"
                            value="{{ $teacher->qualification }}"
                            class="mt-1 block w-full text-black rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        @error('qualification')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="experience" class="block text-sm font-medium text-gray-700">Experience</label>
                        <input type="text" name="experience" id="experience" value="{{ $teacher->experience }}"
                            placeholder="e.g. 5 years"
                            class="mt-1 block w-full text-black rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        @error('experience')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                        <textarea name="bio" id="bio" rows="4"
                            class="mt-1 block w-full text-black rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $teacher->bio }}</textarea>
                        @error('bio')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <input type="text" name="address" id="address" value="{{ $teacher->address }}"
                            class="mt-1 block w-full text-black rounded-md border-gray-300 shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('address')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-4">
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <input type="text" name="city" id="city" value="{{ $teacher->city }}"
                                class="mt-1 block w-full text-black rounded-md border-gray-300 shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500">
                            @error('city')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                            <input type="text" name="state" id="state" value="{{ $teacher->state }}"
                                class="mt-1 block w-full text-black rounded-md border-gray-300 shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500">
                            @error('state')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="zip_code" class="block text-sm font-medium text-gray-700">Zip Code</label>
                            <input type="text" name="zip_code" id="zip_code" value="{{ $teacher->zip_code }}"
                                class="mt-1 block w-full text-black rounded-md border-gray-300 shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500">
                            @error('zip_code')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Profile Photo -->
                    <div class="mb-4">
                        <label for="photo" class="block text-sm font-medium text-gray-700">Profile Photo</label>
                        <input type="file" name="photo" id="photo" value="{{ $teacher->photo }}"
                            class="mt-1 block w-full text-black text-sm text-gray-700 border border-gray-300 rounded-md cursor-pointer">
                        @error('photo')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        @if ($teacher->photo)
                            <img src="{{ asset('uploads/teachers/' . $teacher->photo) }}" alt="Photo"
                                style="height: 100px; margin-top: 20px;" class=" rounded-full object-cover">
                        @else
                            <span class="text-gray-400 italic">No photo</span>
                        @endif
                    </div>

                    <div class="mb-4">
                        <label for="subjects" class="block text-sm font-medium text-gray-700 mb-1">Assign
                            Subjects</label>
                        <select name="subjects[]" id="subjects" multiple
                            class="w-full border-gray-300 rounded-md shadow-sm">
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}"
                                    {{ in_array($subject->id, $teacher->subjects->pluck('id')->toArray()) ? 'selected' : '' }}>
                                    {{ $subject->name }}
                                </option>
                            @endforeach
                            {{-- @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach --}}
                        </select>
                        <small class="text-gray-500">Hold Ctrl (Windows) or Cmd (Mac) to select multiple
                            subjects.</small>
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Update Teacher
                        </button>
                    </div>



                </form>


            </div>
        </div>
    </div>
</x-app-layout>
