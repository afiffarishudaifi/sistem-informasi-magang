<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_profil;

class Profil extends BaseController
{

    protected $Model_profil;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        $this->Model_profil = new Model_profil();
        helper(['form', 'url']);
    }

    public function index()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        
        $data = [
            'judul' => 'Profil BAKESBANGPOLDAGRI'
        ];
        return view('Admin/viewProfil', $data);
    }

    public function update_profil()
    {
        $session = session();
        $model = new Model_profil();
        $encrypter = \Config\Services::encrypter();
        
        $id = 1;
        $data = array(
            'nama'     => $this->request->getPost('edit_nama'),
            'email'     => $this->request->getPost('edit_email'),
            'no_telp'     => $this->request->getPost('edit_no_telp'),
            'alamat'     => $this->request->getPost('edit_alamat')
        );

        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil diubah');
        return redirect()->to(base_url('Admin/Profil'));
    }

    public function data_edit()
    {
        $model = new Model_profil();

        $profil = $model->detail_data()->getResultArray();
        $respon = json_decode(json_encode($profil), true);
        $data['results'] = array();
        foreach ($respon as $value) :
            $isi['id'] = $value['id'];
            $isi['nama'] = $value['nama'];
            $isi['alamat'] = $value['alamat'];
            $isi['email'] = $value['email'];
            $isi['no_telp'] = $value['no_telp'];
            $isi['foto'] = $value['foto'];
            $isi['kepala'] = $value['kepala'];
        endforeach;
        echo json_encode($isi);
    }
}
