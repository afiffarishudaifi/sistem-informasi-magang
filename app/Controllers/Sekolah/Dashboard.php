<?php

namespace App\Controllers\Sekolah;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $session = session();

        if (!$session->get('nama_login') || $session->get('status_login') != 'Siswa' || $session->get('status_login') != 'Sekolah') {
            return redirect()->to('Login');
        }

        helper(['form', 'url']);
    }

    public function index()
    {
        $data = [
            'judul' => 'Tabel Sekolah'
        ];
        return view('Sekolah/index', $data);
    }
}