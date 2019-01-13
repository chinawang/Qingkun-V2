<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2019/1/13
 * Time: 18:25
 */

namespace App\Repositories\Project;
use App\Models\Projects\ProjectTypeModel;
use Support\Repository\Repository;


class ProjectTypeRepository extends Repository
{
    /**
     * @return string
     */
    protected function model()
    {
        return ProjectTypeModel::class;
    }

    /**
     * 新增角色权限
     *
     * @param $roleID
     * @param array $permissionIDs
     * @return int
     */
    public function addTypes($projectID, array $typeIDs)
    {
        $attributes = [];

        array_map(function($typeID) use ($projectID, &$attributes) {
            array_push($attributes, [
                'project_id' => $projectID,
                'type_id' => $typeID,
            ]);
        }, $typeIDs);

        return $this->insert($attributes);
    }

    /**
     * 删除角色权限
     *
     * @param $roleID
     * @param array $permissionIDs
     * @return int
     */
    public function deleteTypes($projectID, array $typeIDs)
    {
        return $this->model->where('project_id', $projectID)->whereIn('type_id', $typeIDs)->delete();
    }

    public function deleteProjectAllTypes($projectID)
    {
        return $this->model->where('project_id', $projectID)->delete();
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
}
