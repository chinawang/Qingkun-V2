<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2019/1/13
 * Time: 16:00
 */

namespace App\Models\Expertise;

use Illuminate\Database\Eloquent\Model;


class ExpertiseModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'expertises';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
}
