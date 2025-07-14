<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Http\Requests\users\KritikSaranStoreRequest;
use App\Http\Requests\users\KritikSaranUpdateRequest;
use App\Models\KritikSaran;
use Illuminate\Support\Facades\Auth;

class KritikSaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kritikSaran = KritikSaran::with('user')
            ->where('user_id', Auth::user()->id)
            ->latest()
            ->get();

        return view('users.kritiksaran.index', compact('kritikSaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kritiksaran = KritikSaran::all();

        return view('users.kritiksaran.create', compact('kritiksaran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KritikSaranStoreRequest $request)
    {
        $kritikSaran = new KritikSaran;
        $kritikSaran->user_id = Auth::user()->id;
        $kritikSaran->judul = $request->judul;
        $kritikSaran->isi = $request->isi;
        $kritikSaran->save();

        return redirect()->route('kritiksaran.index')
            ->with('success', 'Kritik dan Saran berhasil dikirim.');
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
        $kritiksaran = KritikSaran::findOrFail($id);

        return view('users.kritiksaran.edit', compact('kritiksaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KritikSaranUpdateRequest $request, $id)
    {
        $kritikSaran = KritikSaran::findOrFail($id);
        $kritikSaran->user_id = Auth::id();
        $kritikSaran->judul = $request->judul;
        $kritikSaran->isi = $request->isi;
        $kritikSaran->save();

        return redirect()->route('kritiksaran.index')
            ->with('success', 'Kritik dan Saran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kritiksaran = KritikSaran::findOrFail($id);
        $kritiksaran->delete();

        return redirect()->route('kritiksaran.index')->with('success', 'Kritik dan Saran berhasil dihapus.');
    }
}
