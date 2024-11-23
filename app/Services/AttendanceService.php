<?php

namespace App\Services;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class AttendanceService
{
    /**
     * Ambil semua kehadiran karyawan saat ini.
     *
     * @return Collection
     */
    public function getEmployeeAttendances(): Collection
    {
        $user = Auth::user();
        $employee = Employee::find($user->id);

        return Attendance::where('employee_id', $employee->id)->get();
    }

    /**
     * Ambil semua kehadiran untuk admin dengan filter opsional.
     *
     * @param array $filters
     * @return Collection
     */
    public function getAdminAttendances(array $filters): Collection
    {
        $query = Attendance::query();

        if (!empty($filters['date'])) {
            $query->whereDate('date', $filters['date']);
        }

        if (!empty($filters['month'])) {
            $query->whereMonth('date', $filters['month']);
        }

        if (!empty($filters['year'])) {
            $query->whereYear('date', $filters['year']);
        }

        return $query->with('employee')->get();
    }

    /**
     * Buat atau perbarui kehadiran karyawan.
     *
     * @param array $data
     * @return Attendance
     */
    public function updateAttendance(array $data): Attendance
    {
        $user = Auth::user();
        $employee = Employee::find($user->id);

        if ($user->role !== \App\Enums\RoleType::EMPLOYEE) {
            throw new \Exception('Unauthorized action.');
        }

        $attendance = Attendance::firstOrNew([
            'employee_id' => $employee->id,
            'date' => now()->format('Y-m-d'),
        ]);

        $attendance->status = $data['status'];
        $attendance->save();

        return $attendance;
    }
}
