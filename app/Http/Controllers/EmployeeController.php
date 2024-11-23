<?php

namespace App\Http\Controllers;

use App\Enums\RoleType;
use App\Enums\StatusType;
use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Services\EmployeeService;

class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    /**
     * Menampilkan daftar employee.
     */
    public function index()
    {
        $employees = $this->employeeService->getAllEmployees();
        return view('employees.index', compact('employees'));
    }

    /**
     * Tampilkan form untuk menambahkan employee.
     */
    public function create()
    {
        $statuses = StatusType::getValues();
        $roles = RoleType::getValues();
        return view('employees.create', compact('statuses', 'roles'));
    }

    /**
     * Simpan data employee baru.
     */
    public function store(CreateEmployeeRequest $request)
    {
        $validated = $request->validated();
        $this->employeeService->createEmployee($validated);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Tampilkan form untuk mengedit employee.
     */
    public function edit(Employee $employee)
    {
        $statuses = StatusType::getValues();
        $roles = RoleType::getValues();
        return view('employees.edit', compact('employee', 'statuses', 'roles'));
    }

    /**
     * Update data employee.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $validated = $request->validated();
        $this->employeeService->updateEmployee($employee, $validated);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }
}
