<?php

namespace App\Http\Controllers\Banner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Logic\Banner\BannerLogic;
use App\Http\Validations\Banner\BannerValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    protected $bannerLogic;

    protected $bannerValidation;

    public function __construct(BannerLogic $bannerLogic,BannerValidation $bannerValidation)
    {
        $this->middleware('auth');

        $this->bannerLogic = $bannerLogic;
        $this->bannerValidation = $bannerValidation;
    }

    /**
     * 显示添加窗口
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAddBannerForm()
    {
        return view('banner.addBanner');
    }

    /**
     * 显示编辑窗口
     *
     * @param $employeeID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUpdateBannerForm($bannerID)
    {
        $banner = $this->bannerLogic->findBanner($bannerID);
        $param = ['banner' => $banner];
        return view('banner.updateBanner',$param);
    }

    public function showBannerForm($bannerID)
    {
        $banner = $this->bannerInfo($bannerID);
        $param = ['banner' => $banner];
        return view('banner.info',$param);
    }

    /**
     * 查询信息
     *
     * @param $employeeID
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function bannerInfo($bannerID)
    {
        $banner = $this->bannerLogic->findBanner($bannerID);
        return $banner;
    }

    /**
     * 分页查询列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function bannerList()
    {
        $input = $this->bannerValidation->bannerPaginate();

        $cursorPage      = array_get($input, 'cursor_page', null);
        $orderColumn     = array_get($input, 'order_column', 'id');
        $orderDirection  = array_get($input, 'order_direction', 'asc');
        $pageSize        = array_get($input, 'page_size', 10);
        $bannerPaginate = $this->bannerLogic->getBanners($pageSize,$orderColumn,$orderDirection,$cursorPage);
        $param = ['banners' => $bannerPaginate];

        //记录Log
        app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '查看了Banner信息']);

        return view('banner.list',$param);
    }

    /**
     * 新增
     *
     * @return bool|\Illuminate\Database\Eloquent\Model
     */
    public function storeNewBanner()
    {
        $input = $this->bannerValidation->storeNewBanner();
        $result = $this->bannerLogic->createBanner($input);

        if($result)
        {
            session()->flash('flash_message', [
                'title'     => '保存成功!',
                'message'   => '',
                'level'     => 'success'
            ]);

            //记录Log
            app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '新增了Banner信息']);

            return redirect('/banner/lists');
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
    public function updateBanner($bannerID)
    {
        $input = $this->bannerValidation->updateBanner($bannerID);
        $result = $this->bannerLogic->updateBanner($bannerID,$input);

        if($result)
        {
            session()->flash('flash_message', [
                'title'     => '保存成功!',
                'message'   => '',
                'level'     => 'success'
            ]);

            //记录Log
            app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '编辑了Banner信息']);

            return redirect('/banner/lists');
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
    public function deleteBanner($bannerID)
    {
        $result = $this->bannerLogic->deleteBanner($bannerID);

        if($result)
        {
            session()->flash('flash_message', [
                'title'     => '删除成功!',
                'message'   => '',
                'level'     => 'success'
            ]);

            //记录Log
            app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '删除了Banner信息']);
        }
        else
        {
            session()->flash('flash_message_overlay', [
                'title'     => '删除失败!',
                'message'   => '数据未删除成功,请稍后重试!',
                'level'     => 'error'
            ]);
        }

        return redirect('/banner/lists');
    }

    public function getAllBanners()
    {
        $bannerList = $this->bannerLogic->getAllBanners();

        return $bannerList;
    }
}
