<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Siswa extends BaseController
{

    protected $Model_siswa;

    public function index()
    {
        $data = [
            'judul' => 'Tabel Siswa'
        ];
        return view('Admin/viewTSiswa', $data);
    }

    public function add_siswa()
    {
    }

    public function update_siswa()
    {
    }

    public function delete_siswa()
    {
    }
}