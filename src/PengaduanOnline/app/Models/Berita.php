<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'judul',
        'isiBerita',
        'gambar',
        'status',
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function getImageUrlAttribute()
    {
        return $this->gambar ? asset('storage/' . $this->gambar) : null;
    }
}
