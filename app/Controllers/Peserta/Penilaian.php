<?php

namespace App\Controllers\Peserta;

use App\Controllers\BaseController;
use App\Models\Model_nilai;

class Penilaian extends BaseController
{

    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Siswa') {
            return redirect()->to('Login');
        }
        $this->Model_nilai = new Model_nilai();

        helper(['form', 'url']);
    }

    public function index()
    {	
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Siswa') {
            return redirect()->to('Login');
        }
        
        $id = $session->get('id_login');
        $model = new Model_nilai();
        $nilai = $model->data_nilai($id)->getRowArray();

        $data = [
            'judul' => 'Penilaian ' . $session->get('nama_login'),
            'nilai' => $nilai
        ];
        return view('Peserta/viewPenilaian', $data);
    }
}
