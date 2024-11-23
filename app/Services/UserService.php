<?php

namespace App\Services;

use App\Enums\RoleType;
use App\Models\Employee;
use DB;
use Illuminate\Support\Facades\Auth;

class UserService
{
    /**
     * Mendapatkan data pengguna untuk form edit profil.
     *
     * @return array
     */
    public function getEditProfileData(): array
    {
        $user = Auth::user();
        $userDetail = Employee::find($user->id);
        $isAdmin = $user->role == RoleType::ADMIN;

        return compact('user', 'userDetail', 'isAdmin');
    }

    /**
     * Memperbarui profil pengguna.
     *
     * @param array $data
     * @return void
     */
    public function updateProfile(array $data): void
    {
        $user = Auth::user();
        $employee = Employee::find($user->id);

        DB::beginTransaction();

        try {
            $user->name = $data['name'];
            $user->email = $data['email'];

            if ($user->role != RoleType::ADMIN) {
                $employee->name = $data['name'];
                $employee->birth_of_date = $data['birth_of_date'];
                $employee->city = $data['city'];
            }

            if (!empty($data['password'])) {
                $user->password = bcrypt($data['password']);
            }

            $user->save();

            if ($user->role != RoleType::ADMIN) {
                $employee->save();
            }

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

}
