<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Sertifikat extends BaseController
{

    protected $Model_sertifikat;

    public function index()
    {
        $data = [
            'judul' => 'Tabel Sertifikat'
        ];
        return view('Admin/viewTSertifikat', $data);
    }

    public function add_sertifikat()
    {
    }

    public function update_sertifikat()
    {
    }

    public function delete_sertifikat()
    {
    }
}