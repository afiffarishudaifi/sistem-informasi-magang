<?php

namespace App\Controllers\Sekolah;

use App\Controllers\BaseController;
use App\Models\Model_peserta;
use App\Models\Model_pengajuan;

class Peserta extends BaseController
{

    protected $Model_peserta;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Sekolah') {
            return redirect()->to('Login');
        }
        $this->Model_peserta = new Model_peserta();
        helper(['form', 'url']);
        $this->db = db_connect();
    }

    public function Aktif()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Sekolah') {
            return redirect()->to('Login');
        }
        
        $id = $session->get('id_login');

        $model = new Model_peserta();
        $siswa = $model->view_data_aktif($id)->getResultArray();

        $data = [
            'judul' => 'Data Peserta Aktif',
            'siswa' => $siswa
        ];
        return view('Sekolah/viewTPesertaAktif', $data);
    }

    public function TidakAktif()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Sekolah') {
            return redirect()->to('Login');
        }
        
        $id = $session->get('id_login');

        $model = new Model_peserta();
        $siswa = $model->view_data_tidak_aktif($id)->getResultArray();

        $data = [
            'judul' => 'Data Peserta Aktif',
            'siswa' => $siswa
        ];
        return view('Sekolah/viewTPesertaTidakAktif', $data);
    }

    public function Pengajuan()
    {
    	$session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Sekolah') {
            return redirect()->to('Login');
        }
        
        $id = $session->get('id_login');

    	$model = new Model_pengajuan();
        $pengajuan = $model->view_data_sekolah($id)->getResultArray();

        $data = [
            'judul' => 'Tabel Pengajuan Magang',
            'pengajuan' => $pengajuan
        ];
        return view('Sekolah/viewTPengajuan', $data);
    }
}
