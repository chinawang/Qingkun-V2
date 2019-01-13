<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2019/1/13
 * Time: 16:54
 */

namespace App\Http\Controllers\Type;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Logic\Type\TypeLogic;
use App\Http\Validations\Type\TypeValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{
    protected $typeLogic;

    protected $typeValidation;

    public function __construct(TypeLogic $typeLogic,TypeValidation $typeValidation)
    {
        $this->middleware('auth');

        $this->typeLogic = $typeLogic;
        $this->typeValidation = $typeValidation;
    }

    /**
     * 显示添加窗口
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAddTypeForm()
    {
        return view('type.addType');
    }

    /**
     * 显示编辑窗口
     *
     * @param $employeeID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUpdateTypeForm($typeID)
    {
        $type = $this->typeLogic->findType($typeID);
        $param = ['type' => $type];
        return view('type.updateTypes',$param);
    }

    public function showTypeForm($typeID)
    {
        $type = $this->typeInfo($typeID);
        $param = ['type' => $type];
        return view('type.info',$param);
    }

    /**
     * 查询信息
     *
     * @param $employeeID
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function typeInfo($typeID)
    {
        $type = $this->typeLogic->findType($typeID);
        return $type;
    }

    /**
     * 分页查询列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function typeList()
    {
        $input = $this->typeValidation->newsPaginate();

        $cursorPage      = array_get($input, 'cursor_page', null);
        $orderColumn     = array_get($input, 'order_column', 'id');
        $orderDirection  = array_get($input, 'order_direction', 'asc');
        $pageSize        = array_get($input, 'page_size', 20);
        $typePaginate = $this->typeLogic->getTypes($pageSize,$orderColumn,$orderDirection,$cursorPage);
        $param = ['types' => $typePaginate];

        //记录Log
        app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '查看了类型信息']);

        return view('type.list',$param);
    }

    /**
     * 新增
     *
     * @return bool|\Illuminate\Database\Eloquent\Model
     */
    public function storeNewType()
    {
        $input = $this->typeValidation->storeNewType();
        $result = $this->typeLogic->createType($input);

        if($result)
        {
            session()->flash('flash_message', [
                'title'     => '保存成功!',
                'message'   => '',
                'level'     => 'success'
            ]);

            //记录Log
            app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '新增了类型信息']);

            return redirect('/type/lists');
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
    public function updateType($typeID)
    {
        $input = $this->typeValidation->updateType($typeID);
        $result = $this->typeLogic->updateType($typeID,$input);

        if($result)
        {
            session()->flash('flash_message', [
                'title'     => '保存成功!',
                'message'   => '',
                'level'     => 'success'
            ]);

            //记录Log
            app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '编辑了类型信息']);

            return redirect('/type/lists');
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
    public function deleteType($typeID)
    {
        $result = $this->typeLogic->deleteType($typeID);

        if($result)
        {
            session()->flash('flash_message', [
                'title'     => '删除成功!',
                'message'   => '',
                'level'     => 'success'
            ]);

            //记录Log
            app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '删除了类型信息']);
        }
        else
        {
            session()->flash('flash_message_overlay', [
                'title'     => '删除失败!',
                'message'   => '数据未删除成功,请稍后重试!',
                'level'     => 'error'
            ]);
        }

        return redirect('/type/lists');
    }

    public function getAllTypes()
    {
        $typeList = $this->typeLogic->getAllTypes();

        return $typeList;
    }
}
