@extends('layouts.admin')

@section('content')

<head>
    <!-- Include necessary CSS, such as Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Admin Dashboard</h1>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Total Feedback Entries</h4>
                <p class="card-text">{{ $feedbackCount }}</p>
            </div>
        </div>
        
        <!-- Other dashboard content here -->
    </div>
</body>     
@endsection
