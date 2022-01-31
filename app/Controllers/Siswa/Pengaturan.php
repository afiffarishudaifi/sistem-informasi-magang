<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use App\Models\Model_siswa;

class Pengaturan extends BaseController
{

    protected $Model_dashboard;
    public function __construct()
    {
        $session = session();

        // if (!$session->get('nama_login') || $session->get('status_login') != 'Siswa' || $session->get('status_login') != 'Sekolah') {
        //     return redirect()->to('Login');
        // }
        $this->Model_siswa = new Model_siswa();

        helper(['form', 'url']);
    }

    public function index()
    {
        $model = new Model_siswa();
        $sekolah = $model->data_sekolah()->getResultArray();

        $data = [
            'judul' => 'Pengaturan Akun',
            'sekolah' => $sekolah
        ];
        return view('Siswa/viewPengaturan', $data);
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
                    'password_siswa'     => base64_encode($encrypter->encrypt($this->request->getPost('edit_password'))),
                    'nama_siswa'     => $this->request->getPost('edit_nama'),
                    'email_siswa'     => $this->request->getPost('edit_email'),
                    'no_telp_siswa'     => $this->request->getPost('edit_no_telp'),
                    'alamat_siswa'     => $this->request->getPost('edit_alamat'),
                    'jurusan'     => $this->request->getPost('edit_jurusan'),
                    'foto_resmi'     => "docs/img/img_siswa/" . $namabaru,
                    'id_siswa'     => $this->request->getPost('id_siswa'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
            } else {
                $data = array(
                    'id_sekolah'     => $this->request->getPost('edit_sekolah'),
                    'nomor_induk'     => $this->request->getPost('edit_nis'),
                    'nama_siswa'     => $this->request->getPost('edit_nama'),
                    'email_siswa'     => $this->request->getPost('edit_email'),
                    'no_telp_siswa'     => $this->request->getPost('edit_no_telp'),
                    'alamat_siswa'     => $this->request->getPost('edit_alamat'),
                    'jurusan'     => $this->request->getPost('edit_jurusan'),
                    'foto_resmi'     => "docs/img/img_siswa/" . $namabaru,
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
                    'password_siswa'     => base64_encode($encrypter->encrypt($this->request->getPost('edit_password'))),
                    'nama_siswa'     => $this->request->getPost('edit_nama'),
                    'email_siswa'     => $this->request->getPost('edit_email'),
                    'no_telp_siswa'     => $this->request->getPost('edit_no_telp'),
                    'alamat_siswa'     => $this->request->getPost('edit_alamat'),
                    'jurusan'     => $this->request->getPost('edit_jurusan'),
                    'id_siswa'     => $this->request->getPost('id_siswa'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
            } else {
                $data = array(
                    'id_sekolah'     => $this->request->getPost('edit_sekolah'),
                    'nomor_induk'     => $this->request->getPost('edit_nis'),
                    'nama_siswa'     => $this->request->getPost('edit_nama'),
                    'email_siswa'     => $this->request->getPost('edit_email'),
                    'no_telp_siswa'     => $this->request->getPost('edit_no_telp'),
                    'alamat_siswa'     => $this->request->getPost('edit_alamat'),
                    'jurusan'     => $this->request->getPost('edit_jurusan'),
                    'id_siswa'     => $this->request->getPost('id_siswa'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
            };
        }

        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil diubah');
        return redirect()->to(base_url('Login/logout'));
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
            $isi['foto_resmi'] = $value['foto_resmi'];
        endforeach;
        echo json_encode($isi);
    }
}