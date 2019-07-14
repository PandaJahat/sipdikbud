<?php

namespace App\Models\Collection;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visit extends Model
{
    use SoftDeletes;

    protected $table = 'collection_visits';
    protected $fillable = [
        "collection_id",
        "user_id",
        "previous_url",
    ];

    public function collection()
    {
        return $this->belongsTo('App\Models\Collection\Collection', 'collection_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
