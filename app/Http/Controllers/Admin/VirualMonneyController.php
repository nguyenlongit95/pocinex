<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\VirualMoney\VirualMoneyRepositoryInterface;
use App\Validations\Validation;
use Illuminate\Http\Request;

class VirualMonneyController extends Controller
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
        $virualMoneys = $this->virualMoneyRepository->getAll(config('const.paginate'), 'ASC');
        return view('admin.pages.virual_money.index', compact('virualMoneys'));
    }

    /**
     * Controller render view add money
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view('admin.pages.virual_money.add');
    }

    /**
     * Controller function store a virual money
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $param = $request->all();
        Validation::validationVirualMoney($request);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file->move(public_path('image/virual_money/'),  $file->getClientOriginalName());
            $param['image'] = $file->getClientOriginalName();
            if ($this->virualMoneyRepository->create($param)) {
                redirect('/admin/tien-ao/')->with('status', 'Thêm bản ghi thành công.');
            }
            return redirect('/admin/tien-ao/')->with('status', 'Thêm thất bại, kiểm tra lại dữ liệu.');
        } else {
            return redirect('/admin/tien-ao/add')->with('status', 'Bạn hãy chọn hình ảnh.');
        }
    }

    /**
     * Controller function find a virual money
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $virualMoney = $this->virualMoneyRepository->find($id);
        if (!$virualMoney) {
            return redirect('/admin/tien-ao/')->with('status', 'Không tìm thấy dữ liệu.');
        }

        return view('admin.pages.virual_money.edit', compact('virualMoney'));
    }

    /**
     * Controller function update a virual money
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $virualMoney = $this->virualMoneyRepository->find($id);
        if (!$virualMoney) {
            return redirect('/admin/tien-ao/')->with('status', 'Không tìm thấy dữ liệu.');
        }
        Validation::validationVirualMoney($request);

        $param = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file->move(public_path('image/virual_money/'),  $file->getClientOriginalName());
            $param['image'] = $file->getClientOriginalName();
        }

        if ($this->virualMoneyRepository->update($param, $id)) {
            redirect('/admin/tien-ao/' . $id . '/edit')->with('status', 'Chỉnh sửa bản ghi thành công.');
        }

        return redirect('/admin/tien-ao/')->with('status', 'Chỉnh sửa thất bại, kiểm tra lại dữ liệu.');
    }

    /**
     * Controller function delete a money
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, $id)
    {
        $virualMoney = $this->virualMoneyRepository->find($id);
        if (!$virualMoney) {
            return redirect('/admin/tien-ao/')->with('status', 'Không tìm thấy dữ liệu.');
        }

        $image = $virualMoney->image;
        if ($this->virualMoneyRepository->delete($virualMoney->id)) {
            unlink(public_path('image/virual_money/' . $image));
        }

        return redirect('/admin/tien-ao/')->with('status', 'Xóa dữ liệu không thành công, hãy kiểm tra lại hệ thống.');
    }
}
