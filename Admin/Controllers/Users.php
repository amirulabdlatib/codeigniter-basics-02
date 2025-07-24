<?php

namespace Admin\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Users extends BaseController
{
    protected UserModel $model;

    public function __construct()
    {
        $this->model = new UserModel;
    }

    public function index()
    {
        $users = $this->model->paginate(3);

        return view("Admin\Views\Users\index", [
            "users" => $users,
            "pager" => $this->model->pager,
        ]);
    }
}
