<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2019/1/13
 * Time: 16:06
 */

namespace App\Repositories\Expertise;

use App\Models\Expertise\ExpertiseModel;
use Support\Repository\Repository;

class ExpertiseRepository extends Repository
{
    /**
     * @return string
     */
    protected function model()
    {
        return ExpertiseModel::class;
    }

    /**
     * 分页获取列表
     *
     * @param mixed $conditions
     * @param string $orderColumn
     * @param string $orderDirection
     * @param int $cursor
     * @param int $size
     * @param array $with
     * @param array $fiel
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByPage($conditions, $orderColumn, $orderDirection, $cursor, $size, array $with = [], array $fields = ['*'])
    {
        return $this->model->where($conditions)
            ->orderBy($orderColumn, $orderDirection)
            ->skip($cursor)->take($size)->with($with)
            ->get($fields);
    }

    /**
     * 按条件获取分页数据
     *
     * @param $conditions
     * @param $size
     * @param $orderColumn
     * @param $orderDirection
     * @param int $cursorPage
     * @return mixed
     */
    public function getPaginate($conditions, $size, $orderColumn, $orderDirection, $cursorPage = null)
    {
        return $this->model->where($conditions)
            ->orderBy($orderColumn, $orderDirection)
            ->paginate($size, $columns = ['*'], $pageName = 'page', $cursorPage);
    }


    public function getGroupBy($conditions, array $with = [], array $fields = ['*'])
    {
        return $this->model->where($conditions)
            ->orderBy('id')
            ->with($with)
            ->get($fields);
    }

    /**
     * 逻辑删除
     *
     * @param $ID
     * @return mixed
     */
    public function deleteByFlag($ID)
    {
        $conditions['delete_process'] = 1;
        return $this->model->where($this->model->getKeyName(), $ID)->update($conditions);
    }
}
