<?php

namespace App\Models\Collection;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    use SoftDeletes;

    protected $table = 'categories';
    protected $fillable = [
        "name"
    ];

    public function collections()
    {
        return $this->belongsToMany('App\Models\Collection\Collection', 'collection_category', 'category_id', 'collection_id');
    }
}
