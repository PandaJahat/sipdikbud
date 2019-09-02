<?php

namespace App\Models\Integration\WebPuslitjak;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $connection = 'web-puslitjak';
        
    protected $table = 'berita';
    protected $fillable = [
        "id",
        "id_kategori",
        "deskripsi",
        "judul",
        "judul_link",
        "isi",
        "tanggal",
        "gambar",
        "video",
        "keyword",
        "created",
        "updated",
        "id_user",
        "is_active",
        "is_publish",
    ];

    public $timestamps = false;
}
