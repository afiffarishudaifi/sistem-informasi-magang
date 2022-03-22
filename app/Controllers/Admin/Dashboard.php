<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_dashboard_admin;

class Dashboard extends BaseController
{

    protected $Model_dashboard_admin;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }

        helper(['form', 'url']);
    }

    public function index()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }

        $model = new Model_dashboard_admin();
        $total_peserta_aktif = $model->total_peserta_aktif()->getRowArray();
        $total_peserta_tidak_aktif = $model->total_peserta_tidak_aktif()->getRowArray();
        $total_sekolah = $model->total_sekolah()->getRowArray();
        $total_pengajuan = $model->total_pengajuan()->getRowArray();

        $total_peserta_aktif = $total_peserta_aktif['id_siswa'] == 0 ? 0 : $total_peserta_aktif['id_siswa'];
        $total_peserta_tidak_aktif = $total_peserta_tidak_aktif['id_siswa'] == 0 ? 0 : $total_peserta_tidak_aktif['id_siswa'];
        $total_sekolah = $total_sekolah['id_sekolah'] == 0 ? 0 : $total_sekolah['id_sekolah'];
        $total_pengajuan = $total_pengajuan['id_pengajuan'] == 0 ? 0 : $total_pengajuan['id_pengajuan'];
        
        $data = [
            'total_peserta_aktif' => $total_peserta_aktif,
            'total_peserta_tidak_aktif' => $total_peserta_tidak_aktif,
            'total_sekolah' => $total_sekolah,
            'total_pengajuan' => $total_pengajuan
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
