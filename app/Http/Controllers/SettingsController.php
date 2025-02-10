<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    // ✅ Show the settings page
    public function index()
    {
        return view('settings.index');
    }

    // ✅ Update user profile (Fixed Version)
    public function updateProfile(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // ✅ Check if user is authenticated
        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'User not authenticated. Please log in.']);
        }

        // ✅ Validate input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        // ✅ Update user profile safely using save()
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save(); // 🔹 Ensures VS Code recognizes the method

        return redirect()->route('settings.index')->with('success', 'Profile updated successfully!');
    }

    // ✅ Change password (Fixed Version)
    public function changePassword(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // ✅ Check if user is authenticated
        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'User not authenticated. Please log in.']);
        }

        // ✅ Validate password inputs
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        // ✅ Check if the current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        // ✅ Change password safely using save()
        $user->password = Hash::make($request->new_password);
        $user->save(); // 🔹 Ensures VS Code recognizes the method

        return redirect()->route('settings.index')->with('success', 'Password changed successfully!');
    }
}
