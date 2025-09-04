<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    protected $fillable = [
        'judul',
        'slug',
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
        return $this->gambar ? asset('storage/'.$this->gambar) : null;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($berita) {
            if (empty($berita->slug) && ! empty($berita->judul)) {
                $berita->slug = Str::slug($berita->judul);

                // Pastikan unique
                $counter = 1;
                $originalSlug = $berita->slug;

                while (static::where('slug', $berita->slug)->exists()) {
                    $berita->slug = $originalSlug.'-'.$counter;
                    $counter++;
                }
            }
        });
    }
}
