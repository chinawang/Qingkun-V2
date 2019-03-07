<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2018/8/13
 * Time: 08:14
 */

namespace App\Http\Logic\Banner;

use App\Repositories\Banner\BannerRepository;
use Support\Logic\Logic;

class BannerLogic extends Logic
{
    protected $bannerRepository;

    public function __construct(BannerRepository $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }

    public function findBanner($bannerId)
    {
        $conditions = ['delete_process' => 0,'id' => $bannerId];
        $banner = $this->bannerRepository->findBy($conditions);
        return $banner;
    }

    public function getBanners($pageSize, $orderColumn, $orderDirection, $cursorPage = null)
    {
        $conditions = ['delete_process' => 0];
        $bannerList = $this->bannerRepository->getPaginate($conditions,$pageSize,$orderColumn,$orderDirection,$cursorPage);
        return $bannerList;
    }

    public function getBannersBy($conditions,$pageSize, $orderColumn, $orderDirection, $cursorPage = null)
    {
        $bannerList = $this->bannerRepository->getPaginate($conditions,$pageSize,$orderColumn,$orderDirection,$cursorPage);
        return $bannerList;
    }

    public function getBannersByIDs($bannerIDs)
    {
        $bannerList = $this->bannerRepository->get($bannerIDs);
        return $bannerList;
    }

    public function getAllBanners()
    {
        $conditions = ['delete_process' => 0];
        $bannerList = $this->bannerRepository->increment($conditions,'index');
        return $bannerList;
    }

    public function createBanner($attributes)
    {
        return $this->bannerRepository->create($attributes);
    }

    public function updateBanner($bannerId,$input)
    {
        return $this->bannerRepository->update($bannerId,$input);
    }

    public function deleteBanner($bannerId)
    {
        return $this->bannerRepository->deleteByFlag($bannerId);
    }

}
