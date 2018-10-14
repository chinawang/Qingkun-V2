<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2018/8/13
 * Time: 09:45
 */

namespace App\Http\Logic\Job;

use App\Repositories\Job\JobRepository;
use Support\Logic\Logic;

class JobLogic extends Logic
{
    protected $jobRepository;

    public function __construct(JobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    public function findJob($jobId)
    {
        $conditions = ['delete_process' => 0,'id' => $jobId];
        $job = $this->jobRepository->findBy($conditions);
        return $job;
    }

    public function getJobs($pageSize, $orderColumn, $orderDirection, $cursorPage = null)
    {
        $conditions = ['delete_process' => 0];
        $jobList = $this->jobRepository->getPaginate($conditions,$pageSize,$orderColumn,$orderDirection,$cursorPage);
        return $jobList;
    }

    public function getJobsBy($conditions,$pageSize, $orderColumn, $orderDirection, $cursorPage = null)
    {
        $jobList = $this->jobRepository->getPaginate($conditions,$pageSize,$orderColumn,$orderDirection,$cursorPage);
        return $jobList;
    }

    public function getJobsByIDs($jobIDs)
    {
        $jobList = $this->jobRepository->get($jobIDs);
        return $jobList;
    }

    public function getAllJobs()
    {
        $conditions = ['delete_process' => 0];
        $jobList = $this->jobRepository->getBy($conditions);
        return $jobList;
    }

    public function createJob($attributes)
    {
        return $this->jobRepository->create($attributes);
    }

    public function updateJob($jobId,$input)
    {
        return $this->jobRepository->update($jobId,$input);
    }

    public function deleteJob($jobId)
    {
        return $this->jobRepository->deleteByFlag($jobId);
    }

}
