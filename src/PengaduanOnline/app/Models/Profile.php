<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Profile extends Model
{
    protected $fillable = [
        'nama',
        'alamat',
        'kontak',
        'deskripsi',
        'gambar',
        'status',
        'slug',
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function getImageUrlAttribute()
    {
        return $this->gamber ? asset('storage/'.$this->gambar) : null;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($profile) {
            if (empty($profile->slug) && ! empty($profile->nama)) {
                $profile->slug = Str::slug($profile->nama);

                // buat slug unik
                $counter = 1;
                $originalSlug = $profile->slug;
                while (static::where('slug', $profile->slug)->exists()) {
                    $profile->slug = $originalSlug.'-'.$counter;
                    $counter++;
                }
            }
        });
    }
}
