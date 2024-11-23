<?php

namespace App\Http\Controllers\Auth;

use App\Enums\StatusType;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Services\AuthService;
use Auth;
use Http;
use Illuminate\Http\Request;
use Session;

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
            return redirect()->intended('attendance');
        } else {
            return redirect()
                ->back()
                ->withErrors(['login_error' => $result['message']])
                ->withInput();
        }
    }

    public function logout()
    {
        $result = $this->authService->logout();

        if ($result['success']) {
            return redirect()->route('login');
        }

        return redirect()
            ->route('login')
            ->with('error', $result['message']);    
    }

}
