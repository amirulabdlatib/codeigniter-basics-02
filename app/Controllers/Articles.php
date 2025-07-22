<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Articles extends BaseController
{
    public function index()
    {
        return view("Articles/index", ['title' => 'Articles']);
    }
}
