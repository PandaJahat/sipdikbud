<?php

namespace App\Models\Review;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'collection_review_results';
    protected $fillable = [
        "collection_reviewer_id",
        "status",
        "note",
    ];

    public function reviewer()
    {
        return $this->belongsTo('App\Models\Collection\Reviewer', 'collection_reviewer_id', 'id');
    }
}
