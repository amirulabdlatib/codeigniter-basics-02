<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArticleModel;
use CodeIgniter\HTTP\ResponseInterface;

class Articles extends BaseController
{
    public function index()
    {
        $model = new ArticleModel();

        $data = $model->findAll(); // will return associative array

        return view("Articles/index", ["articles" => $data]);
    }
}
