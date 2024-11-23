@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-2">Update Attendance for Today</h3>
    <form action="{{ route('attendance.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                @foreach ($attendanceTypes as $type)
                    <option value="{{ $type }}">{{ ucfirst(strtolower($type)) }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-2 mb-3">Submit</button>
    </form>
    <h2>My Attendance</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->date }}</td>
                    <td>{{ ucfirst($attendance->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
