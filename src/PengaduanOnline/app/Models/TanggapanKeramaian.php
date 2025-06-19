<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TanggapanKeramaian extends Model
{
    protected $fillable = [
        'id_keramaian',
        'user_id',
        'tanggapan',
    ];

    public function keramaian(): BelongsTo
    {
        return $this->belongsTo(Keramaian::class, 'id_keramaian');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
