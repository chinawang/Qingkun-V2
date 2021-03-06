<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2017/3/30
 * Time: 20:29
 */

namespace App\Http\Validations\Rbac;


use App\Http\Validations\Validation;
use Illuminate\Http\Request;
use Validator;
use App\Exceptions\BadRequestException;

class UserRoleValidation extends Validation
{
    /**
     * UserRoleValidation constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    /**
     * @return array
     */
    public function setUserRole()
    {
        $input = $this->filterRequest(['user_id','roles']);

        $rules = [
            'user_id' => ['required','integer', 'min:0'],
            'roles' => ['required','array'],
        ];

        $validator = Validator::make($input,$rules);
        if ($validator->fails()) {
            throw new BadRequestException($validator->errors());
        }

        return $input;
    }
}