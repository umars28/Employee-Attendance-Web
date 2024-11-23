<?php

namespace App\Services;

use App\Enums\StatusType;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    /**
     * Proses login pengguna.
     *
     * @param array $credentials
     * @return array
     */
    public function login(array $credentials): array
    {
        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return ['success' => false, 'message' => 'Email not found.'];
        }

        if ($user->status !== StatusType::ACTIVE) {
            return ['success' => false, 'message' => 'Your account is not active.'];
        }

        if (Auth::attempt($credentials)) {
            return ['success' => true];
        }

        return ['success' => false, 'message' => 'Invalid email or password.'];
    }

    /**
     * Proses logout pengguna.
     */
    public function logout(): void
    {
        Auth::logout();
    }
}
