<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2018/8/13
 * Time: 10:15
 */

namespace App\Http\Logic\Project;

use App\Repositories\Project\ProjectRepository;
use Support\Logic\Logic;

class ProjectLogic extends Logic
{
    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
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

    public function updateProject($projectId,$input)
    {
        return $this->projectRepository->update($projectId,$input);
    }

    public function deleteProject($projectId)
    {
        return $this->projectRepository->deleteByFlag($projectId);
    }
}
