<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2018/8/13
 * Time: 09:56
 */

namespace App\Http\Logic\Award;

use App\Repositories\Award\AwardRepository;
use Support\Logic\Logic;

class AwardLogic extends Logic
{
    protected $awardRepository;

    public function __construct(AwardRepository $awardRepository)
    {
        $this->awardRepository = $awardRepository;
    }

    public function findAward($awardId)
    {
        $conditions = ['delete_process' => 0,'id' => $awardId];
        $award = $this->awardRepository->findBy($conditions);
        return $award;
    }

    public function getAwards($pageSize, $orderColumn, $orderDirection, $cursorPage = null)
    {
        $conditions = ['delete_process' => 0];
        $awardList = $this->awardRepository->getPaginate($conditions,$pageSize,$orderColumn,$orderDirection,$cursorPage);
        return $awardList;
    }

    public function getAwardsBy($conditions,$pageSize, $orderColumn, $orderDirection, $cursorPage = null)
    {
        $awardList = $this->awardRepository->getPaginate($conditions,$pageSize,$orderColumn,$orderDirection,$cursorPage);
        return $awardList;
    }

    public function getAwardsByIDs($awardIDs)
    {
        $awardList = $this->awardRepository->get($awardIDs);
        return $awardList;
    }

    public function getAllAwards()
    {
        $conditions = ['delete_process' => 0];
        $awardList = $this->awardRepository->getBy($conditions);
        return $awardList;
    }

    public function createAward($attributes)
    {
        return $this->awardRepository->create($attributes);
    }

    public function updateAward($awardId,$input)
    {
        return $this->awardRepository->update($awardId,$input);
    }

    public function deleteAward($awardId)
    {
        return $this->awardRepository->deleteByFlag($awardId);
    }

}
