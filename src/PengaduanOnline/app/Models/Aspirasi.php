<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Aspirasi extends Model
{
    protected $fillable = [
        'judul',
        'isi',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tanggapanAspirasi(): HasOne
    {
        return $this->hasOne(TanggapanAspirasi::class, 'id_aspirasi');
    }
}
