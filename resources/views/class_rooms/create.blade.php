{{-- <!DOCTYPE html>
<html>

<head>
    <title>Add New Class Room</title>
</head>

<body>
    <h1>Create a New Class Room</h1>

    <form action="{{ route('class-rooms.store') }}" method="POST">
        @csrf

        <label for="name">Class Name:</label>
        <input type="text" name="name" required><br><br>

        <label for="section">Section:</label>
        <input type="text" name="section"><br><br>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Subjects</label>
            <select name="subjects[]" multiple class="border-gray-300 rounded w-full">
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}"
                        {{ in_array($subject->id, old('subjects', isset($classRoom) ? $classRoom->subjects->pluck('id')->toArray() : [])) ? 'selected' : '' }}>
                        {{ $subject->name }}
                    </option>
                @endforeach
            </select>
        </div>


        <button type="submit">Save</button>
    </form>

    <br>
    <a href="{{ route('class-rooms.index') }}">Back to list</a>
</body>

</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Class Room</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Create New Class Room</h1>
                <a href="{{ route('class-rooms.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    ← Back to list
                </a>
            </div>

            <form action="{{ route('class-rooms.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Class Name *</label>
                    <input type="text" name="name" id="name" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Enter class name">
                </div>

                <div class="mb-4">
                    <label for="section" class="block text-sm font-medium text-gray-700 mb-1">Section</label>
                    <input type="text" name="section" id="section"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Enter section (optional)">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Subjects</label>
                    <select name="subjects[]" multiple
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 h-auto">
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">
                                {{ $subject->name }}
                            </option>
                        @endforeach
                    </select>
                    <p class="mt-1 text-sm text-gray-500">Hold Ctrl/Cmd to select multiple subjects</p>
                </div>

                <div class="flex justify-end space-x-3">
                    <a href="{{ route('class-rooms.index') }}" 
                       class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Save Class
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
