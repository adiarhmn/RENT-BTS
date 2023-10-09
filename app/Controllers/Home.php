<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Home extends BaseController
{
    protected $User;

    public function __construct()
    {
        $this->User = new UsersModel();
    }

    public function index(): string
    {
        $userData = $this->User->getData();

        $data = [
            'page' => 'dashboard',
            'user' => count($userData),
        ];
        return view('dashboard', $data);
    }
}
