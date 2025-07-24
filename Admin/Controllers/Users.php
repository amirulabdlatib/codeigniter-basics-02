<?php

namespace Admin\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Shield\Entities\User;
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
        $users = $this->model->orderBy('created_at')->paginate(3);

        return view("Admin\Views\Users\index", [
            "users" => $users,
            "pager" => $this->model->pager,
        ]);
    }

    public function show($id)
    {
        $user = $this->getUserOr404($id);

        return view("Admin\Views\Users\show", [
            "user" => $user,
        ]);
    }

    public function toggleBan($id)
    {
        $user = $this->getUserOr404($id);

        if ($user->isBanned()) {
            $user->unBan();
        } else {
            $user->ban();
        }

        return redirect()
            ->redirect(base_url('admin/users'))
            ->with("message", "User status changed");
    }

    public function groups($id)
    {
        $user = $this->getUserOr404($id);

        return view("Admin\Views\Users\groups", [
            "user" => $user,
        ]);
    }

    private function getUserOr404($id)
    {
        $user = $this->model->find($id);

        if (!$user) {
            throw PageNotFoundException::forPageNotFound("User not found");
        }

        return $user;
    }
}
