<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_admin;

class Admin extends BaseController
{

    protected $Model_admin;
    public function __construct()
    {
        $this->Model_admin = new Model_admin();
        helper(['form', 'url']);
    }

    public function index()
    {
        $model = new Model_admin();
        $admin = $model->view_data()->getResultArray();
        $jabatan = $model->data_jabatan()->getResultArray();

        $data = [
            'judul' => 'Tabel Admin',
            'admin' => $admin,
            'jabatan' => $jabatan
        ];
        return view('Admin/viewTAdmin', $data);
    }

    public function add_admin()
    {
        $session = session();
        $encrypter = \Config\Services::encrypter();

        $avatar      = $this->request->getFile('input_foto');
        if ($avatar != '') {
            $namabaru     = $avatar->getRandomName();
            $avatar->move('docs/img/img_admin/', $namabaru);
        } else {
            $namabaru = 'noimage.jpg';
        }

        $data = array(
            'id_jabatan'     => $this->request->getPost('input_jabatan'),
            'username_admin'     => $this->request->getPost('input_username'),
            'password_admin'     => base64_encode($encrypter->encrypt($this->request->getPost('input_password'))),
            'nama_admin'     => $this->request->getPost('input_nama'),
            'no_telp_admin'     => $this->request->getPost('input_no_telp'),
            'foto_resmi_admin'     => "docs/img/img_admin/" . $namabaru,
            'status_admin'     => $this->request->getPost('input_status')
        );

        $model = new Model_admin();
        $model->add_data($data);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        return redirect()->to(base_url('Admin/Admin'));
    }

    public function update_admin()
    {
        $session = session();
        $encrypter = \Config\Services::encrypter();
        $model = new Model_admin();
        date_default_timezone_set('Asia/Jakarta');
        
        $id = $this->request->getPost('id_admin');

        $avatar      = $this->request->getFile('edit_foto');
        if ($avatar != '') {
            $namabaru     = $avatar->getRandomName();
            $avatar->move('docs/img/img_admin/', $namabaru);

            $data = array(
                'id_jabatan'     => $this->request->getPost('edit_jabatan'),
                'username_admin'     => $this->request->getPost('edit_username'),
                'password_admin'     => base64_encode($encrypter->encrypt($this->request->getPost('edit_password'))),
                'nama_admin'     => $this->request->getPost('edit_nama'),
                'no_telp_admin'     => $this->request->getPost('edit_no_telp'),
                'foto_resmi_admin'     => "docs/img/img_admin/" . $namabaru,
                'status_admin'     => $this->request->getPost('edit_status'),
                'id_admin'     => $this->request->getPost('id_admin'),
                'updated_at' => date('Y-m-d H:i:s')
            );

            $data_foto = $model->detail_data($id)->getRowArray();

            if ($data_foto != null) {
                if ($data_foto['foto_resmi_admin'] != 'docs/img/img_admin/noimage.jpg') {
                    if (file_exists($data_foto['foto_resmi_admin'])) {
                        unlink($data_foto['foto_resmi_admin']);
                    }
                }
            }
        } else {
            $data = array(
                'id_jabatan'     => $this->request->getPost('edit_jabatan'),
                'username_admin'     => $this->request->getPost('edit_username'),
                'password_admin'     => base64_encode($encrypter->encrypt($this->request->getPost('edit_password'))),
                'nama_admin'     => $this->request->getPost('edit_nama'),
                'no_telp_admin'     => $this->request->getPost('edit_no_telp'),
                'status_admin'     => $this->request->getPost('edit_status'),
                'id_admin'     => $this->request->getPost('id_admin'),
                'updated_at' => date('Y-m-d H:i:s')
            );
        }

        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil diubah');
        return redirect()->to(base_url('Admin/Admin'));
    }

    public function delete_admin()
    {
        $session = session();
        $model = new Model_admin();
        $id = $this->request->getPost('id');
        // $foreign = $model->cek_foreign($id);
        // if ($foreign == 0) {
            $data_foto = $model->detail_data($id)->getRowArray();

            if ($data_foto != null) {
                if ($data_foto['foto_resmi_admin'] != 'docs/img/img_admin/noimage.jpg') {
                    if (file_exists($data_foto['foto_resmi_admin'])) {
                        unlink($data_foto['foto_resmi_admin']);
                    }
                }
            }
            $model->delete_data($id);
            session()->setFlashdata('sukses', 'Data ini berhasil dihapus');
        // } else {
        //     session()->setFlashdata('gagal', 'Data ini dipakai di tabel lain dan tidak bisa dihapus');
        // }
        return redirect()->to('/Admin/Admin');
    }

    public function cek_username($username)
    {
        $model = new Model_admin();
        $cek_username = $model->cek_username($username)->getResultArray();
        $respon = json_decode(json_encode($cek_username), true);
        $data['results'] = count($respon);
        echo json_encode($data);
    }

    public function data_edit($id_admin)
    {
        $model = new Model_admin();
        $encrypter = \Config\Services::encrypter();

        $data_pengguna = $model->detail_data($id_admin)->getResultArray();
        $respon = json_decode(json_encode($data_pengguna), true);
        $data['results'] = array();
        foreach ($respon as $value) :
            $isi['id_admin'] = $value['id_admin'];
            $isi['id_jabatan'] = $value['id_jabatan'];
            $isi['nama_jabatan'] = $value['nama_jabatan'];
            $isi['username_admin'] = $value['username_admin'];
            $isi['nama_admin'] = $value['nama_admin'];
            $isi['no_telp_admin'] = $value['no_telp_admin'];
            $isi['status_admin'] = $value['status_admin'];
            $isi['foto_resmi_admin'] = $value['foto_resmi_admin'];
        endforeach;
        echo json_encode($isi);
    }
}