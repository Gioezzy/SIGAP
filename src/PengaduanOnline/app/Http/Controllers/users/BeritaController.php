<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function home()
    {
        if (Auth::check() && Auth::user()->email_verified_at === null) {
            return redirect()->route('verification.notice');
        }
        $berita = Berita::where('status', 'published')->latest()->take(6)->get();

        return view('index', compact('berita'));
    }

    public function index()
    {
        if (Auth::check() && Auth::user()->email_verified_at === null) {
            return redirect()->route('verification.notice');
        }
        $berita = Berita::where('status', 'published')->latest()->paginate(9);

        return view('users.berita.index', compact('berita'));
    }

    public function show($slug)
    {
        if (Auth::check() && Auth::user()->email_verified_at === null) {
            return redirect()->route('verification.notice');
        }
        $berita = Berita::where('slug', $slug)->where('status', 'published')->firstOrFail();

        return view('users.berita.show', compact('berita'));
    }
}
