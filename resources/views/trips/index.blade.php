<!-- resources/views/trips/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Trip</title>
</head>
<body>
    <h1>Create Trip</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="/trips">
        @csrf
        <label for="location_id">Select Starting Location:</label>
        <select name="location_id" id="location_id" required>
            @foreach ($locations as $location)
                <option value="{{ $location->id }}">{{ $location->name }}</option>
            @endforeach
        </select>

        <label for="date">Select Date:</label>
        <input type="date" name="date" id="date" required>

        <button type="submit">Create Trip</button>
    </form>

    <h2>Locations</h2>
    <ul>
        @foreach ($locations as $location)
            <li>{{ $location->name }}</li>
        @endforeach
    </ul>
</body>
</html>
