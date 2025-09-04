<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TanggapanKritikSaran extends Model
{
    protected $fillable = [
        'id_kritiksaran',
        'user_id',
        'tanggapan',
    ];

    public function kritikSaran(): BelongsTo
    {
        return $this->belongsTo(KritikSaran::class, 'id_kritiksaran');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
