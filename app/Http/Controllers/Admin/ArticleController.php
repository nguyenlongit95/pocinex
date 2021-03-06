<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Articles\ArticleRepositoryInterface;
use App\Repositories\VirualMoney\VirualMoneyRepositoryInterface;
use App\Validations\Validation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * @var VirualMoneyRepositoryInterface
     */
    private $articleRepository;

    /**
     * VirualMonneyController constructor.
     * @param ArticleRepositoryInterface $articleRepository
     */
    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * Controller function render all virual money
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $articles = $this->articleRepository->getAll(config('const.paginate'), 'DESC');
        return view('admin.pages.article.index', compact('articles'));
    }

    /**
     * Controller function render view article
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view('admin.pages.article.add');
    }

    /**
     * Controller function store a article
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $param = $request->all();
        Validation::validationArticle($request);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpg') {
                $file->move(public_path('image/articles/'), $file->getClientOriginalName());
                $param['image'] = $file->getClientOriginalName();
            }
        } else {
            return redirect('/admin/tin-tuc/add')->with('status', 'H??y ch???n h??nh ???nh c???a b??i vi???t.');
        }
        $param['time_public'] = Carbon::now();

        if ($this->articleRepository->create($param)) {
            return redirect('/admin/tin-tuc/')->with('status', 'Th??m b???n ghi th??nh c??ng.');
        }

        return redirect('/admin/tin-tuc/add')->with('status', 'Th??m b???n ghi kh??ng th??nh c??ng, h??y ki???m tra l???i.');
    }

    /**
     * Controller function render view edit article
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $article = $this->articleRepository->find($id);
        if (empty($article)) {
            return redirect('/admin/tin-tuc/')->with('status', 'Kh??ng t??m th???y b???n ghi.');
        }

        return view('admin.pages.article.edit', compact('article'));
    }

    /**
     * Controller function update an article
     *
     * @param Request $request
     * @param integer $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $article = $this->articleRepository->find($id);
        if (empty($article)) {
            return redirect('/admin/tin-tuc/')->with('status', 'Kh??ng t??m th???y b???n ghi.');
        }

        Validation::validationArticle($request);
        $param = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpg') {
                $file->move(public_path('image/articles/'), $file->getClientOriginalName());
                $param['image'] = $file->getClientOriginalName();
            }
        }

        if ($this->articleRepository->update($param, $id)) {
            return redirect('/admin/tin-tuc/')->with('status', 'C???p nh???t b??i vi???t th??nh c??ng');
        }

        return redirect()->back()->with('status', 'C???p nh???t th???t b???i, ki???m tra l???i h??? th???ng.');
    }

    /**
     * Controller function delete a article
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, $id)
    {
        $article = $this->articleRepository->find($id);
        if (empty($article)) {
            return redirect('/admin/tin-tuc/')->with('status', 'Kh??ng t??m th???y b???n ghi.');
        }

        $image = $article->image;
        if ($this->articleRepository->delete($id)) {
            unlink(public_path('image/articles/' . $image));
            return redirect('/admin/tin-tuc/')->with('status', 'C???p nh???t b??i vi???t th??nh c??ng');
        }

        return redirect('/admin/tin-tuc/')->with('status', 'C???p nh???t b??i vi???t th??nh c??ng');
    }
}
