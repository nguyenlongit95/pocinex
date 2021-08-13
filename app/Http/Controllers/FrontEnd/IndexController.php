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
                if ($setting->key == 'facebook') {
                    $arrSettings['facebook'] = $setting;
                }
                if ($setting->key == 'telegram') {
                    $arrSettings['telegram'] = $setting;
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
            }
            View()->share('settings', $arrSettings);
        }

        $banner = DB::table('banners')->where('status', 1)->first();
        View()->share('banner', $banner);

        $virualMoney = DB::table('virtual_money')->get();
        View()->share('virualMoney', $virualMoney);

        $initBtc = DB::table('virtual_money')->where('code', 'btc')->first();
        View()->share('initBtc', $initBtc);
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
