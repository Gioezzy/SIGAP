<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kehilangan extends Model
{
    protected $fillable = [
        'user_id',
        'nama_barang',
        'lokasi_hilang',
        'deskripsi',
        'tanggal_hilang',
        'foto',
        'status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tanggapanKehilangan()
    {
        return $this->hasOne(TanggapanKehilangan::class, 'id_kehilangan');
    }
}
