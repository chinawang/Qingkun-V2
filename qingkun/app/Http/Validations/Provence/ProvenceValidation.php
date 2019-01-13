<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2019/1/13
 * Time: 16:18
 */

namespace App\Http\Validations\Provence;

use App\Http\Logic\Provence\ProvenceLogic;
use App\Http\Validations\Validation;
use Illuminate\Http\Request;
use Validator;
use App\Exceptions\BadRequestException;
use App\Exceptions\ForbiddenException;


class ProvenceValidation extends Validation
{
    protected $provenceLogic;

    public function __construct(Request $request,ProvenceLogic $provenceLogic)
    {
        parent::__construct($request);
        $this->provenceLogic = $provenceLogic;
    }

    /**
     * @return array
     */
    public function storeNewProvence()
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
    public function updateProvence($provenceId)
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

        $provence= $this->provenceLogic->findProvence($provenceId);
        if($provence->id != $provenceId) {
            throw new ForbiddenException();
        }

        return $input;
    }

    /**
     * @return mixed
     */
    public function deleteProvence()
    {
        $provenceId = $this->filterRequest(['id']);
//        $employeeId = json_decode($input['id']);

        if (empty($provenceId)) {
            throw new BadRequestException();
        }

        return $provenceId;
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
