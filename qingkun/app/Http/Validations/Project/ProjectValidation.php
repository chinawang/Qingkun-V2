<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2018/8/12
 * Time: 07:38
 */

namespace App\Http\Validations\Project;

use App\Http\Logic\Project\ProjectLogic;
use App\Http\Validations\Validation;
use Illuminate\Http\Request;
use Validator;
use App\Exceptions\BadRequestException;
use App\Exceptions\ForbiddenException;

use Illuminate\Support\Facades\Input;

class ProjectValidation extends Validation
{
    protected $projectLogic;

    public function __construct(Request $request,ProjectLogic $projectLogic)
    {
        parent::__construct($request);
        $this->projectLogic = $projectLogic;
    }

    /**
     * @return array
     */
    public function storeNewProject()
    {
        $input = $this->filterRequest([
            'name','abstract','introduction','photo_large_1','photo_large_2','photo_large_3','photo_large_4'
            ,'photo_large_5','photo_small_1','photo_small_2','photo_small_3','photo_small_4','photo_small_5'
            ,'address','design_time','build_time','type','size','land_size','stage','flag']);

        $rules = [
            'name' => ['string'],
            'abstract' => ['string'],
            'introduction' => ['string'],
            'photo_large_1' => ['string'],
            'photo_large_2' => ['string'],
            'photo_large_3' => ['string'],
            'photo_large_4' => ['string'],
            'photo_large_5' => ['string'],
            'photo_small_1' => ['string'],
            'photo_small_2' => ['string'],
            'photo_small_3' => ['string'],
            'photo_small_4' => ['string'],
            'photo_small_5' => ['string'],
            'design_time' => ['string'],
            'build_time' => ['string'],
            'type' => ['string'],
            'size' => ['string'],
            'land_size' => ['nullable','string'],
            'stage' => ['nullable','string'],
            'flag' => ['nullable','string'],
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
    public function updateProject($projectId)
    {
        $input = $this->filterRequest([
            'name','abstract','introduction','photo_large_1','photo_large_2','photo_large_3','photo_large_4'
            ,'photo_large_5','photo_small_1','photo_small_2','photo_small_3','photo_small_4','photo_small_5'
            ,'address','design_time','build_time','type','size','land_size','stage','flag']);

//        $input = Input::all();


        $rules = [
            'name' => ['required','string'],
            'abstract' => ['nullable','string',NULL],
            'introduction' => ['nullable','string'],
            'photo_large_1' => ['nullable','string'],
            'photo_large_2' => ['nullable','string'],
            'photo_large_3' => ['nullable','string'],
            'photo_large_4' => ['nullable','string'],
            'photo_large_5' => ['nullable','string'],
            'photo_small_1' => ['nullable','string'],
            'photo_small_2' => ['nullable','string'],
            'photo_small_3' => ['nullable','string'],
            'photo_small_4' => ['nullable','string'],
            'photo_small_5' => ['nullable','string'],
            'design_time' => ['nullable','string'],
            'build_time' => ['nullable','string'],
            'type' => ['nullable','string'],
            'size' => ['nullable','string'],
            'land_size' => ['nullable','string'],
            'stage' => ['nullable','string'],
            'flag' => ['nullable','string'],
        ];

        $validator = Validator::make($input,$rules);
        if ($validator->fails()) {
            throw new BadRequestException($validator->errors());
        }

        $project= $this->projectLogic->findProject($projectId);
        if($project->id != $projectId) {
            throw new ForbiddenException();
        }

        return $input;
    }

    /**
     * @return mixed
     */
    public function deleteProject()
    {
        $projectId = $this->filterRequest(['id']);
//        $employeeId = json_decode($input['id']);

        if (empty($projectId)) {
            throw new BadRequestException();
        }

        return $projectId;
    }

    /**
     * @return array
     */
    public function projectPaginate()
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
