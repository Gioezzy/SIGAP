<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Http\Requests\users\KeramaianStoreRequest;
use App\Http\Requests\users\KeramaianUpdateRequest;
use App\Models\Keramaian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class KeramaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keramaian = Keramaian::with('user')->where('user_id', Auth::id())->latest()->get();

        return view('users.keramaian.index', compact('keramaian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $keramaian = Keramaian::all();

        return view('users.keramaian.create', compact('keramaian'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KeramaianStoreRequest $request)
    {
        $keramaian = new Keramaian;
        $keramaian->user_id = Auth::id();
        $keramaian->nama_acara = $request->nama_acara;
        $keramaian->lokasi_acara = $request->lokasi_acara;
        $keramaian->tanggal_acara = $request->tanggal_acara;
        $keramaian->waktu_acara = $request->waktu_acara;
        $keramaian->status = 'menunggu';

        $keramaian->save();

        return redirect()->route('keramaian.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $keramaian = Keramaian::findOrFail($id);

        return view('users.keramaian.edit', compact('keramaian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KeramaianUpdateRequest $request, Keramaian $keramaian)
    {
        $input = $request->only([
            'nama_acara',
            'lokasi_acara',
            'tanggal_acara',
        ]);

        $input['user_id'] = Auth::id();

        if ($request->filled('waktu_acara')) {
            $input['waktu_acara'] = $request->waktu_acara;
        }

        $keramaian->fill($input);
        $keramaian->save();

        return redirect()->route('keramaian.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $keramaian = Keramaian::findOrFail($id);
        $keramaian->delete();

        return redirect()->route('keramaian.index');
    }
}
