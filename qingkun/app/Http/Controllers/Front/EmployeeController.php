<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Logic\Employee\EmployeeLogic;
use App\Http\Validations\Employee\EmployeeValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    protected $employeeLogic;

    protected $employeeValidation;

    public function __construct(EmployeeLogic $employeeLogic,EmployeeValidation $employeeValidation)
    {
        $this->employeeLogic = $employeeLogic;
        $this->employeeValidation = $employeeValidation;
    }

    public function employeeData()
    {
//        $employees = $this->employeeLogic->getAllEmployees();

        $employees = DB::table('employees')
            ->where(['delete_process'=>0])
            ->get()->orderby('index');

        $param = ['employees' => $employees];

        return view('front.online.employee',$param);
    }
}
