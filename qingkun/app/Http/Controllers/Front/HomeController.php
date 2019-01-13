<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Logic\Banner\BannerLogic;
use App\Http\Validations\Banner\BannerValidation;
use App\Http\Logic\News\NewsLogic;
use App\Http\Validations\News\NewsValidation;
use App\Http\Logic\Award\AwardLogic;
use App\Http\Validations\Award\AwardValidation;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    protected $bannerLogic;

    protected $bannerValidation;

    protected $newsLogic;

    protected $newsValidation;

    protected $awardLogic;

    protected $awardValidation;

    public function __construct(BannerLogic $bannerLogic,BannerValidation $bannerValidation,
                                NewsLogic $newsLogic,NewsValidation $newsValidation,
                                AwardLogic $awardLogic,AwardValidation $awardValidation)
    {

        $this->bannerLogic = $bannerLogic;
        $this->bannerValidation = $bannerValidation;

        $this->newsLogic = $newsLogic;
        $this->newsValidation = $newsValidation;

        $this->awardLogic = $awardLogic;
        $this->awardValidation = $awardValidation;
    }

    public function homeData()
    {
        $banners = $this->bannerLogic->getAllBanners();
        $posts = $this->newsLogic->getAllPosts();
        $awards = $this->awardLogic->getAllAwards();

        $param = ['banners' => $banners,'posts' => $posts,'awards' => $awards];

        return view('front.online.home',$param);
    }

    public function newsInfo($newsID)
    {
        $post = $this->newsLogic->findPost($newsID);
        $param = ['post' => $post];
        return view('front.online.newsDetail',$param);
    }

    public function awardInfo($awardID)
    {
        $award = $this->awardLogic->findAward($awardID);
        $param = ['award' => $award];
        return view('front.online.awardDetail',$param);
    }
}
