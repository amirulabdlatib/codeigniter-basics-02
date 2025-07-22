<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArticleModel;
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
        $data = $this->articleModel->findAll(); // will return associative array

        return view("Articles/index", ["articles" => $data]);
    }

    public function show($id)
    {
        $article = $this->articleModel->find($id);

        return view('Articles/show', [
            'article' => $article,
        ]);
    }
}
