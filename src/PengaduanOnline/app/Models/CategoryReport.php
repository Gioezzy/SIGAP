<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryReport extends Model
{
    protected $fillable = [
        'namaKategori',
        'slug',
        'deskripsi',
    ];

}
