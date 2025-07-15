<!DOCTYPE html>
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

        <button type="submit">Save</button>
    </form>

    <br>
    <a href="{{ route('class-rooms.index') }}">Back to list</a>
</body>
</html>
