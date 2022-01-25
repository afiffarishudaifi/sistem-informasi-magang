<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Admin extends BaseController
{

    protected $Model_admin;

    public function index()
    {
        $data = [
            'judul' => 'Tabel Admin'
        ];
        return view('Admin/viewTAdmin', $data);
    }

    public function add_admin()
    {
    }

    public function update_admin()
    {
    }

    public function delete_admin()
    {
    }
}