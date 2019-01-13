<?php

namespace App\Http\Controllers\Front;

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
        $this->jobLogic = $jobLogic;
        $this->jobValidation = $jobValidation;
    }

    public function jobData()
    {
        $jobs = $this->jobLogic->getAllJobs();

        $param = ['jobs' => $jobs];

        return view('front.online.job',$param);
    }

}
