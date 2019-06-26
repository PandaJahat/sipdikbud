<?php

namespace App\Models\Collection;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use SoftDeletes;

    protected $table = 'genres';
    protected $fillable = [
        "name"
    ];

    public function collections()
    {
        return $this->belongsToMany('App\Models\Collection\Collection', 'collection_genre', 'genre_id', 'collection_id');
    }
}
