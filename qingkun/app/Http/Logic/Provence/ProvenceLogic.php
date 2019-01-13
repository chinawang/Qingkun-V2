<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2019/1/13
 * Time: 16:36
 */

namespace App\Http\Logic\Provence;

use App\Repositories\Provence\ProvenceRepository;
use Support\Logic\Logic;

class ProvenceLogic extends Logic
{
    protected $provenceRepository;

    public function __construct(ProvenceRepository $provenceRepository)
    {
        $this->provenceRepository = $provenceRepository;
    }

    public function findProvence($provenceId)
    {
        $conditions = ['delete_process' => 0,'id' => $provenceId];
        $provence = $this->provenceRepository->findBy($conditions);
        return $provence;
    }

    public function getProvences($pageSize, $orderColumn, $orderDirection, $cursorPage = null)
    {
        $conditions = ['delete_process' => 0];
        $provenceList = $this->provenceRepository->getPaginate($conditions,$pageSize,$orderColumn,$orderDirection,$cursorPage);
        return $provenceList;
    }

    public function getProvencesBy($conditions,$pageSize, $orderColumn, $orderDirection, $cursorPage = null)
    {
        $provenceList = $this->provenceRepository->getPaginate($conditions,$pageSize,$orderColumn,$orderDirection,$cursorPage);
        return $provenceList;
    }

    public function getProvencesByIDs($provenceIds)
    {
        $provenceList = $this->provenceRepository->get($provenceIds);
        return $provenceList;
    }

    public function getAllProvences()
    {
        $conditions = ['delete_process' => 0];
        $provenceList = $this->provenceRepository->getBy($conditions);
        return $provenceList;
    }

    public function createProvence($attributes)
    {
        return $this->provenceRepository->create($attributes);
    }

    public function updateProvence($provenceId,$input)
    {
        return $this->provenceRepository->update($provenceId,$input);
    }

    public function deleteProvence($provenceId)
    {
        return $this->provenceRepository->deleteByFlag($provenceId);
    }
}
