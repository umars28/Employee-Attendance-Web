<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Attendance System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('attendance.index', 'attendance.store') ? 'active' : '' }}" href="{{ route('attendance.index') }}">Attendance</a>
                </li>
                @if (Auth::guard('api')->check() && Auth::guard('api')->user()->role === 'ADMIN')
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('employees.index', 'employees.create', 'employees.edit', 'employees.update') ? 'active' : '' }}" href="{{ route('employees.index') }}">Employee</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('profile.edit', 'profile.update') ? 'active' : '' }}" href="{{ route('profile.edit') }}">Profile</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @if (Auth::guard('api')->check())
                    <form method="POST" action="{{ route('logout') }}" class="d-flex">
                        @csrf
                        <button type="submit" class="btn btn-outline-light">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
                @endif

            </ul>
        </div>
    </div>
</nav>