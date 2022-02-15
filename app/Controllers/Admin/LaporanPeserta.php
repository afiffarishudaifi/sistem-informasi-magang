<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_laporan_peserta;

class LaporanPeserta extends BaseController
{

    protected $Model_laporan_peserta;
    public function __construct()
    {
        $this->Model_laporan_peserta = new Model_laporan_peserta();
        helper(['form', 'url']);
        $this->db = db_connect();
    }

    public function index()
    {
        $model = new Model_laporan_peserta();
        $data = $model->view_data()->getResultArray();

        $data = [
            'judul' => 'Laporan Peserta Magang',
            'data' => $data
        ];
        return view('Admin/viewLaporanPeserta', $data);
    }

    public function data($tanggal = null)
    {
        $session = session();

        if ($tanggal) $tgl = explode(' - ', $tanggal);
        if ($tanggal) $param['cek_waktu1'] = date("Y-m-d", strtotime($tgl[0]));
        if ($tanggal) $param['cek_waktu2'] = date("Y-m-d", strtotime($tgl[1]));

        $model = new Model_laporan_peserta();
        $laporan = $model->filter($param)->getResultArray();

        $respon = $laporan;
        $data = array();

        if ($respon) {
            foreach ($respon as $value) {
                $isi['id_siswa'] = $value['id_siswa'];
                $isi['nama_siswa'] = $value['nama_siswa'];
                $isi['alamat_siswa'] = $value['alamat_siswa'];
                $isi['no_telp_siswa'] = $value['no_telp_siswa'];
                $isi['status'] = $value['status'];
                $isi['jurusan'] = $value['jurusan'];
                $isi['nama_sekolah'] = $value['nama_sekolah'];
                $isi['waktu_mulai'] = $value['waktu_mulai'];
                $isi['waktu_selesai'] = $value['waktu_selesai'];
                array_push($data, $isi);
            }
        }

        echo json_encode($data);
    }

    public function data_cetak($tanggal = null)
    {
        $session = session();

        if ($tanggal) $tgl = explode(' - ', $tanggal);
        if ($tanggal) $param['cek_waktu1'] = date("Y-m-d", strtotime($tgl[0]));
        if ($tanggal) $param['cek_waktu2'] = date("Y-m-d", strtotime($tgl[1]));

        $model = new Model_laporan_peserta();
        $laporan = $model->filter($param)->getResultArray();

        $respon = $laporan;
        $data = array();

        if ($respon) {
            foreach ($respon as $value) {
                $isi['id_siswa'] = $value['id_siswa'];
                $isi['nama_siswa'] = $value['nama_siswa'];
                $isi['alamat_siswa'] = $value['alamat_siswa'];
                $isi['no_telp_siswa'] = $value['no_telp_siswa'];
                $isi['status'] = $value['status'];
                $isi['jurusan'] = $value['jurusan'];
                $isi['nama_sekolah'] = $value['nama_sekolah'];
                $isi['waktu_mulai'] = $value['waktu_mulai'];
                $isi['waktu_selesai'] = $value['waktu_selesai'];
                array_push($data, $isi);
            }
        }

        echo json_encode($data);
    }
}