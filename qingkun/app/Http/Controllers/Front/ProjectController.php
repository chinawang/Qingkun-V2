<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Logic\Project\ProjectLogic;
use App\Http\Logic\Provence\ProvenceLogic;
use App\Http\Logic\Type\TypeLogic;
use App\Http\Validations\Project\ProjectValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ProjectController extends Controller
{
    protected $projectLogic;
    protected $provenceLogic;
    protected $typeLogic;

    protected $projectValidation;

    public function __construct(ProjectLogic $projectLogic,ProvenceLogic $provenceLogic,TypeLogic $typeLogic,
                                ProjectValidation $projectValidation)
    {
        $this->projectLogic = $projectLogic;
        $this->provenceLogic = $provenceLogic;
        $this->typeLogic = $typeLogic;
        $this->projectValidation = $projectValidation;
    }

    public function typeData()
    {
        $types = $this->typeLogic->getAllTypes();

        $param = ['types' => $types];

        return view('front.online.projectType',$param);
    }

    public function projectData()
    {
        $typeID = Input::get('type_id', 0);
        $provenceID = Input::get('provence_id', 0);

        if($typeID == 0 && $provenceID == 0)
        {
            $projects = $this->projectLogic->getAllProjects();
            $count = DB::table('projects')
                ->where(['projects.delete_process'=>0])
                ->count();
        }
        elseif ($typeID == 0 && $provenceID != 0)
        {
            $conditions = ['delete_process' => 0,'provence' => $provenceID];
            $projects = $this->projectLogic->getAllProjectsBy($conditions);
            $count = DB::table('projects')
                ->where(['projects.delete_process'=>0,'projects.provence' => $provenceID])
                ->count();
        }
        elseif ($typeID != 0 && $provenceID == 0)
        {
            $projects = DB::table('projects')
                ->join('project_types','projects.id','=','project_types.project_id')
                ->where(['projects.delete_process'=>0,'project_types.type_id'=>$typeID])
                ->get();
            $count = DB::table('projects')
                ->join('project_types','projects.id','=','project_types.project_id')
                ->where(['projects.delete_process'=>0,'project_types.type_id'=>$typeID])
                ->count();
        }
        else
        {
            $projects = DB::table('projects')
                ->join('project_types','projects.id','=','project_types.project_id')
                ->where(['projects.delete_process'=>0,'projects.provence'=>$provenceID,'project_types.type_id'=>$typeID])
                ->get();
            $count = DB::table('projects')
                ->join('project_types','projects.id','=','project_types.project_id')
                ->where(['projects.delete_process'=>0,'projects.provence' => $provenceID,'project_types.type_id'=>$typeID])
                ->count();
        }

        foreach ($projects as $project) {
            $assignTypeIDs = $this->projectLogic->getTypeIDsByProjectID($project['id']);
            $assignTypes = $this->typeLogic->getTypesByIDs($assignTypeIDs);
            $provence = $this->provenceLogic->findProvence($project['provence']);

            $project['provence_name'] = $provence['name'];
            $project['assignTypes'] = $assignTypes;
        }

        $param = ['projects' => $projects,'count' => $count,'type' => $typeID,'provence' => $provenceID];

        return view('front.online.project',$param);
    }

    public function projectInfo($projectID)
    {
        $project = $this->projectLogic->findProject($projectID);
        $assignTypeIDs = $this->projectLogic->getTypeIDsByProjectID($project['id']);
        $assignTypes = $this->typeLogic->getTypesByIDs($assignTypeIDs);
        $project['assignTypes'] = $assignTypes;

        $provence = $this->provenceLogic->findProvence($project['provence']);
        $project['provence_name'] = $provence['name'];

        $param = ['project' => $project];
        return view('front.online.projectDetail',$param);
    }
}
