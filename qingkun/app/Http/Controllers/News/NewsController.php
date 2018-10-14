<?php

namespace App\Http\Controllers\News;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Logic\News\NewsLogic;
use App\Http\Validations\News\NewsValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    protected $newsLogic;

    protected $newsValidation;

    public function __construct(NewsLogic $newsLogic,NewsValidation $newsValidation)
    {
        $this->middleware('auth');

        $this->newsLogic = $newsLogic;
        $this->newsValidation = $newsValidation;
    }

    /**
     * 显示添加窗口
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAddNewsForm()
    {
        return view('news.addNews');
    }

    /**
     * 显示编辑窗口
     *
     * @param $employeeID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUpdateNewsForm($newsID)
    {
        $news = $this->newsLogic->findPost($newsID);
        $param = ['news' => $news];
        return view('news.updateNews',$param);
    }

    public function showNewsForm($newsID)
    {
        $news = $this->newsInfo($newsID);
        $param = ['news' => $news];
        return view('news.info',$param);
    }

    /**
     * 查询信息
     *
     * @param $employeeID
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function newsInfo($newsID)
    {
        $news = $this->newsLogic->findPost($newsID);
        return $news;
    }

    /**
     * 分页查询列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newsList()
    {
        $input = $this->newsValidation->newsPaginate();

        $cursorPage      = array_get($input, 'cursor_page', null);
        $orderColumn     = array_get($input, 'order_column', 'id');
        $orderDirection  = array_get($input, 'order_direction', 'asc');
        $pageSize        = array_get($input, 'page_size', 20);
        $newsPaginate = $this->newsLogic->getPosts($pageSize,$orderColumn,$orderDirection,$cursorPage);
        $param = ['posts' => $newsPaginate];

        //记录Log
        app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '查看了新闻信息']);

        return view('news.list',$param);
    }

    /**
     * 新增
     *
     * @return bool|\Illuminate\Database\Eloquent\Model
     */
    public function storeNewNews()
    {
        $input = $this->newsValidation->storeNewNews();
        $result = $this->newsLogic->createPost($input);

        if($result)
        {
            session()->flash('flash_message', [
                'title'     => '保存成功!',
                'message'   => '',
                'level'     => 'success'
            ]);

            //记录Log
            app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '新增了新闻信息']);

            return redirect('/news/lists');
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
    public function updateNews($newsID)
    {
        $input = $this->newsValidation->updateNews($newsID);
        $result = $this->newsLogic->updatePost($newsID,$input);

        if($result)
        {
            session()->flash('flash_message', [
                'title'     => '保存成功!',
                'message'   => '',
                'level'     => 'success'
            ]);

            //记录Log
            app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '编辑了新闻信息']);

            return redirect('/news/lists');
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
    public function deleteNews($newsID)
    {
        $result = $this->newsLogic->deletePost($newsID);

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

        return redirect('/news/lists');
    }

    public function getAllPosts()
    {
        $newsList = $this->newsLogic->getAllPosts();

        return $newsList;
    }
}
