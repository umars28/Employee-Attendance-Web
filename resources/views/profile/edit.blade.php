@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Profile</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" class="mb-3">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <p class="text-danger small">
                    {{ $message }}
                </p>
            @enderror
        </div>

        @if (!$isAdmin)
            <div class="form-group">
                <label for="birth_of_date">Birth of Date</label>
                <input type="date" class="form-control @error('birth_of_date') is-invalid @enderror" id="birth_of_date" name="birth_of_date" value="{{ old('birth_of_date', $userDetail->birth_of_date) }}" required>
                @error('birth_of_date')
                    <p class="text-danger small">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city', $userDetail->city) }}" required>
                @error('city')
                    <p class="text-danger small">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        @endif

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <p class="text-danger small">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password (Leave empty to keep current password)</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
            @error('password')
                <p class="text-danger small">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
            @error('password_confirmation')
                <p class="text-danger small">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <button type="submit" class="btn btn-success mb-2 mt-3">Update Profile</button>
    </form>
</div>
@endsection
