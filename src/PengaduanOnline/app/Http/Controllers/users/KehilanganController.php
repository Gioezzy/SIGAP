<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Http\Requests\users\KehilanganStoreRequest;
use App\Http\Requests\users\KehilanganUpdateRequest;
use App\Models\Kehilangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KehilanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kehilangan = Kehilangan::with('user')
        ->where('user_id', Auth::id())
        ->latest()
        ->get();

        return view('users.kehilangan.index', compact('kehilangan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kehilangan = Kehilangan::all();
        return view('users.kehilangan.create', compact('kehilangan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KehilanganStoreRequest $request)
    {
        $kehilangan = new Kehilangan();
        $kehilangan->user_id = Auth::id();
        $kehilangan->nama_barang = $request->nama_barang;
        $kehilangan->lokasi_hilang = $request->lokasi_hilang;
        $kehilangan->deskripsi = $request->deskripsi;
        $kehilangan->tanggal_hilang = $request->tanggal_hilang;

        if ($request->hasFile('foto')) {
            $kehilangan->foto = $request->file('foto')->store('kehilangan', 'public');
        }

        $kehilangan->save();

        return redirect()->route('kehilangan.index');
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
        $kehilangan = Kehilangan::findOrFail($id);
        return view('users.kehilangan.edit', compact('kehilangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KehilanganUpdateRequest $request, Kehilangan $kehilangan)
    {
        $kehilangan->user_id = Auth::id();
        $kehilangan->nama_barang = $request->nama_barang;
        $kehilangan->lokasi_hilang = $request->lokasi_hilang;
        $kehilangan->deskripsi = $request->deskripsi;
        $kehilangan->tanggal_hilang = $request->tanggal_hilang;
        $kehilangan->status = $request->status;

        if ($request->hasFile('foto')) {
            $kehilangan->foto = $request->file('foto')->store('kehilangan', 'public');
        }

        $kehilangan->save();

        return redirect()->route('kehilangan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kehilangan = Kehilangan::findOrFail($id);
        $kehilangan->delete();

        return redirect()->route('kehilangan.index')->with('success', 'Data kehilangan berhasil dihapus.');
    }
}
