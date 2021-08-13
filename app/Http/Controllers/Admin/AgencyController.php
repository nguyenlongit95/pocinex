<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AgencyController extends Controller
{
    /**
     * Controller function render all virual money
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $agency = DB::table('agency')->first();
        return view('admin.pages.agency.index', compact('agency'));
    }

    /**
     * Controller function action agency
     *
     * @param Request $request
     * @param integer $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $param = $request->all();
        try {
            DB::table('agency')->where('id', $id)->update([
                'description' => $param['description'],
            ]);
            return redirect('/admin/dai-ly/')->with('status', 'Cập nhật bản ghi thành công.');
        } catch (\Exception $exception) {
            Log::error($exception);
            return redirect('/admin/dai-ly/')->with('status', 'Lỗi hệ thống, hãy kiểm tra lại.');
        }
    }
}
