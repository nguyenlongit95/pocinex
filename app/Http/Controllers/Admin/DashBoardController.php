<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class DashBoardController extends Controller
{
    protected $signature = 'sitemap:create';

    /**
     * Render view dashboard
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('admin.pages.dashboard');
    }

    /**
     * Render site map
     */
    public function renderSiteMap()
    {
        $siteMap = App::make('sitemap');
        $siteMap->add(URL::to('/'), Carbon::now(), '1.0', 'daily');
        $siteMap->add(URL::to('/dai-ly'), Carbon::now(), '0.8', 'daily');
        $articles = \DB::table('articles')->get();
        if (!empty($articles)) {
            foreach ($articles as $article) {
                $siteMap->add(URL::to('/tin-tuc/' . $article->slug), Carbon::now(), '0.8', 'daily');
            }
        }
        try {
            $siteMap->store('xml', 'sitemap');
            return redirect('/admin')->with('status', 'Cập nhật site map thành công.');
        } catch (\Exception $exception) {
            return redirect('/admin')->with('status', 'Cập nhật site map thất bại.');
        }
    }
}
