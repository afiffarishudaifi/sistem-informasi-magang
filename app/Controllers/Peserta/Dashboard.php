<?php

namespace App\Controllers\Peserta;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{

    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Siswa') {
            return redirect()->to('Login');
        }

        helper(['form', 'url']);
    }

    public function index()
    {   
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Siswa') {
            return redirect()->to('Login');
        }
        
        $data = [
            'judul' => 'Tabel Siswa'
        ];
        return view('Peserta/index', $data);
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
