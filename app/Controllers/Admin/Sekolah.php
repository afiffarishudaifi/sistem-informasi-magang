<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Sekolah extends BaseController
{

    protected $Model_sekolah;

    public function index()
    {
        $data = [
            'judul' => 'Tabel Sekolah'
        ];
        return view('Admin/viewTSekolah', $data);
    }

    public function add_sekolah()
    {
    }

    public function update_sekolah()
    {
    }

    public function delete_sekolah()
    {
    }
}