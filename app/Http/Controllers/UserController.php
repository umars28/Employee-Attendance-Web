<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Menampilkan form edit profil.
     */
    public function edit()
    {
        $profileData = $this->userService->getEditProfileData();
        return view('profile.edit', $profileData);
    }

    /**
     * Memperbarui profil pengguna.
     */
    public function update(UpdateProfileRequest $request)
    {
        $validatedData = $request->validated();
        $this->userService->updateProfile($validatedData);

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
}
