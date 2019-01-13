<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2018/8/13
 * Time: 10:15
 */

namespace App\Http\Logic\Project;

use App\Repositories\Project\ProjectRepository;
use App\Repositories\Type\TypeRepository;
use App\Repositories\Project\ProjectTypeRepository;
use Support\Logic\Logic;

class ProjectLogic extends Logic
{
    protected $projectRepository;
    protected $typeRepository;
    protected $projectTypeRepository;

    public function __construct(ProjectRepository $projectRepository,ProjectTypeRepository $projectTypeRepository,TypeRepository $typeRepository)
    {
        $this->projectRepository = $projectRepository;
        $this->typeRepository = $typeRepository;
        $this->projectTypeRepository = $projectTypeRepository;
    }

    public function findProject($projectId)
    {
        $conditions = ['delete_process' => 0,'id' => $projectId];
        $project = $this->projectRepository->findBy($conditions);
        return $project;
    }

    public function getProjects($pageSize, $orderColumn, $orderDirection, $cursorPage = null)
    {
        $conditions = ['delete_process' => 0];
        $projectList = $this->projectRepository->getPaginate($conditions,$pageSize,$orderColumn,$orderDirection,$cursorPage);
        return $projectList;
    }

    public function getProjectsBy($conditions,$pageSize, $orderColumn, $orderDirection, $cursorPage = null)
    {
        $projectList = $this->projectRepository->getPaginate($conditions,$pageSize,$orderColumn,$orderDirection,$cursorPage);
        return $projectList;
    }

    public function getProjectsByIDs($jobIDs)
    {
        $projectList = $this->projectRepository->get($jobIDs);
        return $projectList;
    }

    public function getAllProjects()
    {
        $conditions = ['delete_process' => 0];
        $projectList = $this->projectRepository->getBy($conditions);
        return $projectList;
    }

    public function getAllProjectsBy($conditions)
    {
        $projectList = $this->projectRepository->getBy($conditions);
        return $projectList;
    }

    public function createProject($attributes)
    {
        return $this->projectRepository->create($attributes);
    }

    public function insertGetID($attributes)
    {
        return $this->projectRepository->insertGetID($attributes);
    }

    public function updateProject($projectId,$input)
    {
        return $this->projectRepository->update($projectId,$input);
    }

    public function deleteProject($projectId)
    {
        return $this->projectRepository->deleteByFlag($projectId);
    }



    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findProjectType ($id)
    {
        $projectType = $this->projectTypeRepository->find($id);
        return $projectType;
    }


    /**
     * @param $roleId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getProjectTypes($projectId)
    {
        $conditions['project_id'] = $projectId;
        $projectTypeList = $this->projectTypeRepository->getBy($conditions);
        return $projectTypeList;
    }

    /**
     * 根据角色ID查找已分配的权限ID列表
     *
     * @param $roleID
     * @return array
     */
    public function getTypeIDsByProjectID($projectId)
    {
        $projectTypes = $this->getProjectTypes($projectId);
//        $permissionIDs = array_column($rolePermissions,'permission_id');
        $typeIDs = array();

        foreach ($projectTypes as $projectType){
            $typeIDs[] = $projectType['type_id'];
        }
        return $typeIDs;
    }

    /**
     * 根据角色ID查找已分配的权限信息列表
     *
     * @param $roleID
     * @return \Illuminate\Database\Eloquent\Collection
     *
     */
    public function getTypesByProject($projectId)
    {
        $typeIDs = $this->getTypeIDsByProjectID($projectId);
        $types = $this->typeRepository->get($typeIDs);
        return $types;
    }

    /**
     * @param $roleId
     * @param $permissionIDs
     * @return int
     */
    public function addProjectType($projectId,$typeIDs)
    {
        return $this->projectTypeRepository->addTypes($projectId,$typeIDs);
    }

    /**
     * @param $roleId
     * @param $permissionIDs
     * @return int
     */
    public function deleteProjectType($projectId,$typeIDs)
    {
        return $this->projectTypeRepository->deleteTypes($projectId,$typeIDs);
    }

    public function deleteProjectAllTypes($projectId)
    {
        return $this->projectTypeRepository->deleteProjectAllTypes($projectId);
    }

    /**
     * 设置角色的权限
     *
     * @param $roleID
     * @param $permissionIDs
     * @return bool
     */
    public function setProjectTypes($projectId,$typeIDs)
    {
        /**
         * 已分配给角色的权限
         */
        $assignTypeIDs = $this->getTypeIDsByProjectID($projectId);

        $deleteResult = true;
        $addResult = true;

        /**
         * 找出删除的权限
         * 假如已有的权限集合是A，界面传递过得权限集合是B
         * 权限集合A当中的某个权限不在权限集合B当中，就应该删除
         * 使用 array_diff() 计算补集
         */
        $deleteTypeIDs = array_diff($assignTypeIDs,$typeIDs);
        if($deleteTypeIDs)
        {
            $deleteResult = $this->deleteProjectType($projectId,$deleteTypeIDs);
        }

        /**
         * 找出添加的权限
         * 假如已有的权限集合是A，界面传递过得权限集合是B
         * 权限集合B当中的某个权限不在权限集合A当中，就应该添加
         * 使用 array_diff() 计算补集
         */
        $newTypeIDs = array_diff($typeIDs,$assignTypeIDs);
        if($newTypeIDs)
        {
            $addResult = $this->addProjectType($projectId,$newTypeIDs);
        }

        return ($deleteResult && $addResult);
    }
}
