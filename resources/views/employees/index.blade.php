@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Employee List</h2>
    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Add Employee</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Birth Date</th>
                <th>City</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->user->email }}</td>
                    <td>{{ $employee->birth_of_date }}</td>
                    <td>{{ $employee->city }}</td>
                    <td>{{ $employee->user->status }}</td>
                    <td>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
