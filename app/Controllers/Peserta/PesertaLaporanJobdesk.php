<?php

namespace App\Controllers\Peserta;

use App\Controllers\BaseController;
use App\Models\Model_laporan_jobdesk;

class PesertaLaporanJobdesk extends BaseController
{

    protected $Model_laporan_jobdesk;
    public function __construct()
    {
        $this->Model_laporan_jobdesk = new Model_laporan_jobdesk();
        helper(['form', 'url']);
        $this->db = db_connect();
    }

    public function index()
    {
        $session = session();

        $data = [
            'judul' => 'Laporan Jobdesk ' . $session->get('nama_login')
        ];
        return view('Peserta/viewLaporanJobdesk', $data);
    }

    public function data($tanggal = null, $status = null)
    {
        $session = session();

        if ($tanggal) $tgl = explode(' - ', $tanggal);
        if ($tanggal) { $param['cek_waktu1'] = date("Y-m-d", strtotime($tgl[0])); } else { $param['cek_waktu1'] = date("Y-m-d"); };
        if ($tanggal) { $param['cek_waktu2'] = date("Y-m-d", strtotime($tgl[1])); } else { $param['cek_waktu2'] = date("Y-m-d"); };

        if ($status != 'null') {
            $param['status_jobdesk'] = $status;
        } else {
            $param['status_jobdesk'] = null;
        }

        $param['id_siswa'] = $session->get('id_login');

        $model = new Model_laporan_jobdesk();
        $laporan = $model->peserta_filter($param)->getResultArray();

        $respon = $laporan;
        $data = array();

        if ($respon) {
            foreach ($respon as $value) {
                $isi['nama_siswa'] = $value['nama_siswa'];
                $isi['nama_jobdesk'] = $value['nama_jobdesk'];
                $isi['deskripsi'] = $value['deskripsi'];
                $isi['waktu_mulai'] = $value['waktu_mulai'];
                $isi['waktu_selesai'] = $value['waktu_selesai'];
                $isi['status_jobdesk'] = $value['status_jobdesk'];
                array_push($data, $isi);
            }
        }

        echo json_encode($data);
    }

    public function data_cetak($tanggal = null, $status = null)
    {
        $session = session();

        if ($tanggal) $tgl = explode(' - ', $tanggal);
        if ($tanggal) { $param['cek_waktu1'] = date("Y-m-d", strtotime($tgl[0])); } else { $param['cek_waktu1'] = date("Y-m-d"); };
        if ($tanggal) { $param['cek_waktu2'] = date("Y-m-d", strtotime($tgl[1])); } else { $param['cek_waktu2'] = date("Y-m-d"); };

        if ($status != 'null') {
            $param['status_jobdesk'] = $status;
        } else {
            $param['status_jobdesk'] = null;
        }

        $param['id_siswa'] = $session->get('id_login');

        $model = new Model_laporan_jobdesk();
        $laporan = $model->peserta_filter($param)->getResultArray();

        $respon = $laporan;
        $data = array();

        if ($respon) {
            foreach ($respon as $value) {
                $isi['nama_siswa'] = $value['nama_siswa'];
                $isi['nama_jobdesk'] = $value['nama_jobdesk'];
                $isi['deskripsi'] = $value['deskripsi'];
                $isi['waktu_mulai'] = $value['waktu_mulai'];
                $isi['waktu_selesai'] = $value['waktu_selesai'];
                $isi['status_jobdesk'] = $value['status_jobdesk'];
                array_push($data, $isi);
            }
        }

        echo json_encode($data);
    }
}