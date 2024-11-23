<?php

namespace App\Http\Controllers;

use App\Enums\AttendanceType;
use App\Http\Requests\AttendanceRequest;
use App\Models\Employee;
use App\Services\AttendanceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    protected $attendanceService;

    public function __construct(AttendanceService $attendanceService)
    {
        $this->attendanceService = $attendanceService;
    }

    /**
     * Tampilkan daftar kehadiran.
     */
    public function index(Request $request)
    {
        $user = Auth::guard('api')->user();
        if ($user->role === \App\Enums\RoleType::EMPLOYEE) {
            $attendances = $this->attendanceService->getEmployeeAttendances();
            $attendanceTypes = AttendanceType::getValues();

            return view('attendance.employee', compact('attendances', 'attendanceTypes'));
        } elseif ($user->role === \App\Enums\RoleType::ADMIN) {
            $filters = $request->only(['date', 'month', 'year']);
            $attendances = $this->attendanceService->getAdminAttendances($filters);

            return view('attendance.admin', compact('attendances'));
        }

        return redirect()->route('login')->with('error', 'Unauthorized access.');
    }

    /**
     * Simpan atau perbarui kehadiran.
     */
    public function store(AttendanceRequest $request)
    {
        try {
            $validated = $request->validated();
            $this->attendanceService->updateAttendance($validated);

            return redirect()->route('attendance.index')->with('success', 'Attendance updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', $e->getMessage());
        }
    }
}
