<?php

namespace App\Models\Banner;

use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'banners';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
}
