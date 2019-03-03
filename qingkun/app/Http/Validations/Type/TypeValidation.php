<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2019/1/13
 * Time: 16:11
 */

namespace App\Http\Validations\Type;


use App\Http\Logic\Type\TypeLogic;
use App\Http\Validations\Validation;
use Illuminate\Http\Request;
use Validator;
use App\Exceptions\BadRequestException;
use App\Exceptions\ForbiddenException;

class TypeValidation extends Validation
{
    protected $typeLogic;

    public function __construct(Request $request,TypeLogic $typeLogic)
    {
        parent::__construct($request);
        $this->typeLogic = $typeLogic;
    }

    /**
     * @return array
     */
    public function storeNewType()
    {
        $input = $this->filterRequest([
            'name','photo']);

        $rules = [
            'name' => ['string'],
            'photo' => ['string'],
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
    public function updateType($typeId)
    {
        $input = $this->filterRequest([
            'name','photo']);

        $rules = [
            'name' => ['string'],
            'photo' => ['string'],
        ];

        $validator = Validator::make($input,$rules);
        if ($validator->fails()) {
            throw new BadRequestException($validator->errors());
        }

        $type= $this->typeLogic->findType($typeId);
        if($type->id != $typeId) {
            throw new ForbiddenException();
        }

        return $input;
    }

    /**
     * @return mixed
     */
    public function deleteType()
    {
        $typeId = $this->filterRequest(['id']);
//        $employeeId = json_decode($input['id']);

        if (empty($typeId)) {
            throw new BadRequestException();
        }

        return $typeId;
    }

    /**
     * @return array
     */
    public function newsPaginate()
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
