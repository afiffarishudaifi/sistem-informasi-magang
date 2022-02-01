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
        $this->db = db_connect();
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
        
        $id = $this->request->getPost('id_siswa');

        $avatar      = $this->request->getFile('edit_foto');
        if ($avatar != '') {
            $namabaru     = $avatar->getRandomName();
            $avatar->move('docs/img/img_siswa/', $namabaru);

            if($this->request->getPost('edit_password') != '') {
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
            } else {
                $data = array(
                    'id_sekolah'     => $this->request->getPost('edit_sekolah'),
                    'nomor_induk'     => $this->request->getPost('edit_nis'),
                    'username_siswa'     => $this->request->getPost('edit_username'),
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
            }

            $data_foto = $model->detail_data($id)->getRowArray();

            if ($data_foto != null) {
                if ($data_foto['foto_resmi'] != 'docs/img/img_siswa/noimage.jpg') {
                    if (file_exists($data_foto['foto_resmi'])) {
                        unlink($data_foto['foto_resmi']);
                    }
                }
            }
        } else {
            if($this->request->getPost('edit_password') != '') {
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
            } else {
                $data = array(
                    'id_sekolah'     => $this->request->getPost('edit_sekolah'),
                    'nomor_induk'     => $this->request->getPost('edit_nis'),
                    'username_siswa'     => $this->request->getPost('edit_username'),
                    'nama_siswa'     => $this->request->getPost('edit_nama'),
                    'email_siswa'     => $this->request->getPost('edit_email'),
                    'no_telp_siswa'     => $this->request->getPost('edit_no_telp'),
                    'alamat_siswa'     => $this->request->getPost('edit_alamat'),
                    'jurusan'     => $this->request->getPost('edit_jurusan'),
                    'status'     => $this->request->getPost('edit_status'),
                    'id_siswa'     => $this->request->getPost('id_siswa'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
            };
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

    public function data_sekolah()
    {
        $request = service('request');
        $postData = $request->getPost(); // OR $this->request->getPost();

        $response = array();

        $data = array();

        $db      = \Config\Database::connect();
        $builder = $this->db->table("sekolah");

        $poli = [];

        if (isset($postData['query'])) {

            $query = $postData['query'];

            // Fetch record
            $builder->select('id_sekolah, nama_sekolah');
            $builder->like('nama_sekolah', $query, 'both');
            $query = $builder->get();
            $data = $query->getResult();
        } else {

            // Fetch record
            $builder->select('id_sekolah, nama_sekolah');
            $query = $builder->get();
            $data = $query->getResult();
        }

        foreach ($data as $country) {
            $poli[] = array(
                "id" => $country->id_sekolah,
                "text" => $country->nama_sekolah,
            );
        }

        $response['data'] = $poli;

        return $this->response->setJSON($response);
    }
}