<?php

namespace App\Services;

use App\Enums\StatusType;
use App\Models\User;
use Http;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthService
{
    protected $apiBaseUrl;

    public function __construct()
    {
        $this->apiBaseUrl = env('BASE_URL_API', 'http://127.0.0.1:8000/api');
    }

    /**
     * Proses login pengguna.
     *
     * @param array $credentials
     * @return array
     */
    public function login(array $credentials): array
    {
        $response = Http::post("{$this->apiBaseUrl}/login", $credentials);

        if ($response->successful()) {
            $token = $response->json()['token'];
            Session::put('api_token', $token);

            return [
                'success' => true,
                'token' => $token,
            ];
        }

        return [
            'success' => false,
            'message' => $response->json()['message'] ?? 'Login failed. Please try again.',
        ]; 
    }

    /**
     * Proses logout pengguna.
     */
    public function logout()
    {
        $token = Session::get('api_token');

        if ($token) {
            $response = Http::withToken($token)->post("{$this->apiBaseUrl}/logout");

            if ($response->successful()) {
                Session::forget('api_token');
                return ['success' => true];
            }
        }

        return [
            'success' => false,
            'message' => 'Failed to logout. Please try again.',
        ];
    }

}
