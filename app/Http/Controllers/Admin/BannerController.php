<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\VirualMoney\VirualMoneyRepositoryInterface;
use App\Support\ResponseHelper;
use App\Validations\Validation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BannerController extends Controller
{
    /**
     * Controller function render all virual money
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $banners = DB::table('banners')->orderBy('id', 'DESC')->paginate(config('const.paginate'));
        return view('admin.pages.banners.index', compact('banners'));
    }

    /**
     * Controller function store insert a banner to DB, active this banner and unActive other banner
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        if (!$request->hasFile('banner')) {
            return redirect('/admin/banner/')->with('thong_bao', 'Bạn hãy chọn hình ảnh banner.');
        }

        $file = $request->file('banner');
        if ($file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpg') {
            try {
                $file->move(public_path('image/banner/'), $file->getClientOriginalName());
                DB::table('banners')->update([
                    'status' => 0,
                ]);
                DB::table('banners')->insert([
                    'banner' => $file->getClientOriginalName(),
                    'status' => 1
                ]);
                return redirect('/admin/banner/')->with('status', 'Thêm mới bản ghi thành công.');
            } catch (\Exception $exception) {
                Log::info($exception);
                return redirect('/admin/banner/')->with('status', 'Lỗi hệ thống, hãy kiểm tra lại');
            }
        } else {
            return redirect('/admin/banner/')->with('status', 'Sai định dạng hình ảnh.');
        }
    }

    /**
     * Controller function active an banner and un active other banner
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function active(Request $request, $id)
    {
        $banner = DB::table('banners')->where('id', $id)->first();
        if (!$banner) {
            return redirect('/admin/banner/')->with('status', 'Không tìm thấy dữ liệu.');
        }
        try {
            DB::table('banners')->update([
                'status' => 0,
            ]);
            DB::table('banners')->where('id', $id)->update([
                'status' => 1,
            ]);
            return redirect('/admin/banner/')->with('status', 'Kích hoạt thành công.');
        } catch (\Exception $exception) {
            Log::error($exception);
            return redirect('/admin/banner/')->with('status', 'Lỗi hệ thống, hãy kiểm tra lại.');
        }
    }

    /**
     * Controller function un active a banner
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function unActive(Request $request, $id)
    {
        $banner = DB::table('banners')->where('id', $id)->first();
        if (!$banner) {
            return redirect('/admin/banner/')->with('status', 'Không tìm thấy dữ liệu.');
        }
        try {
            DB::table('banners')->where('id', $id)->update([
                'status' => 0,
            ]);
            return redirect('/admin/banner/')->with('status', 'Ngừng sử dụng banner thành công.');
        } catch (\Exception $exception) {
            Log::error($exception);
            return redirect('/admin/banner/')->with('status', 'Lỗi hệ thống, hãy kiểm tra lại.');
        }
    }

    /**
     * Controller function delete a banner and unlink file image
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, $id)
    {
        $banner = DB::table('banners')->where('id', $id)->first();
        if (!$banner) {
            return redirect('/admin/banner/')->with('status', 'Không tìm thấy dữ liệu.');
        }
        try {
            $banner_path = $banner->banner;
            DB::table('banners')->where('id', $id)->delete();
            unlink(public_path('image/banner/' . $banner_path));
            return redirect('/admin/banner/')->with('status', 'Xóa banner thành công.');
        } catch (\Exception $exception) {
            Log::error($exception);
            return redirect('/admin/banner/')->with('status', 'Lỗi hệ thống, hãy kiểm tra lại.');
        }
    }
}
