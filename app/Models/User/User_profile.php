<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class User_profile extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = 'user_profiles';
    protected $fillable = [
        "user_id",
        "fullname",
        "date_of_birth",
        "place_of_birth",
        "province_id",
        "district_id",
        "subdistrict_id",
        "village_id",
        "address",
        "institute",
        "gender_id"
    ];

    public function gender()
    {
        return $this->belongsTo('App\Models\User\Gender', 'gender_id', 'id');
    }
}
