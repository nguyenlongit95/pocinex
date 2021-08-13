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

class BankController extends Controller
{
    /**
     * @var VirualMoneyRepositoryInterface
     */
    private $virualMoneyRepository;

    /**
     * VirualMonneyController constructor.
     * @param VirualMoneyRepositoryInterface $virualMoneyRepository
     */
    public function __construct(VirualMoneyRepositoryInterface $virualMoneyRepository)
    {
        $this->virualMoneyRepository = $virualMoneyRepository;
    }

    /**
     * Controller function render all virual money
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $usd = DB::table('trading_usd')->join('virtual_money', 'trading_usd.coin_id', 'virtual_money.id')
            ->select(
                'trading_usd.id', 'trading_usd.date', 'trading_usd.exchange_rate', 'trading_usd.coin_id',
                'virtual_money.image'
            )->get();
        if (!empty($usd)) {
            foreach ($usd as $value) {
                $value->date = Carbon::create($value->date)->format('d-m-Y');
            }
        }

        $vnd = DB::table('trading_vnd')->join('virtual_money', 'trading_vnd.coin_id', 'virtual_money.id')
            ->select(
            'trading_vnd.id', 'trading_vnd.date', 'trading_vnd.exchange_rate', 'trading_vnd.coin_id',
            'virtual_money.image'
        )->get();
        if (!empty($vnd)) {
            foreach ($vnd as $value) {
                $value->date = Carbon::create($value->date)->format('d-m-Y');
            }
        }
        $virualMoney = DB::table('virtual_money')->get();

        return view('admin.pages.bank.index', compact('usd', 'vnd', 'virualMoney'));
    }

    /**
     * Controller function add new usd
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addUSD(Request $request)
    {
        $param = $request->all();
        Validation::validationUSDVND($request);
        try {
            DB::table('trading_usd')->insert([
                'date' => $param['date'],
                'exchange_rate' => $param['exchange_rate'],
                'coin_id' => $param['coin_id'],
            ]);

            return redirect('/admin/ty-suat-ngan-hang/')->with('status', 'Thêm bản ghi thành công.');
        } catch (\Exception $exception) {
            Log::error($exception);
            return redirect()->back()->with('status', 'Lỗi hệ thống, hãy kiểm tra lại');
        }
    }

    /**
     * Controller function edit USD
     *
     * @param Request $request
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function editUSD(Request $request)
    {
        $param = $request->all();
        try {
            DB::table('trading_usd')->where('id', $param['id'])->update([
                'exchange_rate' => $param['_exchangeRage'],
            ]);
            return app()->make(ResponseHelper::class)->success();
        } catch (\Exception $exception) {
            Log::error($exception);
            return app()->make(ResponseHelper::class)->error();
        }
    }

    /**
     * Controller function edit vnd
     *
     * @param Request $request
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function editVND(Request $request)
    {
        $param = $request->all();
        try {
            DB::table('trading_vnd')->where('id', $param['id'])->update([
                'exchange_rate' => $param['_exchangeRage'],
            ]);
            return app()->make(ResponseHelper::class)->success();
        } catch (\Exception $exception) {
            Log::error($exception);
            return app()->make(ResponseHelper::class)->error();
        }
    }

    /**
     * Controller function add new usd
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addVND(Request $request)
    {
        $param = $request->all();
        Validation::validationUSDVND($request);
        try {
            DB::table('trading_vnd')->insert([
                'date' => $param['date'],
                'exchange_rate' => $param['exchange_rate'],
                'coin_id' => $param['coin_id'],
            ]);

            return redirect('/admin/ty-suat-ngan-hang/')->with('status', 'Thêm bản ghi thành công.');
        } catch (\Exception $exception) {
            Log::error($exception);
            return redirect()->back()->with('status', 'Lỗi hệ thống, hãy kiểm tra lại');
        }
    }
}
