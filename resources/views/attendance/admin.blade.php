@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Employees' Attendance</h2>

    <form action="{{ route('attendance.index') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <input type="date" name="date" class="form-control" value="{{ request('date') }}" placeholder="Select Date">
            </div>
            <div class="col-md-3">
                <select name="month" class="form-control">
                    <option value="">Select Month</option>
                    @foreach (range(1, 12) as $month)
                        <option value="{{ $month }}" {{ request('month') == $month ? 'selected' : '' }}>
                            {{ \Carbon\Carbon::create()->month($month)->format('F') }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="year" class="form-control">
                    <option value="">Select Year</option>
                    @foreach (range(date('Y') - 10, date('Y')) as $year)
                        <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                            {{ $year }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->employee->name }}</td>
                    <td>{{ $attendance->date }}</td>
                    <td>{{ ucfirst(strtolower($attendance->status)) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No attendance records found for the selected filters.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
