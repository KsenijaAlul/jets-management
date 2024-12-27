<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jet</title>
</head>
<body>
    <header>
        <h1>Edit Jet</h1>
        <a href="{{ route('jets.index') }}">Back to List</a>
    </header>

    <main>
        <form method="POST" action="{{ route('jets.update', $jet) }}">
            @csrf
            @method('PUT')
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ $jet->name }}" required><br>

            <label for="model">Model:</label>
            <input type="text" name="model" value="{{ $jet->model }}" required><br>

            <label for="capacity">Capacity:</label>
            <input type="number" name="capacity" value="{{ $jet->capacity }}" required min="1"><br>

            <label for="hourly_rate">Hourly Rate:</label>
            <input type="number" name="hourly_rate" value="{{ $jet->hourly_rate }}" required step="0.01" min="0"><br>

            <button type="submit">Update</button>
        </form>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Private Jet Management</p>
    </footer>
</body>
</html>
