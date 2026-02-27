<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateProfileRequest;
use App\Http\Requests\Admin\UpdatePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index', ['user' => auth()->user()]);
    }

    public function update(UpdateProfileRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('profile_picture')) {
            if (auth()->user()->profile_picture) {
                Storage::delete(auth()->user()->profile_picture);
            }
            $data['profile_picture'] = $request->file('profile_picture')->store('profiles', 'public');
        }
        auth()->user()->update($data);
        return redirect()->route('admin.profile.index')->with('success', 'Profile updated successfully.');
    }

    public function showChangePasswordForm()
    {
        return view('admin.profile.change-password');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }
        auth()->user()->update(['password' => Hash::make($request->password)]);
        return redirect()->route('admin.profile.index')->with('success', 'Password updated successfully.');
    }
}