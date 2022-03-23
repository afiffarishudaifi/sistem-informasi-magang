<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_sekolah;

class Sekolah extends BaseController
{

    protected $Model_sekolah;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        $this->Model_sekolah = new Model_sekolah();
        helper(['form', 'url']);
    }

    public function index()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        
        $model = new Model_sekolah();
        $sekolah = $model->view_data()->getResultArray();

        $data = [
            'judul' => 'Tabel Sekolah',
            'sekolah' => $sekolah
        ];
        return view('Admin/viewTSekolah', $data);
    }

    public function add_sekolah()
    {
        $session = session();
        $encrypter = \Config\Services::encrypter();

        $data = array(
            'username_sekolah'     => $this->request->getPost('input_username'),
            'password_sekolah'     => base64_encode($encrypter->encrypt($this->request->getPost('input_password'))),
            'nama_sekolah'     => $this->request->getPost('input_nama'),
            'no_telp_sekolah'     => $this->request->getPost('input_no_telp'),
            'alamat_sekolah'     => $this->request->getPost('input_alamat'),
            'no_telp_sekolah'     => $this->request->getPost('input_no_telp')
        );

        $model = new Model_sekolah();
        $model->add_data($data);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        return redirect()->to(base_url('Admin/Sekolah'));
    }

    public function update_sekolah()
    {
        $session = session();
        $model = new Model_sekolah();
        $encrypter = \Config\Services::encrypter();
        date_default_timezone_set('Asia/Jakarta');

        $id = $this->request->getPost('id_sekolah');
        if ($this->request->getPost('edit_password')) {
            $data = array(
                'username_sekolah'     => $this->request->getPost('edit_username'),
                'password_sekolah'     => base64_encode($encrypter->encrypt($this->request->getPost('edit_password'))),
                'nama_sekolah'         => $this->request->getPost('edit_nama'),
                'alamat_sekolah'       => $this->request->getPost('edit_alamat'),
                'no_telp_sekolah'      => $this->request->getPost('edit_no_telp'),
                'updated_at'           => date('Y-m-d H:i:s')
            );
        } else {
            $data = array(
                'username_sekolah'     => $this->request->getPost('edit_username'),
                'nama_sekolah'         => $this->request->getPost('edit_nama'),
                'alamat_sekolah'       => $this->request->getPost('edit_alamat'),
                'no_telp_sekolah'      => $this->request->getPost('edit_no_telp'),
                'updated_at'           => date('Y-m-d H:i:s')
            );
        }

        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil diubah');
        return redirect()->to(base_url('Admin/Sekolah'));
    }

    public function delete_sekolah()
    {
        $session = session();
        $model = new Model_sekolah();
        $id = $this->request->getPost('id');

        $model->delete_data($id);
        session()->setFlashdata('sukses', 'Data sudah berhasil dihapus');
        return redirect()->to('/Admin/Sekolah');
    }

    public function data_edit($id_sekolah)
    {
        $model = new Model_sekolah();
        $encrypter = \Config\Services::encrypter();

        $data_sekolah = $model->detail_data($id_sekolah)->getResultArray();
        $respon = json_decode(json_encode($data_sekolah), true);
        $data['results'] = array();
        foreach ($respon as $value) :
            $isi['id_sekolah'] = $value['id_sekolah'];
            $isi['username_sekolah'] = $value['username_sekolah'];
            // $isi['password_sekolah'] = $value['password_sekolah'];
            $isi['nama_sekolah'] = $value['nama_sekolah'];
            $isi['no_telp_sekolah'] = $value['no_telp_sekolah'];
            $isi['alamat_sekolah'] = $value['alamat_sekolah'];
        endforeach;
        echo json_encode($isi);
    }

    public function cek_username($username)
    {
        $model = new Model_sekolah();
        $cek_username = $model->cek_username($username)->getResultArray();
        $respon = json_decode(json_encode($cek_username), true);
        $data['results'] = count($respon);
        echo json_encode($data);
    }
}
