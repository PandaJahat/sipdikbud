<?php

namespace App\Models\Collection;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reviewer extends Model
{
    use SoftDeletes;

    protected $table = 'collection_reviewer';
    protected $fillable = [
        "collection_id",
        "user_id",
        "note",
    ];

    public function collection()
    {
        return $this->belongsTo('App\Models\Collection\Collection', 'collection_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function results()
    {
        return $this->hasMany('App\Models\Review\Result', 'collection_reviewer_id', 'id');
    }
}
