<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Profil extends BaseController
{

    protected $Model_profil;

    public function index()
    {
        $data = [
            'judul' => 'Profil BANKESBANPOL'
        ];
        return view('Admin/viewProfil', $data);
    }

    public function add_profil()
    {
    }

    public function update_profil()
    {
    }

    public function delete_profil()
    {
    }
}