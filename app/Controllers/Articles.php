<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\Article;
use App\Models\ArticleModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\ResponseInterface;

class Articles extends BaseController
{
    protected $articleModel;

    public function __construct()
    {
        $this->articleModel = new ArticleModel();
    }

    public function index()
    {
        $articles = $this->articleModel->findAll();

        return view("Articles/index", ["articles" => $articles]);
    }

    public function show($id)
    {
        $article = $this->getArticleor404($id);

        return view('Articles/show', [
            'article' => $article,
        ]);
    }

    public function create()
    {
        return view('Articles/create', [
            'article' => new Article
        ]);
    }

    public function store()
    {
        $article = new Article($this->request->getPost());

        $id = $this->articleModel->insert($article);

        if ($id === false) {
            return redirect()
                ->back()
                ->with("errors", $this->articleModel->errors())
                ->withInput();
        }

        return redirect()
            ->to("articles/$id")
            ->with("message", "Article saved");;
    }

    public function edit($id)
    {
        $article = $this->getArticleor404($id);

        return view('Articles/edit', [
            'article' => $article,
        ]);
    }

    public function update($id)
    {
        $article = $this->getArticleor404($id);

        $article->fill($this->request->getPost());

        if (!$article->hasChanged()) {
            return redirect()
                ->back()
                ->with("message", "Nothing to update.");
        }

        if ($this->articleModel->save($article)) {
            return redirect()->to("articles/$id")
                ->with("message", "Article Updated.");
        }

        return redirect()->back()
            ->with("errors", $this->articleModel->errors());
    }

    public function delete($id)
    {
        $article = $this->getArticleor404($id);

        if ($this->request->is('DELETE')) {
            $this->articleModel->delete($id);

            return redirect()
                ->to(base_url('articles'))
                ->with("message", "Article deleted.");
        }

        return view("articles/delete", [
            'article' => $article,
        ]);
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
