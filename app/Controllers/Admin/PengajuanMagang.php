<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_pengajuan;

class PengajuanMagang extends BaseController
{

    protected $Model_pengajuan;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        $this->Model_pengajuan = new Model_pengajuan();
        helper(['form', 'url']);
        $this->db = db_connect();
    }

    public function index()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        
        $model = new Model_pengajuan();
        $pengajuan = $model->view_data()->getResultArray();

        $data = [
            'judul' => 'Tabel Pengajuan Magang',
            'pengajuan' => $pengajuan
        ];
        return view('Admin/viewPengajuanMagang', $data);
    }

    public function konfirmasi_pengajuan()
    {
        $session = session();
        $model = new Model_pengajuan();
        date_default_timezone_set('Asia/Jakarta');

        $id = $this->request->getPost('id_pengajuan');

        $data = array(
            'id_admin'          => 1, //$session->get('id_login')
            'status_pengajuan'      => $this->request->getVar('status_pengajuan'),
            'updated_at'        => date('Y-m-d H:i:s')
        );

        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data berhasil disimpan');
        return redirect()->to(base_url('Admin/PengajuanMagang'));
    }

    public function delete_pengajuan()
    {
        $session = session();
        $model = new Model_pengajuan();
        $id = $this->request->getPost('id');

        $model->delete_data($id);
        session()->setFlashdata('sukses', 'Data sudah berhasil dihapus');
        return redirect()->to('/Admin/PengajuanMagang');
    }

    public function data_edit($id_pengajuan)
    {
        $model = new Model_pengajuan();
        $encrypter = \Config\Services::encrypter();

        $data_pengajuan = $model->detail_data($id_pengajuan)->getResultArray();
        $respon = json_decode(json_encode($data_pengajuan), true);
        $data['results'] = array();
        foreach ($respon as $value) :
            $isi['id_pengajuan'] = $value['id_pengajuan'];
        endforeach;
        echo json_encode($isi);
    }
}
