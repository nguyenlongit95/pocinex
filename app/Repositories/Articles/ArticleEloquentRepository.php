<?php

namespace App\Repositories\Articles;

use App\Models\Article;
use App\Repositories\Eloquent\EloquentRepository;

class ArticleEloquentRepository extends EloquentRepository implements ArticleRepositoryInterface
{

    /**
     * @return mixed
     */
    public function getModel()
    {
        return Article::class;
    }

    /**
     * Function sql select a article using slug
     *
     * @param string $slug
     * @return mixed
     */
    public function getArticle($slug)
    {
        return Article::where('slug', $slug)->first();
    }
}
