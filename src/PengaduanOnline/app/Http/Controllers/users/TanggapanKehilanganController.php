<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\TanggapanKehilangan;
use Illuminate\Support\Facades\Auth;

class TanggapanKehilanganController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $tanggapans = TanggapanKehilangan::whereHas('kehilangan', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->with('kehilangan')->latest()->paginate(5);

        return view('users.tanggapankehilangan.index', compact('tanggapans'));
    }
}
