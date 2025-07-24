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
        $articles = $this->articleModel
            ->select("articles.*, users.first_name")
            ->join("users", "users.id = articles.users_id")
            ->orderBy("created_at")
            ->paginate(3);

        return view("Articles/index", [
            "articles" => $articles,
            "pager" => $this->articleModel->pager,
        ]);
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

        if (!$article->isOwner() && !auth()->user()->can("articles.delete")) {
            return redirect()->to('/articles')
                ->with('error', 'You do not have permission to edit the article.');
        }

        return view('Articles/edit', [
            'article' => $article,
        ]);
    }

    public function update($id)
    {
        $article = $this->getArticleor404($id);

        if (!$article->isOwner() && !auth()->user()->can("articles.edit")) {
            return redirect()->to('/articles')
                ->with('error', 'You do not have permission to update the article.');
        }
        $article->fill($this->request->getPost());

        $article->__unset("_method");

        if (!$article->hasChanged()) {
            return redirect()
                ->to(base_url('/articles'))
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

        if (!$article->isOwner() && !auth()->user()->can("articles.delete")) {
            return redirect()->to('/articles')
                ->with('error', 'You do not have permission to delete the article.');
        }

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
