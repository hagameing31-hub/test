<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::firstOrCreate(
            ['id' => 1],
            ['name' => 'Your Name', 'job_title' => 'Your Job Title']
        );
        
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = Profile::firstOrFail();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'job_title' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
            'about_text' => 'nullable|string',
        ]);

        $profile->update($validated);
        
        return redirect()->route('admin.profile.edit')->with('success', 'Profile updated successfully.');
    }
}
