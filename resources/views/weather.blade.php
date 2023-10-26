<!DOCTYPE html>
<html>
<head>
    <title> Méteo</title>
    <style>
        .card {
            margin-top: 8em;
            width: 500px;
            margin: 30px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Information Méteo</h1>
        <form method="get" action="{{route('weather')}}">
            <input type="text" name="city" placeholder="Enter city name" required>
            <button type="submit">Search</button>
        </form>

        @if(isset($data['weather']))
            <p>Ville: <strong>{{ $data['name'] }}</strong></p>
            <p>Weather: <strong>{{ $data['weather'][0]['description'] }}</strong></p>
            <p>Temperature: <strong>{{ $data['main']['temp'] }} °C</strong></p>
            <p>Temp Min: <strong>{{ $tempMin }} °C</strong></p>
            <p>Temp Max: <strong>{{ $tempMax }} °C</strong></p>
            <p>Pression: <strong>{{ $pressure }} hPa</strong></p>
            <p>Feels Like: <strong>{{ $feelsLike }} °C</strong></p>
            <p>Date et Heure: <strong>{{ $dateTime }}</strong></p>
        @else
            <p>City not found</p>
        @endif
    </div>
</body>
</html>
