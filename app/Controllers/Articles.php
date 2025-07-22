<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Articles extends BaseController
{
    public function index()
    {
        // checking database connection
        // $db = db_connect();
        // $db->listTables();

        $data = [
            ["title" => "One", "content" => "The first"],
            ["title" => "Two", "content" => "Some content"],
        ];

        return view("Articles/index", ["articles" => $data]);
    }
}
