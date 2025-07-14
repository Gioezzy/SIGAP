<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Http\Requests\users\AspirasiStoreRequest;
use App\Http\Requests\users\AspirasiUpdateRequest;
use App\Models\Aspirasi;
use Illuminate\Support\Facades\Auth;

class AspirasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aspirasi = Aspirasi::with('user')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('users.aspirasi.index', compact('aspirasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $aspirasi = Aspirasi::aLL();

        return view('users.aspirasi.create', compact('aspirasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AspirasiStoreRequest $request)
    {
        $aspirasi = new Aspirasi;
        $aspirasi->user_id = Auth::id();
        $aspirasi->judul = $request->judul;
        $aspirasi->isi = $request->isi;
        $aspirasi->save();

        return redirect()->route('aspirasi.index')
            ->with('success', 'Aspirasi berhasil dikirim.');
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
        $aspirasi = Aspirasi::findOrFail($id);

        return view('users.aspirasi.edit', compact('aspirasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AspirasiUpdateRequest $request, aspirasi $aspirasi)
    {
        $aspirasi->user_id = Auth::id();
        $aspirasi->judul = $request->judul;
        $aspirasi->isi = $request->isi;
        $aspirasi->save();

        return redirect()->route('aspirasi.index')
            ->with('success', 'Aspirasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aspirasi = Aspirasi::findOrFail($id);
        $aspirasi->delete();

        return redirect()->route('aspirasi.index')->with('success', 'Aspirasi berhasil dihapus.');
    }
}
