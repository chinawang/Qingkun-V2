<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2019/1/13
 * Time: 16:28
 */

namespace App\Http\Logic\Type;

use App\Repositories\Type\TypeRepository;
use Support\Logic\Logic;

class TypeLogic extends Logic
{
    protected $typeRepository;

    public function __construct(TypeRepository $typeRepository)
    {
        $this->typeRepository = $typeRepository;
    }

    public function findType($typeId)
    {
        $conditions = ['delete_process' => 0,'id' => $typeId];
        $type = $this->typeRepository->findBy($conditions);
        return $type;
    }

    public function getTypes($pageSize, $orderColumn, $orderDirection, $cursorPage = null)
    {
        $conditions = ['delete_process' => 0];
        $typeList = $this->typeRepository->getPaginate($conditions,$pageSize,$orderColumn,$orderDirection,$cursorPage);
        return $typeList;
    }

    public function getTypesBy($conditions,$pageSize, $orderColumn, $orderDirection, $cursorPage = null)
    {
        $typeList = $this->typeRepository->getPaginate($conditions,$pageSize,$orderColumn,$orderDirection,$cursorPage);
        return $typeList;
    }

    public function getTypesByIDs($typeId)
    {
        $typeList = $this->typeRepository->get($typeId);
        return $typeList;
    }

    public function getAllTypes()
    {
        $conditions = ['delete_process' => 0];
        $typeList = $this->typeRepository->getBy($conditions);
        return $typeList;
    }

    public function createType($attributes)
    {
        return $this->typeRepository->create($attributes);
    }

    public function updateType($typeId,$input)
    {
        return $this->typeRepository->update($typeId,$input);
    }

    public function deleteType($typeId)
    {
        return $this->typeRepository->deleteByFlag($typeId);
    }
}
