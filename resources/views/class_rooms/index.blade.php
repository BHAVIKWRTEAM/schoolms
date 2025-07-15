<!DOCTYPE html>
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

</html>
