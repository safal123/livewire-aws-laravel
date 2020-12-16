<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function profileImage(Request $request)
    {
        $this->validate($request, [
            'profile' => 'required|image',
        ]);
        $path = $request->file('profile')->store('profile_pics', 's3');
        Storage::disk('s3')->setVisibility($path, 'public');
        $profile = auth()->user()->profile;
        $profile->image = basename($path);
        $profile->image_url = Storage::disk('s3')->url($path);
        $profile->save();
        Session::flash('success', 'Profile picture updated successfully.');
        return back();
    }
}
