<?php

namespace App\Models\Integration\WebPuslitjak;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $connection = 'web-puslitjak';

    protected $table = 'buku';
    protected $fillable = [
        "id",
        "id_bidang",
        "cover",
        "judul",
        "tahun_terbit",
        "deskripsi",
        "gambar",
        "berkas",
        "id_user",
        "created",
        "updated",
    ];

    public $timestamps = false;
}
