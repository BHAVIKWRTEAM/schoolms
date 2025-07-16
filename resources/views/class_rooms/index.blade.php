{{-- <!DOCTYPE html>
<html>

<head>
    <title>Class Rooms</title>
</head>

<body>
    <h1>All Class Rooms</h1>

    <ul>
        @foreach ($classRooms as $classRoom)
            <li>
                {{ $classRoom->name }} {{ $classRoom->section ? '- ' . $classRoom->section : '' }}

                <a href="{{ route('class-rooms.edit', $classRoom->id) }}">Edit</a>

                <form action="{{ route('class-rooms.destroy', $classRoom->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this class?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

</body>

</html> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Rooms</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">All Class Rooms</h1>
            <a href="{{ route('class-rooms.create') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                <i class="fas fa-plus mr-2"></i>Add New Class
            </a>
        </div>

        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <div class="grid grid-cols-12 bg-gray-100 p-4 font-medium text-gray-700">
                <div class="col-span-5">Class Name</div>
                <div class="col-span-4">Section</div>
                <div class="col-span-3 text-right">Actions</div>
            </div>

            @foreach ($classRooms as $classRoom)
                <div
                    class="grid grid-cols-12 p-4 border-b border-gray-200 hover:bg-gray-50 transition-colors items-center">
                    <div class="col-span-5 font-medium text-gray-800">
                        {{ $classRoom->name }} - 
                        {{-- //subjects --}}
                        @if ($classRoom->subjects->isNotEmpty())
                            {{ $classRoom->subjects->pluck('name')->join(', ') }}
                        @else
                            <span class="text-gray-400 italic">No subjects assigned</span>
                        @endif



                    </div>
                    <div class="col-span-4 text-gray-600">
                        {{ $classRoom->section ?? '—' }}
                    </div>

                    <div class="col-span-3 flex justify-end space-x-2">
                        <a href="{{ route('class-rooms.edit', $classRoom->id) }}"
                            class="px-3 py-1 text-sm bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition-colors">
                            <i class="fas fa-edit mr-1"></i>Edit
                        </a>
                        <form action="{{ route('class-rooms.destroy', $classRoom->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this class?')"
                                class="px-3 py-1 text-sm bg-red-100 text-red-700 rounded hover:bg-red-200 transition-colors">
                                <i class="fas fa-trash-alt mr-1"></i>Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach

            @if ($classRooms->isEmpty())
                <div class="p-8 text-center text-gray-500">
                    No class rooms found. Create your first class room!
                </div>
            @endif
        </div>

        @if ($classRooms instanceof \Illuminate\Pagination\LengthAwarePaginator && $classRooms->hasPages())
            <div class="mt-6">
                {{ $classRooms->links() }}
            </div>
        @endif
    </div>

    <script>
        // Add fade-in animation
        document.addEventListener('DOMContentLoaded', () => {
            const rows = document.querySelectorAll('.grid.grid-cols-12.p-4.border-b');
            rows.forEach((row, index) => {
                row.style.opacity = '0';
                row.style.animation = `fadeIn 0.3s ease-out forwards ${index * 0.1}s`;
            });

            const style = document.createElement('style');
            style.textContent = `
                @keyframes fadeIn {
                    from { opacity: 0; transform: translateY(10px); }
                    to { opacity: 1; transform: translateY(0); }
                }
            `;
            document.head.appendChild(style);
        });
    </script>
</body>

</html>

                </div>
            @endif
        </div>

        @if ($classRooms instanceof \Illuminate\Pagination\LengthAwarePaginator && $classRooms->hasPages())
            <div class="mt-6">
                {{ $classRooms->links() }}
            </div>
        @endif
    </div>

    <script>
        // Add fade-in animation
        document.addEventListener('DOMContentLoaded', () => {
            const rows = document.querySelectorAll('.grid.grid-cols-12.p-4.border-b');
            rows.forEach((row, index) => {
                row.style.opacity = '0';
                row.style.animation = `fadeIn 0.3s ease-out forwards ${index * 0.1}s`;
            });

            const style = document.createElement('style');
            style.textContent = `
                @keyframes fadeIn {
                    from { opacity: 0; transform: translateY(10px); }
                    to { opacity: 1; transform: translateY(0); }
                </div>
            @endif
        </div>

        @if ($classRooms instanceof \Illuminate\Pagination\LengthAwarePaginator && $classRooms->hasPages())
            <div class="mt-6">
                {{ $classRooms->links() }}
            </div>
        @endif
    </div>

    <script>
        // Add fade-in animation
        document.addEventListener('DOMContentLoaded', () => {
            const rows = document.querySelectorAll('.grid.grid-cols-12.p-4.border-b');
            rows.forEach((row, index) => {
                row.style.opacity = '0';
                row.style.animation = `fadeIn 0.3s ease-out forwards ${index * 0.1}s`;
            });

            const style = document.createElement('style');
            style.textContent = `
                @keyframes fadeIn {
                    from { opacity: 0; transform: translateY(10px); }
                    to { opacity: 1; transform: translateY(0); }
                }
            `;
            document.head.appendChild(style);
        });
    </script>
</body>

</html>

                }
            `;
            document.head.appendChild(style);
        });
    </script>
</body>

</html>
