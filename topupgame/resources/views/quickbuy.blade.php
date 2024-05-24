<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Buy - {{ $game->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Quick Buy - {{ $game->name }}</h1>
        <div class="card mb-3">
            <img src="{{ asset('uploads/game/' . $game->image) }}" class="card-img-top" alt="{{ $game->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $game->name }}</h5>
                <p class="card-text">{{ $game->description }}</p>
                <a href="{{ url('/purchase', ['id' => $game->id]) }}" class="btn btn-success">Purchase</a>
            </div>
        </div>
    </div>
</body>
</html>
