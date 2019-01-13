<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2019/1/13
 * Time: 17:17
 */

namespace App\Http\Controllers\Expertise;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Logic\Expertise\ExpertiseLogic;
use App\Http\Validations\Expertise\ExpertiseValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ExpertiseController extends Controller
{
    protected $expertiseLogic;

    protected $expertiseValidation;

    public function __construct(ExpertiseLogic $expertiseLogic,ExpertiseValidation $expertiseValidation)
    {
        $this->middleware('auth');

        $this->expertiseLogic = $expertiseLogic;
        $this->expertiseValidation = $expertiseValidation;
    }

    /**
     * 显示添加窗口
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAddExpertiseForm()
    {
        return view('expertise.addExpertise');
    }

    /**
     * 显示编辑窗口
     *
     * @param $employeeID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUpdateExpertiseForm($expertiseID)
    {
        $expertise = $this->expertiseLogic->findExpertise($expertiseID);
        $param = ['expertise' => $expertise];
        return view('expertise.updateExpertise',$param);
    }

    public function showExpertiseForm($expertiseID)
    {
        $expertise = $this->expertiseInfo($expertiseID);
        $param = ['expertise' => $expertise];
        return view('expertise.info',$param);
    }

    /**
     * 查询信息
     *
     * @param $employeeID
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function expertiseInfo($expertiseID)
    {
        $expertise = $this->expertiseLogic->findExpertise($expertiseID);
        return $expertise;
    }

    /**
     * 分页查询列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function expertiseList()
    {
        $input = $this->expertiseValidation->expertisePaginate();

        $cursorPage      = array_get($input, 'cursor_page', null);
        $orderColumn     = array_get($input, 'order_column', 'id');
        $orderDirection  = array_get($input, 'order_direction', 'asc');
        $pageSize        = array_get($input, 'page_size', 20);
        $expertisePaginate = $this->expertiseLogic->getExpertises($pageSize,$orderColumn,$orderDirection,$cursorPage);
        $param = ['expertises' => $expertisePaginate];

        //记录Log
        app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '查看了新闻信息']);

        return view('expertise.list',$param);
    }

    /**
     * 新增
     *
     * @return bool|\Illuminate\Database\Eloquent\Model
     */
    public function storeNewExpertise()
    {
        $input = $this->expertiseValidation->storeNewExpertise();
        $result = $this->expertiseLogic->createExpertise($input);

        if($result)
        {
            session()->flash('flash_message', [
                'title'     => '保存成功!',
                'message'   => '',
                'level'     => 'success'
            ]);

            //记录Log
            app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '新增了新闻信息']);

            return redirect('/expertise/lists');
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
    public function updateExpertise($expertiseID)
    {
        $input = $this->expertiseValidation->updateExpertise($expertiseID);
        $result = $this->expertiseLogic->updateExpertise($expertiseID,$input);

        if($result)
        {
            session()->flash('flash_message', [
                'title'     => '保存成功!',
                'message'   => '',
                'level'     => 'success'
            ]);

            //记录Log
            app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '编辑了新闻信息']);

            return redirect('/expertise/lists');
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
    public function deleteExpertise($expertiseID)
    {
        $result = $this->expertiseLogic->deleteExpertise($expertiseID);

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

        return redirect('/expertise/lists');
    }

    public function getAllExpertises()
    {
        $expertiseList = $this->expertiseLogic->getAllExpertises();

        return $expertiseList;
    }
}
