<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2018/8/12
 * Time: 07:37
 */

namespace App\Http\Validations\Award;

use App\Http\Logic\Award\AwardLogic;
use App\Http\Validations\Validation;
use Illuminate\Http\Request;
use Validator;
use App\Exceptions\BadRequestException;
use App\Exceptions\ForbiddenException;

class AwardValidation extends Validation
{
    protected $awardLogic;

    public function __construct(Request $request,AwardLogic $awardLogic)
    {
        parent::__construct($request);
        $this->awardLogic = $awardLogic;
    }

    /**
     * @return array
     */
    public function storeNewAward()
    {
        $input = $this->filterRequest([
            'name','photo','remark','time','introduction']);

        $rules = [
            'name' => ['string'],
            'photo' => ['string'],
            'remark' => ['string'],
            'time' => ['string'],
            'introduction' => ['string'],
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
    public function updateAward($awardId)
    {
        $input = $this->filterRequest([
            'name','photo','remark','time','introduction']);

        $rules = [
            'name' => ['string'],
            'photo' => ['string'],
            'remark' => ['string'],
            'time' => ['string'],
            'introduction' => ['string'],
        ];

        $validator = Validator::make($input,$rules);
        if ($validator->fails()) {
            throw new BadRequestException($validator->errors());
        }

        $award= $this->awardLogic->findAward($awardId);
        if($award->id != $awardId) {
            throw new ForbiddenException();
        }

        return $input;
    }

    /**
     * @return mixed
     */
    public function deleteAward()
    {
        $awardId = $this->filterRequest(['id']);
//        $employeeId = json_decode($input['id']);

        if (empty($awardId)) {
            throw new BadRequestException();
        }

        return $awardId;
    }

    /**
     * @return array
     */
    public function awardPaginate()
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
