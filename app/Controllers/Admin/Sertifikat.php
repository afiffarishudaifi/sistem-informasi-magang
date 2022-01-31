<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_sertifikat;

class Sertifikat extends BaseController
{

    protected $Model_sertifikat;
    public function __construct()
    {
        $this->Model_sertifikat = new Model_sertifikat();
        helper(['form', 'url']);
    }

    public function index()
    {
        $model = new Model_sertifikat();
        $sertifikat = $model->view_data()->getResultArray();

        $data = [
            'judul' => 'Tabel Sertifikat',
            'sertifikat' => $sertifikat
        ];
        return view('Admin/viewTSertifikat', $data);
    }

    public function add_sertifikat()
    {
        $session = session();
        $encrypter = \Config\Services::encrypter();

        $avatar      = $this->request->getFile('input_foto');
        if ($avatar != '') {
            $namabaru     = $avatar->getRandomName();
            $avatar->move('docs/img/img_sertifikat/', $namabaru);
        } else {
            $namabaru = 'noimage.jpg';
        }

        $data = array(
            'foto_sertifikat'     => "docs/img/img_sertifikat/" . $namabaru
        );

        $model = new Model_sertifikat();
        $model->add_data($data);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        return redirect()->to(base_url('Admin/Sertifikat'));
    }

    public function update_sertifikat()
    {
        $session = session();
        $encrypter = \Config\Services::encrypter();
        $model = new Model_sertifikat();
        
        $id = $this->request->getPost('id_sertifikat');

        $avatar      = $this->request->getFile('edit_foto');
        $namabaru     = $avatar->getRandomName();
        $avatar->move('docs/img/img_sertifikat/', $namabaru);

        $data = array(
            'foto_sertifikat'     => "docs/img/img_sertifikat/" . $namabaru,
            'id_sertifikat'     => $this->request->getPost('id_sertifikat'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        $data_foto = $model->detail_data($id)->getRowArray();

        if ($data_foto != null) {
            if ($data_foto['foto_sertifikat'] != 'docs/img/img_sertifikat/noimage.jpg') {
                if (file_exists($data_foto['foto_sertifikat'])) {
                    unlink($data_foto['foto_sertifikat']);
                }
            }
        }

        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil diubah');
        return redirect()->to(base_url('Admin/Sertifikat'));
    }

    public function delete_sertifikat()
    {
        $session = session();
        $model = new Model_sertifikat();
        $id = $this->request->getPost('id');
        $foreign = $model->cek_foreign($id);
        if ($foreign == 0) {
            $data_foto = $model->detail_data($id)->getRowArray();

            if ($data_foto != null) {
                if ($data_foto['foto_sertifikat'] != 'docs/img/img_sertifikat/noimage.jpg') {
                    if (file_exists($data_foto['foto_sertifikat'])) {
                        unlink($data_foto['foto_sertifikat']);
                    }
                }
            }
            $model->delete_data($id);
            session()->setFlashdata('sukses', 'Data ini berhasil dihapus');
        } else {
            session()->setFlashdata('gagal', 'Data ini dipakai di tabel lain dan tidak bisa dihapus');
        }
        return redirect()->to('/Admin/Sertifikat');
    }

    public function data_edit($id_sertifikat)
    {
        $model = new Model_sertifikat();
        $encrypter = \Config\Services::encrypter();

        $data_sertifikat = $model->detail_data($id_sertifikat)->getResultArray();
        $respon = json_decode(json_encode($data_sertifikat), true);
        $data['results'] = array();
        foreach ($respon as $value) :
            $isi['id_sertifikat'] = $value['id_sertifikat'];
            $isi['foto_sertifikat'] = $value['foto_sertifikat'];
        endforeach;
        echo json_encode($isi);
    }

}