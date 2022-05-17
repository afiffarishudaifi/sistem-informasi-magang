<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_laporan_penilaian;
use App\Models\Model_profil;

class LaporanPenilaian extends BaseController
{

    protected $Model_laporan_penilaian;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        $this->Model_laporan_penilaian = new Model_laporan_penilaian();
        helper(['form', 'url']);
        $this->db = db_connect();
    }

    public function index()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        
        $model = new Model_laporan_penilaian();
        $data = $model->view_data()->getResultArray();

        $data = [
            'judul' => 'Laporan Penilaian Peserta',
            'data' => $data
        ];
        return view('Admin/viewLaporanPenilaian', $data);
    }

    public function data($tanggal = null)
    {
        $session = session();

        if ($tanggal) $tgl = explode(' - ', $tanggal);
        if ($tanggal) { $param['cek_waktu1'] = date("Y-m-d", strtotime($tgl[0])); } else { $param['cek_waktu1'] = date("Y-m-d"); };
        if ($tanggal) { $param['cek_waktu2'] = date("Y-m-d", strtotime($tgl[1])); } else { $param['cek_waktu2'] = date("Y-m-d"); };

        $model = new Model_laporan_penilaian();
        $laporan = $model->filter($param)->getResultArray();

        $respon = $laporan;
        $data = array();

        if ($respon) {
            foreach ($respon as $value) {
                $isi['nama_siswa'] = $value['nama_siswa'];
                $isi['kedisiplinan'] = $value['kedisiplinan'];
                $isi['tanggung_jawab'] = $value['tanggung_jawab'];
                $isi['kerja_sama'] = $value['kerja_sama'];
                $isi['kerajinan'] = $value['kerajinan'];
                $isi['inisiatif'] = $value['inisiatif'];
                $isi['rata_rata'] = $value['rata_rata'];
                array_push($data, $isi);
            }
        }

        echo json_encode($data);
    }

    public function data_cetak($tanggal = null)
    {
        $session = session();
        $tanggal = $this->request->getPost('tanggal');

        if ($tanggal) $tgl = explode(' - ', $tanggal);
        if ($tanggal) { $param['cek_waktu1'] = date("Y-m-d", strtotime($tgl[0])); } else { $param['cek_waktu1'] = date("Y-m-d"); };
        if ($tanggal) { $param['cek_waktu2'] = date("Y-m-d", strtotime($tgl[1])); } else { $param['cek_waktu2'] = date("Y-m-d"); };

        $model = new Model_laporan_penilaian();
        $laporan = $model->filter($param)->getResultArray();

        $model_profil = new Model_profil();
        $profil = $model_profil->view_data()->getRowArray();
        $data = [
            'judul' => 'Laporan Penilaian Magang ' . $tanggal,
            'laporan' => $laporan,
            'profil' => $profil
        ];
        return view('Admin/cetakLaporanPenilaian', $data);
    }
}
