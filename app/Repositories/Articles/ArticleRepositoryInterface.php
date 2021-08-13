<?php

namespace App\Repositories\Articles;

interface ArticleRepositoryInterface
{
    /**
     * @param $slug
     * @return mixed
     */
    public function getArticle($slug);
}
