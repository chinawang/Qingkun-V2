<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2018/8/12
 * Time: 07:37
 */

namespace App\Http\Validations\News;

use App\Http\Logic\News\NewsLogic;
use App\Http\Validations\Validation;
use Illuminate\Http\Request;
use Validator;
use App\Exceptions\BadRequestException;
use App\Exceptions\ForbiddenException;

class NewsValidation extends Validation
{
    protected $newsLogic;

    public function __construct(Request $request,NewsLogic $newsLogic)
    {
        parent::__construct($request);
        $this->newsLogic = $newsLogic;
    }

    /**
     * @return array
     */
    public function storeNewNews()
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
    public function updateNews($newsId)
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

        $news= $this->newsLogic->findPost($newsId);
        if($news->id != $newsId) {
            throw new ForbiddenException();
        }

        return $input;
    }

    /**
     * @return mixed
     */
    public function deleteNews()
    {
        $newsId = $this->filterRequest(['id']);
//        $employeeId = json_decode($input['id']);

        if (empty($newsId)) {
            throw new BadRequestException();
        }

        return $newsId;
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
