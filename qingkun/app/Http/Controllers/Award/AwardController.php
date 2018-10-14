<?php

namespace App\Http\Controllers\Award;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Logic\Award\AwardLogic;
use App\Http\Validations\Award\AwardValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AwardController extends Controller
{
    protected $awardLogic;

    protected $awardValidation;

    public function __construct(AwardLogic $awardLogic,AwardValidation $awardValidation)
    {
        $this->middleware('auth');

        $this->awardLogic = $awardLogic;
        $this->awardValidation = $awardValidation;
    }

    /**
     * 显示添加窗口
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAddAwardForm()
    {
        return view('award.addAward');
    }

    /**
     * 显示编辑窗口
     *
     * @param $employeeID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUpdateAwardForm($awardID)
    {
        $award = $this->awardLogic->findAward($awardID);
        $param = ['award' => $award];
        return view('award.updateAward',$param);
    }

    public function showAwardForm($awardID)
    {
        $award = $this->awardInfo($awardID);
        $param = ['award' => $award];
        return view('award.info',$param);
    }

    /**
     * 查询信息
     *
     * @param $employeeID
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function awardInfo($awardID)
    {
        $award = $this->awardLogic->findAward($awardID);
        return $award;
    }

    /**
     * 分页查询列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function awardList()
    {
        $input = $this->awardValidation->awardPaginate();

        $cursorPage      = array_get($input, 'cursor_page', null);
        $orderColumn     = array_get($input, 'order_column', 'id');
        $orderDirection  = array_get($input, 'order_direction', 'asc');
        $pageSize        = array_get($input, 'page_size', 20);
        $awardPaginate = $this->awardLogic->getAwards($pageSize,$orderColumn,$orderDirection,$cursorPage);
        $param = ['awards' => $awardPaginate];

        //记录Log
        app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '查看了新闻信息']);

        return view('award.list',$param);
    }

    /**
     * 新增
     *
     * @return bool|\Illuminate\Database\Eloquent\Model
     */
    public function storeNewAward()
    {
        $input = $this->awardValidation->storeNewAward();
        $result = $this->awardLogic->createAward($input);

        if($result)
        {
            session()->flash('flash_message', [
                'title'     => '保存成功!',
                'message'   => '',
                'level'     => 'success'
            ]);

            //记录Log
            app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '新增了新闻信息']);

            return redirect('/award/lists');
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
    public function updateAward($awardID)
    {
        $input = $this->awardValidation->updateAward($awardID);
        $result = $this->awardLogic->updateAward($awardID,$input);

        if($result)
        {
            session()->flash('flash_message', [
                'title'     => '保存成功!',
                'message'   => '',
                'level'     => 'success'
            ]);

            //记录Log
            app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '编辑了新闻信息']);

            return redirect('/award/lists');
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
    public function deleteAward($awardID)
    {
        $result = $this->awardLogic->deleteAward($awardID);

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

        return redirect('/award/lists');
    }

    public function getAllAwards()
    {
        $awardList = $this->awardLogic->getAllAwards();

        return $awardList;
    }
}
