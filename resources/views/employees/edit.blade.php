@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Employee</h2>
    
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $employee->user->name) }}" required>
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $employee->user->email) }}" required>
            @error('email')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="birth_of_date">Birth Date</label>
            <input type="date" name="birth_of_date" class="form-control" id="birth_of_date" value="{{ old('birth_of_date', $employee->birth_of_date) }}" required>
            @error('birth_of_date')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" class="form-control" id="city" value="{{ old('city', $employee->city) }}" required>
            @error('city')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                @foreach(\App\Enums\StatusType::getValues() as $status)
                    <option value="{{ $status }}" {{ old('status', $employee->user->status) === $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
            @error('status')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection
