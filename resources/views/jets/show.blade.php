<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jet Details</title>
</head>
<body>
    <header>
        <h1>{{ $jet->name }}</h1>
        <a href="{{ route('jets.index') }}">Back to List</a>
    </header>

    <main>
        <p><strong>Model:</strong> {{ $jet->model }}</p>
        <p><strong>Capacity:</strong> {{ $jet->capacity }}</p>
        <p><strong>Hourly Rate:</strong> ${{ $jet->hourly_rate }}</p>

        <h2>Reviews</h2>
        <ul>
            @foreach($jet->reviews as $review)
            <li>
                <strong>{{ $review->reviewer_name }}:</strong> {{ $review->text }} (Rating: {{ $review->rating }}) [{{ ucfirst($review->status) }}]
            </li>
            @endforeach
        </ul>

        <h3>Add a Review</h3>
        <form method="POST" action="{{ route('jets.reviews.store', $jet) }}">
            @csrf
            <label for="reviewer_name">Your Name:</label>
            <input type="text" name="reviewer_name" required><br>

            <label for="text">Review:</label>
            <textarea name="text" required></textarea><br>

            <label for="rating">Rating:</label>
            <select name="rating" required>
                @for($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select><br>

            <button type="submit">Submit Review</button>
        </form>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Private Jet Management</p>
    </footer>
</body>
</html>
