<?php

namespace App\Models\Integration\WebPuslitjak;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $connection = 'web-puslitjak';

    protected $table = 'bidang';
    protected $fillable = [
        "id",
        "nama",
        "deskripsi",
        "gambar",
        "icon",
        "link_front",
        "created",
        "updated",
    ];

    public $timestamps = false;
}
