<?php

namespace App\Http\Controllers\Auth;

use App\Enums\StatusType;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Services\AuthService;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        $result = $this->authService->login($credentials);

        if ($result['success']) {
            $request->session()->regenerate();
            return redirect()->intended('attendance');
        }

        return redirect()->back()
            ->withErrors(['login_error' => $result['message']])
            ->withInput();
    }

    public function logout()
    {
        $this->authService->logout();
        return redirect('/login');
    }

}
