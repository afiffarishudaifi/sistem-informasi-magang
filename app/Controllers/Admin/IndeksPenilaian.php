<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class IndeksPenilaian extends BaseController
{

    protected $Model_indeks;

    public function index()
    {
        $data = [
            'judul' => 'Tabel Indeks Penilaian'
        ];
        return view('Admin/viewTIndeksPenilaian', $data);
    }

    public function add_indeks()
    {
    }

    public function update_indeks()
    {
    }

    public function delete_indeks()
    {
    }
}