@extends('layouts.admin')

@section('content')
<body>
    <h1>Admin Feedback Management</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Comment</th>
                <th>Service</th>
                <th>Star</th>
            </tr>
        </thead>
        <tbody>
            @foreach($feedbackManagement as $feedback)
                <tr>
                    <td>{{ $feedback->name }}</td>
                    <td>{{ $feedback->email }}</td>
                    <td>{{ $feedback->address }}</td>
                    <td>{{ $feedback->comment }}</td>
                    <td>{{ $feedback->service }}</td>
                    <td>{{ $feedback->star }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
@endsection