<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TanggapanKehilangan extends Model
{
    protected $fillable = [
        'id_kehilangan',
        'user_id',
        'tanggapan',
    ];

    public function kehilangan(): BelongsTo
    {
        return $this->belongsTo(Kehilangan::class, 'id_kehilangan');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
