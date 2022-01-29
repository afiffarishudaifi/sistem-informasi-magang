<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_siswa;

class Siswa extends BaseController
{

    protected $Model_siswa;
    public function __construct()
    {
        $this->Model_siswa = new Model_siswa();
        helper(['form', 'url']);
    }

    public function index()
    {
        $model = new Model_siswa();
        $siswa = $model->view_data()->getResultArray();
        $sekolah = $model->data_sekolah()->getResultArray();

        $data = [
            'judul' => 'Tabel Siswa',
            'siswa' => $siswa,
            'sekolah' => $sekolah
        ];
        return view('Admin/viewTSiswa', $data);
    }

    public function add_siswa()
    {
        $session = session();
        $encrypter = \Config\Services::encrypter();

        $avatar      = $this->request->getFile('input_foto');
        if ($avatar != '') {
            $namabaru     = $avatar->getRandomName();
            $avatar->move('docs/img/img_siswa/', $namabaru);
        } else {
            $namabaru = 'noimage.jpg';
        }

        $data = array(
            'id_sekolah'     => $this->request->getPost('input_sekolah'),
            'nomor_induk'     => $this->request->getPost('input_nis'),
            'username_siswa'     => $this->request->getPost('input_username'),
            'password_siswa'     => base64_encode($encrypter->encrypt($this->request->getPost('input_password'))),
            'nama_siswa'     => $this->request->getPost('input_nama'),
            'email_siswa'     => $this->request->getPost('input_email'),
            'no_telp_siswa'     => $this->request->getPost('input_no_telp'),
            'alamat_siswa'     => $this->request->getPost('input_alamat'),
            'jurusan'     => $this->request->getPost('input_jurusan'),
            'foto_resmi'     => "docs/img/img_siswa/" . $namabaru,
            'status'     => $this->request->getPost('input_status')
        );

        $model = new Model_siswa();
        $model->add_data($data);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        return redirect()->to(base_url('Admin/Siswa'));
    }

    public function update_siswa()
    {
        $session = session();
        $encrypter = \Config\Services::encrypter();
        $model = new Model_siswa();
        date_default_timezone_set('Asia/Jakarta');
        
        $id = $this->request->getPost('id_siswa');

        $avatar      = $this->request->getFile('edit_foto');
        if ($avatar != '') {
            $namabaru     = $avatar->getRandomName();
            $avatar->move('docs/img/img_siswa/', $namabaru);

            $data = array(
                'id_sekolah'     => $this->request->getPost('edit_sekolah'),
                'nomor_induk'     => $this->request->getPost('edit_nis'),
                'username_siswa'     => $this->request->getPost('edit_username'),
                'password_siswa'     => base64_encode($encrypter->encrypt($this->request->getPost('edit_password'))),
                'nama_siswa'     => $this->request->getPost('edit_nama'),
                'email_siswa'     => $this->request->getPost('edit_email'),
                'no_telp_siswa'     => $this->request->getPost('edit_no_telp'),
                'alamat_siswa'     => $this->request->getPost('edit_alamat'),
                'jurusan'     => $this->request->getPost('edit_jurusan'),
                'foto_resmi'     => "docs/img/img_siswa/" . $namabaru,
                'status'     => $this->request->getPost('edit_status'),
                'id_siswa'     => $this->request->getPost('id_siswa'),
                'updated_at' => date('Y-m-d H:i:s')
            );

            $data_foto = $model->detail_data($id)->getRowArray();

            if ($data_foto != null) {
                if ($data_foto['foto_resmi'] != 'docs/img/img_siswa/noimage.jpg') {
                    if (file_exists($data_foto['foto_resmi'])) {
                        unlink($data_foto['foto_resmi']);
                    }
                }
            }
        } else {
            $data = array(
                'id_sekolah'     => $this->request->getPost('edit_sekolah'),
                'nomor_induk'     => $this->request->getPost('edit_nis'),
                'username_siswa'     => $this->request->getPost('edit_username'),
                'password_siswa'     => base64_encode($encrypter->encrypt($this->request->getPost('edit_password'))),
                'nama_siswa'     => $this->request->getPost('edit_nama'),
                'email_siswa'     => $this->request->getPost('edit_email'),
                'no_telp_siswa'     => $this->request->getPost('edit_no_telp'),
                'alamat_siswa'     => $this->request->getPost('edit_alamat'),
                'jurusan'     => $this->request->getPost('edit_jurusan'),
                'status'     => $this->request->getPost('edit_status'),
                'id_siswa'     => $this->request->getPost('id_siswa'),
                'updated_at' => date('Y-m-d H:i:s')
            );
        }

        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil diubah');
        return redirect()->to(base_url('Admin/Siswa'));
    }

    public function delete_siswa()
    {
        $session = session();
        $model = new Model_siswa();
        $id = $this->request->getPost('id');
        // $foreign = $model->cek_foreign($id);
        // if ($foreign == 0) {
            $data_foto = $model->detail_data($id)->getRowArray();

            if ($data_foto != null) {
                if ($data_foto['foto_resmi'] != 'docs/img/img_siswa/noimage.jpg') {
                    if (file_exists($data_foto['foto_resmi'])) {
                        unlink($data_foto['foto_resmi']);
                    }
                }
            }
            $model->delete_data($id);
            session()->setFlashdata('sukses', 'Data ini berhasil dihapus');
        // } else {
        //     session()->setFlashdata('gagal', 'Data ini dipakai di tabel lain dan tidak bisa dihapus');
        // }
        return redirect()->to('/Admin/Siswa');
    }

    public function cek_username($username)
    {
        $model = new Model_siswa();
        $cek_username = $model->cek_username($username)->getResultArray();
        $respon = json_decode(json_encode($cek_username), true);
        $data['results'] = count($respon);
        echo json_encode($data);
    }

    public function cek_nis($nis)
    {
        $model = new Model_siswa();
        $cek_nis = $model->cek_nis($nis)->getResultArray();
        $respon = json_decode(json_encode($cek_nis), true);
        $data['results'] = count($respon);
        echo json_encode($data);
    }

    public function data_edit($id_siswa)
    {
        $model = new Model_siswa();
        $encrypter = \Config\Services::encrypter();

        $data_pengguna = $model->detail_data($id_siswa)->getResultArray();
        $respon = json_decode(json_encode($data_pengguna), true);
        $data['results'] = array();
        foreach ($respon as $value) :
            $isi['id_siswa'] = $value['id_siswa'];
            $isi['id_sekolah'] = $value['id_sekolah'];
            $isi['nama_sekolah'] = $value['nama_sekolah'];
            $isi['nomor_induk'] = $value['nomor_induk'];
            $isi['username_siswa'] = $value['username_siswa'];
            $isi['nama_siswa'] = $value['nama_siswa'];
            $isi['email_siswa'] = $value['email_siswa'];
            $isi['no_telp_siswa'] = $value['no_telp_siswa'];
            $isi['alamat_siswa'] = $value['alamat_siswa'];
            $isi['jurusan'] = $value['jurusan'];
            $isi['status'] = $value['status'];
            $isi['foto_resmi'] = $value['foto_resmi'];
        endforeach;
        echo json_encode($isi);
    }
}