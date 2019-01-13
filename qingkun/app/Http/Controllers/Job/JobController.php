<?php

namespace App\Http\Controllers\Job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Logic\Job\JobLogic;
use App\Http\Validations\Job\JobValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    protected $jobLogic;

    protected $jobValidation;

    public function __construct(JobLogic $jobLogic,JobValidation $jobValidation)
    {
        $this->middleware('auth');

        $this->jobLogic = $jobLogic;
        $this->jobValidation = $jobValidation;
    }

    /**
     * 显示添加窗口
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAddJobForm()
    {
        return view('job.addJob');
    }

    /**
     * 显示编辑窗口
     *
     * @param $employeeID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUpdateJobForm($jobID)
    {
        $job = $this->jobLogic->findJob($jobID);
        $param = ['job' => $job];
        return view('job.updateJob',$param);
    }

    public function showJobForm($jobID)
    {
        $job = $this->jobInfo($jobID);
        $param = ['job' => $job];
        return view('job.info',$param);
    }

    /**
     * 查询信息
     *
     * @param $employeeID
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function jobInfo($jobID)
    {
        $job = $this->jobLogic->findJob($jobID);
        return $job;
    }

    /**
     * 分页查询列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function jobList()
    {
        $input = $this->jobValidation->jobPaginate();

        $cursorPage      = array_get($input, 'cursor_page', null);
        $orderColumn     = array_get($input, 'order_column', 'id');
        $orderDirection  = array_get($input, 'order_direction', 'asc');
        $pageSize        = array_get($input, 'page_size', 20);
        $jobPaginate = $this->jobLogic->getJobs($pageSize,$orderColumn,$orderDirection,$cursorPage);
        $param = ['jobs' => $jobPaginate];

        //记录Log
        app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '查看了招聘信息']);

        return view('job.list',$param);
    }

    /**
     * 新增
     *
     * @return bool|\Illuminate\Database\Eloquent\Model
     */
    public function storeNewJob()
    {
        $input = $this->jobValidation->storeNewJob();
        $result = $this->jobLogic->createJob($input);

        if($result)
        {
            session()->flash('flash_message', [
                'title'     => '保存成功!',
                'message'   => '',
                'level'     => 'success'
            ]);

            //记录Log
            app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '新增了招聘信息']);

            return redirect('/job/lists');
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
    public function updateJob($jobID)
    {
        $input = $this->jobValidation->updateJob($jobID);
        $result = $this->jobLogic->updateJob($jobID,$input);

        if($result)
        {
            session()->flash('flash_message', [
                'title'     => '保存成功!',
                'message'   => '',
                'level'     => 'success'
            ]);

            //记录Log
            app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '编辑了招聘信息']);

            return redirect('/job/lists');
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
    public function deleteJob($jobID)
    {
        $result = $this->jobLogic->deleteJob($jobID);

        if($result)
        {
            session()->flash('flash_message', [
                'title'     => '删除成功!',
                'message'   => '',
                'level'     => 'success'
            ]);

            //记录Log
            app('App\Http\Logic\Log\LogLogic')->createLog(['name' => Auth::user()->name,'log' => '删除了招聘信息']);
        }
        else
        {
            session()->flash('flash_message_overlay', [
                'title'     => '删除失败!',
                'message'   => '数据未删除成功,请稍后重试!',
                'level'     => 'error'
            ]);
        }

        return redirect('/job/lists');
    }

    public function getAllJobs()
    {
        $jobList = $this->jobLogic->getAllJobs();

        return $jobList;
    }
}
