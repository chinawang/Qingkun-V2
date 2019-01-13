<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2019/1/13
 * Time: 22:16
 */

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Logic\Expertise\ExpertiseLogic;
use App\Http\Validations\Expertise\ExpertiseValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ExpertiseController extends Controller
{
    protected $expertiseLogic;

    protected $expertiseValidation;

    public function __construct(ExpertiseLogic $expertiseLogic,ExpertiseValidation $expertiseValidation)
    {
        $this->expertiseLogic = $expertiseLogic;
        $this->expertiseValidation = $expertiseValidation;
    }

    public function expertiseDatasByType($type)
    {
        $conditions = [];

        $conditions = ['delete_process' => 0,'type' => $type];

        $expertises = $this->expertiseLogic->getAllExpertisesBy($conditions);

        $param = ['expertises' => $expertises,'type' => $type];

        return view('front.online.expertise',$param);
    }

}