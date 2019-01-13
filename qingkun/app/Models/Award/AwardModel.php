<?php

namespace App\Models\Award;

use Illuminate\Database\Eloquent\Model;

class AwardModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'awards';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
}
