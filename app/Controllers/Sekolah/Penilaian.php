<?php

namespace App\Controllers\Sekolah;

use App\Controllers\BaseController;
use App\Models\Model_nilai;
use App\Models\Model_peserta;

class Penilaian extends BaseController
{

    protected $Model_nilai;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Sekolah') {
            return redirect()->to('Login');
        }
        $this->Model_nilai = new Model_nilai();
        helper(['form', 'url']);
        $this->db = db_connect();
    }

    public function index()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Sekolah') {
            return redirect()->to('Login');
        }
        
        $model = new Model_nilai();
        $id = $session->get('id_login');
        $nilai = $model->view_data_sekolah($id)->getResultArray();

        $data = [
            'judul' => 'Tabel Nilai Peserta',
            'nilai' => $nilai
        ];
        return view('Sekolah/viewNilaiPeserta', $data);
    }
}
