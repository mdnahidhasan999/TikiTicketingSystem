<!-- resources/views/tickets/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Ticket</title>
</head>
<body>
    <h1>Purchase Ticket</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form method="POST" action="/tickets">
        @csrf
        <label for="trip_id">Select Trip:</label>
        <select name="trip_id" id="trip_id" required>
            @foreach ($trips as $trip)
                <option value="{{ $trip->id }}">
                    {{ $trip->startLocation->name }} to {{ $trip->endLocation->name }} - {{ $trip->date }}
                </option>
            @endforeach
        </select>

        <label for="seat_number">Select Seat Number:</label>
        <input type="number" name="seat_number" id="seat_number" min="1" max="36" required>

        <label for="user_name">Your Name:</label>
        <input type="text" name="user_name" id="user_name" required>

        <button type="submit">Purchase Ticket</button>
    </form>
</body>
</html>
