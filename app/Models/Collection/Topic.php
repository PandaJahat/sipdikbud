<?php

namespace App\Models\Collection;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use SoftDeletes;

    protected $table = 'topics';
    protected $fillable = [
        "topic"
    ];

    public function collections()
    {
        return $this->belongsToMany('App\Models\Collection\Collection', 'collection_topic', 'topic_id', 'collection_id');
    }
}
