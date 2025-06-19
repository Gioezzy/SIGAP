<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PengaduanApiController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        return response()->json(Pengaduan::latest()->paginate(10));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'isi_pengaduan' => 'required|string',
            'kategori_id' => 'required|integer|exists:category_reports,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $pengaduan = Pengaduan::create([
            'judul' => $request->judul,
            'isi_pengaduan' => $request->isi_pengaduan,
            'kategori_id' => $request->kategori_id,
            'user_id' => Auth::id(),
            'status' => 'menunggu',
            'created_at' => now(),
        ]);

        return response()->json([
            'message' => 'Pengaduan berhasil dibuat',
            'data' => $pengaduan,
        ], 201);
    }

    public function show(Pengaduan $pengaduan)
    {
        return response()->json($pengaduan);
    }

    public function update(Request $request, Pengaduan $pengaduan)
    {
        $this->authorize('update', $pengaduan);

        $request->validate([
            'judul' => 'required|string|max:255',
            'isi_pengaduan' => 'required',
            'kategori_id' => 'required|integer',
        ]);

        $pengaduan->update($request->only(['judul', 'isi_pengaduan', 'kategori_id']));

        return response()->json([
            'message' => 'Pengaduan berhasil diperbarui',
            'data' => $pengaduan,
        ]);
    }

    public function destroy(Pengaduan $pengaduan)
    {
        $this->authorize('delete', $pengaduan);

        $pengaduan->delete();

        return response()->json(['message' => 'Pengaduan berhasil dihapus']);
    }
}
