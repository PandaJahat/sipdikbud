<?php

namespace App\Models\Collection;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Model
{
    use SoftDeletes;

    protected $table = 'collections';
    protected $fillable = [
        "title",
        "published_by",
        "published_year",
        "description",
        "cover_file",
        "document_file",
        "user_id",
        "is_active",
        "author_id",
        "language_id",
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Collection\Category', 'collection_category', 'collection_id', 'category_id');
    }

    public function keywords()
    {
        return $this->hasMany('App\Models\Collection\Keyword', 'collection_id', 'id');
    }

    public function language()
    {
        return $this->belongsTo('App\Models\Collection\Language', 'language_id', 'id');
    }

    public function author()
    {
        return $this->belongsTo('App\Models\Collection\Author', 'author_id', 'id');
    }
}
