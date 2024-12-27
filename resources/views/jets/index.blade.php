<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jet List</title>
</head>
<body>
    <header>
        <h1>Jets</h1>
        <a href="{{ route('jets.create') }}">Add New Jet</a>
        <form method="GET" action="{{ route('jets.index') }}" style="margin-top: 20px;">
            <input type="text" name="search" placeholder="Search jets..." value="{{ request('search') }}">
            <button type="submit">Search</button>
        </form>
    </header>

    <main>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Model</th>
                    <th>Capacity</th>
                    <th>Hourly Rate</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jets as $jet)
                <tr>
                    <td>{{ $jet->name }}</td>
                    <td>{{ $jet->model }}</td>
                    <td>{{ $jet->capacity }}</td>
                    <td>${{ $jet->hourly_rate }}</td>
                    <td>
                        <a href="{{ route('jets.show', $jet) }}">View</a>
                        <a href="{{ route('jets.edit', $jet) }}">Edit</a>
                        <form action="{{ route('jets.destroy', $jet) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Private Jet Management</p>
    </footer>
</body>
</html>
