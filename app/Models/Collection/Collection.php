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
        "abstract_file",
        "document_file",
        "user_id",
        "is_active",
        "author_id",
        "language_id",
        "source_id",
        "code",
        "file_exist",
        "subjects"
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

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function source()
    {
        return $this->belongsTo('App\Models\Collection\Source', 'source_id', 'id');
    }

    public function downloads()
    {
        return $this->hasMany('App\Models\Collection\Download_log', 'collection_id', 'id');
    }
    
    public function institutions()
    {
        return $this->belongsToMany('App\Models\Collection\Institution', 'collection_institution', 'collection_id', 'institution_id')->withPivot('user_id');
    }

    public function getCategoryAttribute()
    {
        return $this->categories->first();
    }

    public function genres()
    {
        return $this->belongsToMany('App\Models\Collection\Genre', 'collection_genre', 'collection_id', 'genre_id');
    }

    public function topics()
    {
        return $this->belongsToMany('App\Models\Collection\Topic', 'collection_topic', 'collection_id', 'topic_id');
    }

    public function related_collections()
    {
        return $this->belongsToMany('App\Models\Collection\Collection', 'collection_related', 'first_collection_id', 'second_collection_id');
    }

    public function favorites()
    {
        return $this->belongsToMany('App\User', 'collection_user', 'collection_id', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Collection\Comment', 'collection_id', 'id');
    }
    
    public function reasons()
    {
        return $this->hasMany('App\Models\Download\Collection', 'collection_id', 'id');
    }

    public function reviewer()
    {
        return $this->hasOne('App\Models\Collection\Reviewer', 'collection_id', 'id');
    }

    public function visits()
    {
        return $this->hasMany('App\Models\Collection\Visit', 'collection_id', 'id');
    }
}
