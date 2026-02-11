<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::first();
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'nullable|string',
            'about' => 'nullable|string',
            'email' => 'nullable|email',
            'linkedin' => 'nullable|string',
            'github' => 'nullable|string',
            'instagram' => 'nullable|string',
            'avatar' => 'nullable|file|image',
            'hero_background' => 'nullable|file|image',
        ]);

        $profile = Profile::first();

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')
                ->store('profile', 'public');
        }

        if ($request->hasFile('hero_background')) {
            $data['hero_background'] = $request->file('hero_background')
                ->store('profile', 'public');
        }

        if (!$profile) {
            Profile::create($data);
        } else {
            $profile->update($data);
        }

        return back()->with('success', 'Profile berhasil diperbarui');
    }
}
