<?php

namespace App\Services;

use App\Enums\RoleType;
use App\Models\Employee;
use App\Models\User;
use DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class EmployeeService
{
    /**
     * Ambil semua data employee.
     *
     * @return Collection
     */
    public function getAllEmployees(): Collection
    {
        return Employee::with('user')->orderByDesc('id')->get();
    }

    /**
     * Buat employee baru.
     *
     * @param array $data
     * @return void
     */
    public function createEmployee(array $data): void
    {
        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['email']),
                'role' => RoleType::EMPLOYEE,
                'status' => $data['status'],
                'created_date' => now(),
            ]);

            Employee::create([
                'name' => $data['name'],
                'user_id' => $user->id,
                'birth_of_date' => $data['birth_of_date'],
                'city' => $data['city'],
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e; 
        }
    }

    /**
     * Perbarui data employee.
     *
     * @param Employee $employee
     * @param array $data
     * @return void
     */
    public function updateEmployee(Employee $employee, array $data): void
    {
        DB::beginTransaction();

        try {
            $employee->user->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'status' => $data['status'],
            ]);

            $employee->update([
                'name' => $data['name'],
                'birth_of_date' => $data['birth_of_date'],
                'city' => $data['city'],
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

}
