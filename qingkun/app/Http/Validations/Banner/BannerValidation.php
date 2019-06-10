<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2018/8/12
 * Time: 07:34
 */

namespace App\Http\Validations\Banner;

use App\Http\Logic\Banner\BannerLogic;
use App\Http\Validations\Validation;
use Illuminate\Http\Request;
use Validator;
use App\Exceptions\BadRequestException;
use App\Exceptions\ForbiddenException;

class BannerValidation extends Validation
{
    protected $bannerLogic;

    public function __construct(Request $request,BannerLogic $bannerLogic)
    {
        parent::__construct($request);
        $this->bannerLogic = $bannerLogic;
    }

    /**
     * @return array
     */
    public function storeNewBanner()
    {
        $input = $this->filterRequest([
            'name','photo','remark','index','project_id']);

        $rules = [
            'name' => ['string'],
            'photo' => ['string'],
            'remark' => ['string'],
            'index' => ['integer'],
            'project_id' => ['integer'],
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
    public function updateBanner($bannerId)
    {
        $input = $this->filterRequest([
            'name','photo','remark','index','project_id']);

        $rules = [
            'name' => ['string'],
            'photo' => ['string'],
            'remark' => ['string'],
            'index' => ['integer'],
            'project_id' => ['integer'],
        ];

        $validator = Validator::make($input,$rules);
        if ($validator->fails()) {
            throw new BadRequestException($validator->errors());
        }

        $banner= $this->bannerLogic->findBanner($bannerId);
        if($banner->id != $bannerId) {
            throw new ForbiddenException();
        }

        return $input;
    }

    /**
     * @return mixed
     */
    public function deleteBanner()
    {
        $bannerId = $this->filterRequest(['id']);
//        $employeeId = json_decode($input['id']);

        if (empty($bannerId)) {
            throw new BadRequestException();
        }

        return $bannerId;
    }

    /**
     * @return array
     */
    public function bannerPaginate()
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
