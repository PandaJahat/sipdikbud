<?php

namespace App\Models\Integration\Rekapin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $connection = 'rekapin';

    protected $table = 'dbcatcollection';
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
        "created_user",
        "Created_Date",
        "update_user",
        "Updated_Date",
        "Deleted_Date",
        "published",
    ];
}
