<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class KritikSaran extends Model
{
    protected $fillable = [
        'user_id',
        'judul',
        'isi',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tanggapanKritikSaran(): HasOne
    {
        return $this->hasOne(TanggapanKritikSaran::class, 'id_kritiksaran');
    }

}
