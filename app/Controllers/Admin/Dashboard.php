<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{

    protected $Model_dashboard;
    public function __construct()
    {
        $session = session();

        // if (!$session->get('nama_login') || $session->get('status_login') != 'Siswa' || $session->get('status_login') != 'Sekolah') {
        //     return redirect()->to('Login');
        // }

        helper(['form', 'url']);
    }

    public function index()
    {
        $data = [
            'judul' => 'Tabel Admin'
        ];
        return view('Admin/index', $data);
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