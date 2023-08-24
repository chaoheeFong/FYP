
@extends('layouts.admin')

@section('content')
<style>
    .custom-checkbox input[type="checkbox"] {
        display: none; /* Hide the default checkbox */
    }

    .custom-checkbox label {
        display: flex;
        align-items: center; /* Center vertically */
        position: relative;
        cursor: pointer;
    }

    .custom-checkbox label::before {
        content: "";
        width: 25px;
        height: 25px;
        border: 2px solid #ccc;
        background-color: #fff;
        border-radius: 4px;
        margin-right: 10px; /* Add spacing between checkbox and label */
    }

    .custom-checkbox input[type="checkbox"]:checked + label::before {
        border-color: #007bff; /* Color when checkbox is checked */
        background-color: #007bff; /* Color when checkbox is checked */
    }

    .custom-checkbox label::after {
        content: "\2713"; /* Unicode checkmark symbol */
        font-size: 20px;
        color: #007bff;
        visibility: hidden;
    }

    .custom-checkbox input[type="checkbox"]:checked + label::after {
        visibility: visible; /* Show checkmark when checkbox is checked */
    }
</style>
<div class="container">

<body>
    <h1>Admin Feedback Management</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Comment</th>
                <th>Service</th>
                <th>Star</th>
                <th>Check</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($feedbackManagement as $feedback)
                <tr>
                    <td>{{ $feedback->id }}</td>
                    <td>{{ $feedback->name }}</td>
                    <td>{{ $feedback->email }}</td>
                    <td>{{ $feedback->address }}</td>
                    <td>{{ $feedback->comment }}</td>
                    <td>{{ $feedback->service }}</td>
                    <td>{{ $feedback->star }}</td>
                    <td>
                        <div class="custom-checkbox">
                            <input type="checkbox" id="checkbox{{ $feedback->id }}" class="form-check-input">
                            <label for="checkbox{{ $feedback->id }}"></label>
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</div>
@endsection