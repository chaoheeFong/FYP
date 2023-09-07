@extends('layouts.admin') <!-- If you have a layout template -->

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Action Buttons</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .action-button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius: 5px;
        }

        .action-button:hover {
            background-color: white;
            color: black;
            border: 1px solid #4CAF50;
        }
    </style>
</head>
<body>
    <form method="get" action="{{ route('ComingToCentre', 'coming_to_centre') }}">
        @csrf
        <button class="action-button" type="submit">Coming to Centre</button>
    </form>

    <form method="get" action="{{ route('bath', 'bath') }}">
        @csrf
        <button class="action-button" type="submit">Bath</button>
    </form>

    <form method="get" action="{{ route('received', 'received') }}">
        @csrf
        <button class="action-button" type="submit">Received</button>
    </form>

    <form method="get" action="{{ route('feed', 'feeded') }}">
        @csrf
        <button class="action-button" type="submit">Fed</button>
    </form>
</body>
</html>

@endsection
