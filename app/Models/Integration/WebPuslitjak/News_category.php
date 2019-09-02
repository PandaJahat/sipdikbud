<?php

namespace App\Models\Integration\WebPuslitjak;

use Illuminate\Database\Eloquent\Model;

class News_category extends Model
{
    protected $connection = 'web-puslitjak';

    protected $table = 'ref_kategori_berita';
    protected $fillable = [
        "id",
        "nama",
        "is_active",
    ];

    public $timestamps = false;
}
