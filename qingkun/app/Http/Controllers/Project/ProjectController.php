<?php

namespace App\Http\Controllers\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Logic\Project\ProjectLogic;
use App\Http\Logic\Provence\ProvenceLogic;
use App\Http\Logic\Type\TypeLogic;
use App\Http\Validations\Project\ProjectValidation;
use App\Http\Validations\Project\ProjectTypeValidation;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    protected $projectLogic;
    protected $provenceLogic;
    protected $typeLogic;

    protected $projectValidation;
    protected $projectTypeValidation;

    public function __construct(ProjectLogic $projectLogic,ProvenceLogic $provenceLogic,TypeLogic $typeLogic,
                                ProjectValidation $projectValidation,ProjectTypeValidation $projectTypeValidation)
    {
        $this->middleware('auth');

        $this->projectLogic = $projectLogic;
        $this->provenceLogic = $provenceLogic;
        $this->typeLogic = $typeLogic;
        $this->projectValidation = $projectValidation;
        $this->projectTypeValidation = $projectTypeValidation;
    }

    /**
     * 显示添加窗口
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAddProjectForm()
    {
        $provences = $this->provenceLogic->getAllProvences();
        $types = $this->typeLogic->getAllTypes();
        $param = ['provences' => $provences,'types' => $types];
        return view('project.addProject',$param);
    }

    /**
     * 显示编辑窗口
     *
     * @param $employeeID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUpdateProjectForm($projectID)
    {
        $project = $this->projectLogic->findProject($projectID);
        $provences = $this->provenceLogic->getAllProvences();
        $types = $this->typeLogic->getAllTypes();
        $assignTypeIDs = $this->projectLogic->getTypeIDsByProjectID($projectID);

        $param = ['project' => $project,'provences' => $provences,'types' => $types,'assignTypeIDs' => $assignTypeIDs];
        return view('project.updateProject',$param);
    }

    public function showProjectForm($projectID)
    {
        $project = $this->projectInfo($projectID);
        $param = ['project' => $project];
        return view('project.info',$param);
    }

    /**
     * 查询信息
     *
     * @param $employeeID
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function projectInfo($projectID)
    {
        $project = $this->projectLogic->findProject($projectID);
        $assignTypeIDs = $this->projectLogic->getTypeIDsByProjectID($project['id']);
        $assignTypes = $this->typeLogic->getTypesByIDs($assignTypeIDs);
        $project['assignTypes'] = $assignTypes;

        $provence = $this->provenceLogic->findProvence($project['provence']);
        $project['provence_name'] = $provence['name'];

        return $project;
    }

    /**
     * 分页查询列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function projectList()
    {
        $input = $this->projectValidation->projectPaginate();

        $cursorPage      = array_get($input, 'cursor_page', null);
        $orderColumn     = array_get($input, 'order_column', 'id');
        $orderDirection  = array_get($input, 'order_direction', 'asc');
        $pageSize        = array_get($input, 'page_size', 500);
        $projectPaginate = $this->projectLogic->getProjects($pageSize,$orderColumn,$orderDirection,$cursorPage);

        foreach ($projectPaginate as $project) {
            $assignTypeIDs = $this->projectLogic->getTypeIDsByProjectID($project['id']);
            $assignTypes = $this->typeLogic->getTypesByIDs($assignTypeIDs);
            $provence = $this->provenceLogic->findProvence($project['provence']);

            $project['provence_name'] = $provence['name'];
            $project['assignTypes'] = $assignTypes;
        }

        $param = ['projects' => $projectPaginate];

        //记录Log
        app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '查看了项目信息']);

        return view('project.list',$param);
    }

    /**
     * 新增
     *
     * @return bool|\Illuminate\Database\Eloquent\Model
     */
    public function storeNewProject()
    {
        $input = $this->projectValidation->storeNewProject();

        $inputType = $this->projectTypeValidation->setProjectType();

        $typeIDs = $inputType['types'];

        $projectID = $this->projectLogic->insertGetID($input);

        $result = $this->projectLogic->setProjectTypes($projectID,$typeIDs);

        if($result)
        {
            session()->flash('flash_message', [
                'title'     => '保存成功!',
                'message'   => '',
                'level'     => 'success'
            ]);



            //记录Log
            app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '新增了项目信息']);

            return redirect('/project/lists');
        }
        else
        {
            session()->flash('flash_message_overlay', [
                'title'     => '保存失败!',
                'message'   => '数据未保存成功,请稍后重试!',
                'level'     => 'error'
            ]);
            return redirect()->back();
        }
    }

    /**
     * 编辑
     *
     * @param $employeeID
     * @return bool
     */
    public function updateProject($projectID)
    {
        $input = $this->projectValidation->updateProject($projectID);
        $inputType = $this->projectTypeValidation->setProjectType();

        $typeIDs = $inputType['types'];

        $result = $this->projectLogic->updateProject($projectID,$input);

//        return $input;

        if($result)
        {
            session()->flash('flash_message', [
                'title'     => '保存成功!',
                'message'   => '',
                'level'     => 'success'
            ]);

            $resultType = $this->projectLogic->setProjectTypes($projectID,$typeIDs);

            //记录Log
            app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '编辑了项目信息']);

            return redirect('/project/lists');
        }
        else
        {
            session()->flash('flash_message_overlay', [
                'title'     => '保存失败!',
                'message'   => '数据未保存成功,请稍后重试!',
                'level'     => 'error'
            ]);
            return redirect()->back();
        }
    }

    /**
     * 删除
     *
     * @return bool
     */
    public function deleteProject($projectID)
    {
        $result = $this->projectLogic->deleteProject($projectID);

        if($result)
        {
            session()->flash('flash_message', [
                'title'     => '删除成功!',
                'message'   => '',
                'level'     => 'success'
            ]);

            $resultType = $this->projectLogic->deleteProjectAllTypes($projectID);

            //记录Log
            app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '删除了项目信息']);
        }
        else
        {
            session()->flash('flash_message_overlay', [
                'title'     => '删除失败!',
                'message'   => '数据未删除成功,请稍后重试!',
                'level'     => 'error'
            ]);
        }

        return redirect('/project/lists');
    }

    public function getAllProjects()
    {
        $projectList = $this->projectLogic->getAllProjects();

        foreach ($projectList as $project) {
            $assignTypeIDs = $this->projectLogic->getTypeIDsByProjectID($project['id']);
            $assignTypes = $this->typeLogic->getTypesByIDs($assignTypeIDs);
            $project['assignTypes'] = $assignTypes;
        }

        return $projectList;
    }
}
