<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2019/1/13
 * Time: 17:07
 */

namespace App\Http\Controllers\Provence;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Logic\Provence\ProvenceLogic;
use App\Http\Validations\Provence\ProvenceValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProvenceController extends Controller
{
    protected $provenceLogic;

    protected $provenceValidation;

    public function __construct(ProvenceLogic $provenceLogic,ProvenceValidation $provenceValidation)
    {
        $this->middleware('auth');

        $this->provenceLogic = $provenceLogic;
        $this->provenceValidation = $provenceValidation;
    }

    /**
     * 显示添加窗口
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAddProvenceForm()
    {
        return view('provence.addProvence');
    }

    /**
     * 显示编辑窗口
     *
     * @param $employeeID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUpdateProvenceForm($provenceID)
    {
        $provence = $this->provenceLogic->findProvence($provenceID);
        $param = ['provence' => $provence];
        return view('provence.updateProvence',$param);
    }

    public function showProvenceForm($provenceID)
    {
        $provence = $this->provenceInfo($provenceID);
        $param = ['provence' => $provence];
        return view('provence.info',$param);
    }

    /**
     * 查询信息
     *
     * @param $employeeID
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function provenceInfo($provenceID)
    {
        $provence = $this->provenceLogic->findProvence($provenceID);
        return $provence;
    }

    /**
     * 分页查询列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function provenceList()
    {
        $input = $this->provenceValidation->newsPaginate();

        $cursorPage      = array_get($input, 'cursor_page', null);
        $orderColumn     = array_get($input, 'order_column', 'id');
        $orderDirection  = array_get($input, 'order_direction', 'asc');
        $pageSize        = array_get($input, 'page_size', 20);
        $provencePaginate = $this->provenceLogic->getProvences($pageSize,$orderColumn,$orderDirection,$cursorPage);
        $param = ['provences' => $provencePaginate];

        //记录Log
        app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '查看了新闻信息']);

        return view('provence.list',$param);
    }

    /**
     * 新增
     *
     * @return bool|\Illuminate\Database\Eloquent\Model
     */
    public function storeNewProvence()
    {
        $input = $this->provenceValidation->storeNewProvence();
        $result = $this->provenceLogic->createProvence($input);

        if($result)
        {
            session()->flash('flash_message', [
                'title'     => '保存成功!',
                'message'   => '',
                'level'     => 'success'
            ]);

            //记录Log
            app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '新增了新闻信息']);

            return redirect('/provence/lists');
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
    public function updateProvence($provenceID)
    {
        $input = $this->provenceValidation->updateProvence($provenceID);
        $result = $this->provenceLogic->updateProvence($provenceID,$input);

        if($result)
        {
            session()->flash('flash_message', [
                'title'     => '保存成功!',
                'message'   => '',
                'level'     => 'success'
            ]);

            //记录Log
            app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '编辑了新闻信息']);

            return redirect('/provence/lists');
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
    public function deleteProvence($provenceID)
    {
        $result = $this->provenceLogic->deleteProvence($provenceID);

        if($result)
        {
            session()->flash('flash_message', [
                'title'     => '删除成功!',
                'message'   => '',
                'level'     => 'success'
            ]);

            //记录Log
            app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '删除了新闻信息']);
        }
        else
        {
            session()->flash('flash_message_overlay', [
                'title'     => '删除失败!',
                'message'   => '数据未删除成功,请稍后重试!',
                'level'     => 'error'
            ]);
        }

        return redirect('/provence/lists');
    }

    public function getAllProvences()
    {
        $provenceList = $this->provenceLogic->getAllProvences();

        return $provenceList;
    }
}
