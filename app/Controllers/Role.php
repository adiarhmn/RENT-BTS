<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RoleModel;

class Role extends BaseController
{
    protected $Role;
    public function __construct()
    {
        $this->Role = new RoleModel();
    }

    // Fungsi Index
    public function index()
    {
        $data = [
            'page'      => 'role',
            'list_role' => $this->Role->getData(),
        ];

        return view('_role/indexRole', $data);
    }
}
