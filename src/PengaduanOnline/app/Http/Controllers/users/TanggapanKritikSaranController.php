<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\TanggapanKritikSaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggapanKritikSaranController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $tanggapans = TanggapanKritikSaran::whereHas('kritiksaran', function ($query) use ($userId){
            $query->where('user_id', $userId);
        })->with('kritiksaran')->latest()->get();

        return view('users.tanggapankritiksaran.index', compact('tanggapans'));
    }
}
