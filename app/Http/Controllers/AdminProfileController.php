<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AdminProfileController extends Controller
{
    /**
     * Display the admin's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Backend_Admin/Profile', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail, // Sesuaikan jika admin punya email verify
            'status' => session('status'),
            'admin' => Auth::guard('admin')->user(), // Ambil data admin
        ]);
    }

    /**
     * Update the admin's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email', // Sesuaikan table/model
        ]);

        $admin = Auth::guard('admin')->user();
        $admin->update($request->only('name', 'email'));

        if ($request->has('email') && $admin->isDirty('email')) {
            $admin->email_verified_at = null; // Reset verify jika email berubah
        }

        $admin->save();

        return Redirect::route('admin.profile.edit')->with('success', 'Profile updated successfully.');
    }

    /**
     * Delete the admin's account. (Hati-hati, ini destruktif)
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password:admin'], // Sesuaikan guard
        ]);

        $admin = Auth::guard('admin')->user();
        Auth::guard('admin')->logout();
        $admin->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/admin/login');
    }
}