@extends('layouts.admin')

@section('content')
    <h1>{{ isset($user) ? 'Edit User' : 'Create User' }}</h1>

    <form action="{{ isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        @if(isset($user))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', isset($user) ? $user->name : '') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" id="contact" name="contact" class="form-control @error('contact') is-invalid @enderror" value="{{ old('contact', isset($user) ? $user->contact : '') }}" required>
            @error('contact')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" required>
                <option value="subscriber" {{ old('role', isset($user) && $user->role === 'subscriber' ? 'selected' : '') }}>Subscriber</option>
                <option value="user" {{ old('role', isset($user) && $user->role === 'user' ? 'selected' : '') }}>User</option>
            </select>
            @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        @if(!isset($user))
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        @endif

        <button type="submit" class="btn btn-primary">{{ isset($user) ? 'Update User' : 'Create User' }}</button>
    </form>
@endsection