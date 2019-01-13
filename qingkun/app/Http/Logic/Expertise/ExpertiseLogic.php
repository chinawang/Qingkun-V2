<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2019/1/13
 * Time: 16:47
 */

namespace App\Http\Logic\Expertise;

use App\Repositories\Expertise\ExpertiseRepository;
use Support\Logic\Logic;

class ExpertiseLogic extends Logic
{
    protected $expertiseRepository;

    public function __construct(ExpertiseRepository $expertiseRepository)
    {
        $this->expertiseRepository = $expertiseRepository;
    }

    public function findExpertise($expertiseId)
    {
        $conditions = ['delete_process' => 0,'id' => $expertiseId];
        $expertise = $this->expertiseRepository->findBy($conditions);
        return $expertise;
    }

    public function getExpertises($pageSize, $orderColumn, $orderDirection, $cursorPage = null)
    {
        $conditions = ['delete_process' => 0];
        $expertiseList = $this->expertiseRepository->getPaginate($conditions,$pageSize,$orderColumn,$orderDirection,$cursorPage);
        return $expertiseList;
    }

    public function getExpertisesBy($conditions,$pageSize, $orderColumn, $orderDirection, $cursorPage = null)
    {
        $expertiseList = $this->expertiseRepository->getPaginate($conditions,$pageSize,$orderColumn,$orderDirection,$cursorPage);
        return $expertiseList;
    }

    public function getExpertisesByIDs($expertiseIds)
    {
        $expertiseList = $this->expertiseRepository->get($expertiseIds);
        return $expertiseList;
    }

    public function getAllExpertises()
    {
        $conditions = ['delete_process' => 0];
        $expertiseList = $this->expertiseRepository->getBy($conditions);
        return $expertiseList;
    }

    public function createExpertise($attributes)
    {
        return $this->expertiseRepository->create($attributes);
    }

    public function updateExpertise($expertiseId,$input)
    {
        return $this->expertiseRepository->update($expertiseId,$input);
    }

    public function deleteExpertise($expertiseId)
    {
        return $this->expertiseRepository->deleteByFlag($expertiseId);
    }
}
