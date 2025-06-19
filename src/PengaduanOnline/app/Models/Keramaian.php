<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Keramaian extends Model
{
    protected $fillable = [
        'user_id',
        'nama_acara',
        'lokasi_acara',
        'tanggal_acara',
        'waktu_acara',
        'status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tanggapanKeramaian()
    {
        return $this->hasOne(TanggapanKehilangan::class, 'id_kehilangan');
    }
}
