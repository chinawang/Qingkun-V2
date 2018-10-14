<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2018/8/12
 * Time: 07:37
 */

namespace App\Http\Validations\Job;

use App\Http\Logic\Job\JobLogic;
use App\Http\Validations\Validation;
use Illuminate\Http\Request;
use Validator;
use App\Exceptions\BadRequestException;
use App\Exceptions\ForbiddenException;

class JobValidation extends Validation
{
    protected $jobLogic;

    public function __construct(Request $request,JobLogic $jobLogic)
    {
        parent::__construct($request);
        $this->jobLogic = $jobLogic;
    }

    /**
     * @return array
     */
    public function storeNewJob()
    {
        $input = $this->filterRequest([
            'job','department','introduction','requirement']);

        $rules = [
            'job' => ['string'],
            'department' => ['string'],
            'introduction' => ['string'],
            'requirement' => ['string'],
        ];

        $validator = Validator::make($input,$rules);
        if ($validator->fails()) {
            throw new BadRequestException($validator->errors());
        }

        return $input;
    }

    /**
     * @param $stationID
     * @return array
     */
    public function updateJob($jobId)
    {
        $input = $this->filterRequest([
            'job','department','introduction','requirement']);

        $rules = [
            'job' => ['string'],
            'department' => ['string'],
            'introduction' => ['string'],
            'requirement' => ['string'],
        ];

        $validator = Validator::make($input,$rules);
        if ($validator->fails()) {
            throw new BadRequestException($validator->errors());
        }

        $job= $this->jobLogic->findJob($jobId);
        if($job->id != $jobId) {
            throw new ForbiddenException();
        }

        return $input;
    }

    /**
     * @return mixed
     */
    public function deleteJob()
    {
        $jobId = $this->filterRequest(['id']);
//        $employeeId = json_decode($input['id']);

        if (empty($jobId)) {
            throw new BadRequestException();
        }

        return $jobId;
    }

    /**
     * @return array
     */
    public function jobPaginate()
    {
        $input = $this->filterRequest(['page', 'cursor_page', 'order_column', 'order_direction']);

        $rules = [
            'page'            => ['integer'],
            'page_size'       => ['integer'],
            'cursor_page'     => ['integer'],
            'order_column'    => ['string', 'in:created_at,updated_at'],
            'order_direction' => ['string', 'in:asc,desc'],
        ];

        $validator  = Validator::make($input, $rules);

        if ($validator->fails()) {
            throw new BadRequestException($validator->errors());
        }

        return $input;
    }

}
