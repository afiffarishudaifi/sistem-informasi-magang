<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_jobdesk;

class Jobdesk extends BaseController
{

    protected $Model_jobdesk;
    public function __construct()
    {
        $this->Model_jobdesk = new Model_jobdesk();
        helper(['form', 'url']);
    }

    public function index()
    {
        $model = new Model_jobdesk();
        $jobdesk = $model->view_data()->getResultArray();
        $siswa = $model->data_siswa()->getResultArray();

        $data = [
            'judul' => 'Tabel Job Deskripsi',
            'jobdesk' => $jobdesk,
            'siswa' => $siswa

        ];
        return view('Admin/viewTJobdesk', $data);
    }

    public function add_jobdesk()
    {
        $session = session();
        $model = new Model_jobdesk();

        $data = array(
            'id_siswa'          => $this->request->getPost('input_siswa'),
            'nama_jobdesk'      => $this->request->getPost('input_nama'),
            'deskripsi'         => $this->request->getPost('input_deskripsi'),
            'waktu_mulai'       => $this->request->getPost('input_waktu_mulai'),
            'waktu_selesai'     => $this->request->getPost('input_waktu_selesai'),
            'status_jobdesk'    => $this->request->getPost('input_status')
        );

        $model->add_data($data);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        return redirect()->to(base_url('Admin/Jobdesk'));
    }

    public function update_jobdesk()
    {
        $session = session();
        $model = new Model_jobdesk();
        date_default_timezone_set('Asia/Jakarta');

        $id = $this->request->getPost('id_jobdesk');

        $data = array(
            'id_siswa'          => $this->request->getPost('edit_siswa'),
            'nama_jobdesk'      => $this->request->getPost('edit_nama'),
            'deskripsi'         => $this->request->getPost('edit_deskripsi'),
            'waktu_mulai'       => $this->request->getPost('edit_waktu_mulai'),
            'waktu_selesai'     => $this->request->getPost('edit_waktu_selesai'),
            'status_jobdesk'    => $this->request->getPost('edit_status'),
            'updated_at'        => date('Y-m-d H:i:s')
        );

        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil diubah');
        return redirect()->to(base_url('Admin/Jobdesk'));
    }

    public function delete_jobdesk()
    {
        $session = session();
        $model = new Model_jobdesk();
        $id = $this->request->getPost('id');

        $model->delete_data($id);
        session()->setFlashdata('sukses', 'Data sudah berhasil dihapus');
        return redirect()->to('/Admin/Jobdesk');
    }

    public function data_edit($id_jobdesk)
    {
        $model = new Model_jobdesk();
        $encrypter = \Config\Services::encrypter();

        $data_jobdesk = $model->detail_data($id_jobdesk)->getResultArray();
        $respon = json_decode(json_encode($data_jobdesk), true);
        $data['results'] = array();
        foreach ($respon as $value) :
            $isi['id_jobdesk'] = $value['id_jobdesk'];
            $isi['id_siswa'] = $value['id_siswa'];
            $isi['nama_siswa'] = $value['nama_siswa'];
            $isi['nama_jobdesk'] = $value['nama_jobdesk'];
            $isi['deskripsi'] = $value['deskripsi'];
            $isi['waktu_mulai'] = $value['waktu_mulai'];
            $isi['waktu_selesai'] = $value['waktu_selesai'];
            $isi['status_jobdesk'] = $value['status_jobdesk'];
        endforeach;
        echo json_encode($isi);
    }
}
