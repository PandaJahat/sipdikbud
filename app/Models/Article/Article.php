<?php

namespace App\Models\Article;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $table = 'articles';
    protected $fillable = [
        "title",
        "category_id",
        "content",
        "thumbnail_file",
        "user_id",
        "author",
        "archived_at",
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Article\Category', 'category_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
