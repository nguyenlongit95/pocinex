<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Repositories\Articles\ArticleRepositoryInterface;
use App\Support\ResponseHelper;
use Illuminate\Http\Request;
use Auth;
use Illuminate\View\View;
use DB;

class IndexController extends Controller
{
    /**
     * @var ArticleRepositoryInterface
     */
    private  $articleRepository;

    /**
     * IndexController constructor.
     * @param ArticleRepositoryInterface $articleRepository
     */
    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;

        // View share settings elements
        $settings = DB::table('settings')->get();
        if (!empty($settings)) {
            $arrSettings = null;
            foreach ($settings as $setting) {
                if ($setting->key == 'link_btn_two') {
                    $arrSettings['link_btn_two'] = $setting;
                }
                if ($setting->key == 'link_btn_three') {
                    $arrSettings['link_btn_three'] = $setting;
                }
                if ($setting->key == 'zalo') {
                    $arrSettings['zalo'] = $setting;
                }
                if ($setting->key == 'bank_name') {
                    $arrSettings['bank_name'] = $setting;
                }
                if ($setting->key == 'bank_number') {
                    $arrSettings['bank_number'] = $setting;
                }
                if ($setting->key == 'bank_account_name') {
                    $arrSettings['bank_account_name'] = $setting;
                }
                if ($setting->key == 'send_notification') {
                    $arrSettings['send_notification'] = $setting;
                }
                if ($setting->key == 'banner_slogan') {
                    $arrSettings['banner_slogan'] = $setting;
                }
                if ($setting->key == 'banner_info') {
                    $arrSettings['banner_info'] = $setting;
                }
                if ($setting->key == 'banner_button_one') {
                    $arrSettings['banner_button_one'] = $setting;
                }
                if ($setting->key == 'banner_button_two') {
                    $arrSettings['banner_button_two'] = $setting;
                }
                if ($setting->key == 'banner_button_three') {
                    $arrSettings['banner_button_three'] = $setting;
                }
                if ($setting->key == 'footer_info') {
                    $arrSettings['footer_info'] = $setting;
                }
                if ($setting->key == 'hot_line') {
                    $arrSettings['hot_line'] = $setting;
                }
            }
            View()->share('settings', $arrSettings);
        }

        $banner = DB::table('banners')->where('status', 1)->first();
        View()->share('banner', $banner);

        $virualMoney = DB::table('virtual_money')->first();
        View()->share('virualMoney', $virualMoney);

        $initUSDT = DB::table('virtual_money')->where('code', 'USDT')->first();
        View()->share('initUSDT', $initUSDT);
    }

    /**
     * Controller function render view index page
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function index()
    {
        $articles = $this->articleRepository->getAll(config('const.front_end_paginate'), 'DESC');
        return view('frontend.pages.index', compact('articles'));
    }

    /**
     * Controller function get virual money and response data
     *
     * @param Request $request
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function selectCoin(Request $request)
    {
        $param = $request->all();
        $coin = DB::table('virtual_money')->where('code', $param['coin'])->first();
        if (!empty($coin)) {
            $coin->buy = number_format($coin->buy, 0);
            $coin->sell = number_format($coin->sell, 0);
            $coin->image = asset('image/virual_money/' . $coin->image);
        }

        return app()->make(ResponseHelper::class)->success($coin);
    }
    /**
     * Controller function get virual money and response data
     *
     * @param Request $request
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function findCoin(Request $request)
    {
        $param = $request->all();
        $coin = DB::table('virtual_money')->where('code', $param['coin'])->first();
        if (!empty($coin)) {
            $coin->image = asset('image/virual_money/' . $coin->image);
        }

        return app()->make(ResponseHelper::class)->success($coin);
    }

    /**
     * Controller function render view tin tuc
     *
     * @param Request $request
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function showTinTuc(Request $request, $slug)
    {
        $articles = $this->articleRepository->getAll(config('const.front_end_paginate'), 'DESC');
        $articleDetail = $this->articleRepository->getArticle($slug);
        if (!$articleDetail) {
            return redirect('/');
        }

        return view('frontend.pages.tintuc', compact('articles', 'articleDetail'));
    }

    /**
     * Controller function render view support "dai ly"
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function daiLy(Request $request)
    {
        $articles = $this->articleRepository->getAll(config('const.front_end_paginate'), 'DESC');
        $daily = \Illuminate\Support\Facades\DB::table('agency')->first();
        return view('frontend.pages.daily', compact('articles', 'daily'));
    }
}
