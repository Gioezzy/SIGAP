<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->email_verified_at === null) {
            return redirect()->route('verification.notice');
        }
        $profile = Profile::where('status', 'published')->latest()->take(6)->get();

        return view('users.profile.index', compact('profile'));
    }

    public function show($slug)
    {
        if (Auth::check() && Auth::user()->email_verified_at === null) {
            return redirect()->route('verification.notice');
        }
        $profile = Profile::where('slug', $slug)->where('status', 'published')->firstOrFail();

        return view('users.profile.show', compact('profile'));
    }
}
