<?php

namespace App\Models\Integration\Rekapin;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $connection = 'rekapin';

    protected $table = 'dbcollectiondetail';
    protected $fillable = [
        "id",
        "cat_id",
        "title_en",
        "alias_en",
        "fulltext_en",
        "finding_en",
        "policy_en",
        "title_id",
        "alias_id",
        "fulltext_id",
        "finding_id",
        "policy_id",
        "thumb_pt_en",
        "thumb_pt_id",
        "thumb_lc_en",
        "thumb_lc_id",
        "img",
        "dw_button",
        "dw_hint",
        "print_shared_button",
        "published",
        "embedcode",
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Integration\Rekapin\Category', 'cat_id', 'id');
    }
}
