<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\TanggapanKeramaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggapanKeramaianController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $tanggapans = TanggapanKeramaian::whereHas('keramaian', function($query) use ($userId){
            $query->where('user_id', $userId);
        })->with('keramaian')->latest()->paginate(5);

        return view('users.tanggapankeramaian.index', compact('tanggapans'));
    }
}
