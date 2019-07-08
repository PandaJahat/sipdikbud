<?php

namespace App\Models\Reference;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request extends Model
{
    use SoftDeletes;

    protected $table = 'reference_requests';
    protected $fillable = [
        "category_id",
        "data",
        "additional_data",
        "user_id",
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Reference\Request_category', 'category_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
