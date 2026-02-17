<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if (!$user) {
            // Fallback for development if not authenticated
            $user = \App\Models\User::first();
        }
        return view('admin.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            $user = \App\Models\User::first();
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'location' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            // 'social_github' => 'nullable|url',
            // 'social_linkedin' => 'nullable|url',
            // 'social_twitter' => 'nullable|url',
            // 'social_facebook' => 'nullable|url',
            // 'social_instagram' => 'nullable|url',
            'company_name' => 'nullable|string|max:255',
            'website' => 'nullable|url',
            'years_experience' => 'nullable|integer',
            'completed_projects' => 'nullable|integer',
            'availability' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('avatar');

        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $path = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $path;
        }

        $user->update($data);

        return back()->with('success', 'Profil mis à jour avec succès.');
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            $user = \App\Models\User::first();
        }

        $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Mot de passe mis à jour avec succès.');
    }
}
