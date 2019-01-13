<?php

namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
}
