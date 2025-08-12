<?php

namespace App\Controllers\Article;

use App\Models\ArticleModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Exceptions\PageNotFoundException;

class Image extends BaseController
{

    protected ArticleModel $articleModel;

    public function __construct()
    {
        $this->articleModel = new ArticleModel();
    }

    public function new($id)
    {
        $article = $this->getArticleor404($id);

        return view("Article/Image/new",[
            'article' => $article,
        ]);
    }

    public function create($id)
    {
        $article = $this->getArticleor404($id);

        $file = $this->request->getFile("article_image");

        dd($file);
    }

    private function getArticleor404($id)
    {
        $article = $this->articleModel->find($id);

        if (!$article) {
            throw PageNotFoundException::forPageNotFound("Article not found");
        }

        return $article;
    }
}
