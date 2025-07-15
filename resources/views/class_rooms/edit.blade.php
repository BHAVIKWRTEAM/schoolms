<!DOCTYPE html>
<html>
<head>
    <title>Edit Class Room</title>
</head>
<body>
    <h1>Edit Class Room</h1>

    <form action="{{ route('class-rooms.update', $classRoom->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Class Name:</label>
        <input type="text" name="name" value="{{ $classRoom->name }}" required><br><br>

        <label for="section">Section:</label>
        <input type="text" name="section" value="{{ $classRoom->section }}"><br><br>

        <button type="submit">Update</button>
    </form>

    <br>
    <a href="{{ route('class-rooms.index') }}">Back to list</a>
</body>
</html>
