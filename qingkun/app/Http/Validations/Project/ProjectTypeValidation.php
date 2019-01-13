<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2019/1/13
 * Time: 19:14
 */

namespace App\Http\Validations\Project;

use App\Http\Validations\Validation;
use Illuminate\Http\Request;
use Validator;
use App\Exceptions\BadRequestException;

class ProjectTypeValidation extends Validation
{
    /**
     * RolePermissionValidation constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    /**
     * @return array
     */
    public function setProjectType()
    {
        $input = $this->filterRequest(['project_id','types']);

        $rules = [
            'project_id' => ['required','integer', 'min:0'],
            'types' => ['required','array'],
        ];

        $validator = Validator::make($input,$rules);
        if ($validator->fails()) {
            throw new BadRequestException($validator->errors());
        }

        return $input;
    }
}
