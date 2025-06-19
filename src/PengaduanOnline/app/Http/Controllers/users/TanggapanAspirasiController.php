<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\TanggapanAspirasi;
use Illuminate\Support\Facades\Auth;

class TanggapanAspirasiController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $tanggapans = TanggapanAspirasi::whereHas('aspirasi', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->with('aspirasi')->latest()->get();

        return view('users.tanggapanaspirasi.index', compact('tanggapans'));
    }
}
