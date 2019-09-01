<?php

namespace App\Models\Article;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    
    protected $table = 'article_categories';
    protected $fillable = [
        "name"
    ];

    public function articles()
    {
        return $this->hasMany('App\Models\Article\Article', 'category_id', 'id');
    }
}
