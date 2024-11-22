@extends('templates.app')

@section('content')
    <div class="row">
        <!-- Attendance List -->
        <div class="col-md-12">
            <h2 class="mb-4">Attendance List</h2>
            <table class="table table-striped table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Employee Name</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>2024-11-22</td>
                        <td>Present</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jane Smith</td>
                        <td>2024-11-22</td>
                        <td>Sick</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Michael Brown</td>
                        <td>2024-11-22</td>
                        <td>Leave</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
