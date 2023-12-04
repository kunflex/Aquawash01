<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        
        $user = $request->user();
        $userData = $request->validated();

        // Check if a new profile picture is uploaded
        if ($request->hasFile('profile')) {
            // Store the uploaded file and get the path
            $path = $request->file('profile')->store('profile_pictures', 'public');

            // Delete the old profile picture if exists
            if ($user->profile) {
                Storage::disk('public')->delete($user->profile);
            }

            // Update the user's profile column with the new path
            $user->profile = $path;
        }

        // Update other user information
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        Alert::success('Profile Update', 'Profile Updated Successfully');
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


/**
 * Update the user's profile information.
 */


   
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
