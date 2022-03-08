<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_jobdesk;

class JobdeskPeserta extends BaseController
{

    protected $Model_jobdesk;
    public function __construct()
    {
        $this->Model_jobdesk = new Model_jobdesk();
        helper(['form', 'url']);
        $this->db = db_connect();
    }


    public function index()
    {
        $model = new Model_jobdesk();
        $jobdesk = $model->view_data()->getResultArray();
        $data = [
            'judul' => 'Tabel Job Deskripsi',
            'jobdesk' => $jobdesk

        ];
        return view('Admin/viewJobdeskPeserta', $data);
    }

    public function data($tanggal = null)
    {
        $session = session();

        if ($tanggal) $tgl = explode(' - ', $tanggal);
        if ($tanggal) {
            $param['cek_waktu1'] = date("Y-m-d", strtotime($tgl[0]));
        } else {
            $param['cek_waktu1'] = date("Y-m-d");
        };
        if ($tanggal) {
            $param['cek_waktu2'] = date("Y-m-d", strtotime($tgl[1]));
        } else {
            $param['cek_waktu2'] = date("Y-m-d");
        };

        $model = new Model_jobdesk();
        $laporan = $model->filter($param)->getResultArray();

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
