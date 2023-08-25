@extends('layouts.admin')

@section('content')
<div class="dashboard">
    <h1 class="dashboard-title">Dashboard</h1>
    <p class="dashboard-welcome">Welcome to the admin dashboard of the Cat Boarding App, {{ Auth::user()->name }}!</p>

    <div class="info-boxes">
        <div class="info-box info-box-booking">
            <div class="info-box-content">
                <h4 class="info-box-title">Total Bookings</h4>
                <p class="info-box-count">{{ $bookingCount }}</p>
            </div>
        </div>

        <div class="info-box info-box-feedback">
            <div class="info-box-content">
                <h4 class="info-box-title">Total Feedback</h4>
                <p class="info-box-count">{{ $feedbackCount }}</p>
            </div>
        </div>

        <div class="info-box info-box-user">
            <div class="info-box-content">
                <h4 class="info-box-title">Total Users</h4>
                <p class="info-box-count">{{ $userCount }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
.dashboard {
    text-align: center;
    padding: 20px;
}

.dashboard-title {
    font-size: 24px;
    margin-bottom: 10px;
}

.dashboard-welcome {
    font-size: 18px;
    margin-bottom: 20px;
}

.info-boxes {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.info-box {
    flex: 1;
    background-color: #ffffff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
    cursor: pointer;
}

.info-box:hover {
    transform: translateY(-5px);
}

.info-box-booking {
    background-color: #fdd835; /* Material Yellow 600 */
}

.info-box-feedback {
    background-color: #42a5f5; /* Material Blue 600 */
}

.info-box-user {
    background-color: #66bb6a; /* Material Green 600 */
}

.info-box-content {
    text-align: center;
}

.info-box-title {
    font-size: 18px;
    margin-bottom: 10px;
    color: #333;
}

.info-box-count {
    font-size: 24px;
    font-weight: bold;
    color: #222;
}
</style>
