<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Logic\Project\ProjectLogic;
use App\Http\Validations\Project\ProjectValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    protected $projectLogic;

    protected $projectValidation;

    public function __construct(ProjectLogic $projectLogic,ProjectValidation $projectValidation)
    {
        $this->projectLogic = $projectLogic;
        $this->projectValidation = $projectValidation;
    }

    public function projectData($projectFlag)
    {
        $flag = 0;
        $conditions = [];

        if($projectFlag == "plan"){
            $flag = 1;
            $conditions = ['delete_process' => 0,'flag' => $flag];
        }
        elseif ($projectFlag == "architecture"){
            $flag = 2;
            $conditions = ['delete_process' => 0,'flag' => $flag];
        }

        $projects = $this->projectLogic->getAllProjectsBy($conditions);

        $param = ['projects' => $projects,'flag' => $flag];

        return view('front.online.project',$param);
    }

    public function projectInfo($projectID)
    {
        $project = $this->projectLogic->findProject($projectID);
        $param = ['project' => $project];
        return view('front.online.projectDetail',$param);
    }
}
