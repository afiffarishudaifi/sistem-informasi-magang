<?php

namespace App\Controllers\Sekolah;

use App\Controllers\BaseController;
use App\Models\Model_dashboard_sekolah;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $session = session();

        if (!$session->get('nama_login') || $session->get('status_login') != 'Sekolah') {
            return redirect()->to('Login');
        }

        helper(['form', 'url']);
    }

    public function index()
    {
        $session = session();

        if (!$session->get('nama_login') || $session->get('status_login') != 'Sekolah') {
            return redirect()->to('Login');
        }

        $id = $session->get('id_login');
        
        $model = new Model_dashboard_sekolah();
        $total_peserta_aktif = $model->total_peserta_aktif($id)->getRowArray();
        $total_peserta_tidak_aktif = $model->total_peserta_tidak_aktif($id)->getRowArray();
        $total_pengajuan = $model->total_pengajuan($id)->getRowArray();

        $total_peserta_aktif = $total_peserta_aktif['id_siswa'] == 0 ? 0 : $total_peserta_aktif['id_siswa'];
        $total_peserta_tidak_aktif = $total_peserta_tidak_aktif['id_siswa'] == 0 ? 0 : $total_peserta_tidak_aktif['id_siswa'];
        $total_pengajuan = $total_pengajuan['id_pengajuan'] == 0 ? 0 : $total_pengajuan['id_pengajuan'];
        
        $data = [
            'total_peserta_aktif' => $total_peserta_aktif,
            'total_peserta_tidak_aktif' => $total_peserta_tidak_aktif,
            'total_pengajuan' => $total_pengajuan
        ];
        return view('Sekolah/index', $data);
    }
}
