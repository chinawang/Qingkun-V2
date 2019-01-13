<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2019/1/13
 * Time: 16:21
 */

namespace App\Http\Validations\Expertise;

use App\Http\Logic\Expertise\ExpertiseLogic;
use App\Http\Validations\Validation;
use Illuminate\Http\Request;
use Validator;
use App\Exceptions\BadRequestException;
use App\Exceptions\ForbiddenException;


class ExpertiseValidation extends Validation
{
    protected $expertiseLogic;

    public function __construct(Request $request,ExpertiseLogic $expertiseLogic)
    {
        parent::__construct($request);
        $this->expertiseLogic = $expertiseLogic;
    }

    /**
     * @return array
     */
    public function storeNewExpertise()
    {
        $input = $this->filterRequest([
            'name','photo','introduction','type']);

        $rules = [
            'name' => ['string'],
            'photo' => ['string'],
            'introduction' => ['string'],
            'type' => ['string'],
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
    public function updateExpertise($expertiseId)
    {
        $input = $this->filterRequest([
            'name','photo','introduction','type']);

        $rules = [
            'name' => ['string'],
            'photo' => ['string'],
            'introduction' => ['string'],
            'type' => ['string'],
        ];

        $validator = Validator::make($input,$rules);
        if ($validator->fails()) {
            throw new BadRequestException($validator->errors());
        }

        $expertise= $this->expertiseLogic->findPost($expertiseId);
        if($expertise->id != $expertiseId) {
            throw new ForbiddenException();
        }

        return $input;
    }

    /**
     * @return mixed
     */
    public function deleteExpertise()
    {
        $expertiseId = $this->filterRequest(['id']);
//        $employeeId = json_decode($input['id']);

        if (empty($expertiseId)) {
            throw new BadRequestException();
        }

        return $expertiseId;
    }

    /**
     * @return array
     */
    public function expertisePaginate()
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
