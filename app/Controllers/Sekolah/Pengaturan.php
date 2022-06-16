<?php

namespace App\Controllers\Sekolah;

use App\Controllers\BaseController;
use App\Models\Model_sekolah;

class Pengaturan extends BaseController
{

    protected $Model_dashboard;

    public function index()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Sekolah') {
            return redirect()->to('Login');
        }

        $data = [
            'judul' => 'Pengaturan Akun'
        ];
        return view('Sekolah/viewPengaturan', $data);
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

    public function update_admin()
    {
        $session = session();
        $encrypter = \Config\Services::encrypter();
        $model = new Model_sekolah();
        
        $id = $this->request->getPost('id_sekolah');

        if ($this->request->getPost('edit_password')) {
            $data = array(
                'password_sekolah'     => base64_encode($encrypter->encrypt($this->request->getPost('edit_password'))),
                'nama_sekolah'         => $this->request->getPost('edit_nama'),
                'alamat_sekolah'       => $this->request->getPost('edit_alamat'),
                'no_telp_sekolah'      => $this->request->getPost('edit_no_telp'),
                'updated_at'           => date('Y-m-d H:i:s')
            );
        } else {
            $data = array(
                'nama_sekolah'         => $this->request->getPost('edit_nama'),
                'alamat_sekolah'       => $this->request->getPost('edit_alamat'),
                'no_telp_sekolah'      => $this->request->getPost('edit_no_telp'),
                'updated_at'           => date('Y-m-d H:i:s')
            );
        }

        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil diubah');
        return redirect()->to(base_url('Login/logout'));
    }
}
