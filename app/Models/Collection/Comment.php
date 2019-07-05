<?php

namespace App\Models\Collection;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $table = 'collection_comments';
    protected $fillable = [
        "collection_id",
        "user_id",
        "text",
    ];

    public function collection()
    {
        return $this->belongsTo('App\Models\Collection\Collection', 'collection_id', 'id');
    }
}
