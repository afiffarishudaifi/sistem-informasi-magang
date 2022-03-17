<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_indekspenilaian;

class IndeksPenilaian extends BaseController
{

    protected $Model_indekspenilaian;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        $this->Model_indekspenilaian = new Model_indekspenilaian();
        helper(['form', 'url']);
    }

    public function index()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        
        $model = new Model_indekspenilaian();
        $indeks = $model->view_data()->getResultArray();

        $data = [
            'judul' => 'Tabel Indeks Penilaian',
            'indeks' => $indeks
        ];
        return view('Admin/viewTIndeksPenilaian', $data);
    }

    public function add_indeks()
    {
        $session = session();
        $model = new Model_indekspenilaian();

        $data = array(
            'angka_awal'     => $this->request->getPost('input_angka_awal'),
            'angka_akhir'     => $this->request->getPost('input_angka_akhir'),
            'keterangan'      => $this->request->getPost('input_keterangan')
        );

        $model->add_data($data);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        return redirect()->to(base_url('Admin/IndeksPenilaian'));
    }

    public function update_indeks()
    {
        $session = session();
        $model = new Model_indekspenilaian();

        $id = $this->request->getPost('id_indeks');

        $data = array(
            'angka_awal'     => $this->request->getPost('edit_angka_awal'),
            'angka_akhir'     => $this->request->getPost('edit_angka_akhir'),
            'keterangan'      => $this->request->getPost('edit_keterangan')
        );

        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        return redirect()->to(base_url('Admin/IndeksPenilaian'));
    }

    public function delete_indeks()
    {
        $session = session();
        $model = new Model_indekspenilaian();
        $id = $this->request->getPost('id');

        $model->delete_data($id);
        session()->setFlashdata('sukses', 'Data sudah berhasil dihapus');
        return redirect()->to('/Admin/IndeksPenilaian');
    }

    public function data_edit($id_indeks)
    {
        $model = new Model_indekspenilaian();
        $encrypter = \Config\Services::encrypter();

        $data_indeks = $model->detail_data($id_indeks)->getResultArray();
        $respon = json_decode(json_encode($data_indeks), true);
        $data['results'] = array();
        foreach ($respon as $value) :
            $isi['id_indeks'] = $value['id_indeks'];
            $isi['angka_awal'] = $value['angka_awal'];
            $isi['angka_akhir'] = $value['angka_akhir'];
            $isi['keterangan'] = $value['keterangan'];
        endforeach;
        echo json_encode($isi);
    }
}
