<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Profile;

class ProfilesController extends Controller
{
    public function index()
    {
        $profile = Profile::where('status', 'published')->latest()->take(6)->get();

        return view('users.profile.index', compact('profile'));
    }

    public function show($slug)
    {
        $profile = Profile::where('slug', $slug)->where('status', 'published')->firstOrFail();

        return view('users.profile.show', compact('profile'));
    }
}
