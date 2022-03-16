<?php

namespace App\Controllers;
use App\Models\Model_login;
use App\Models\Model_peserta;

class Login extends BaseController
{
    public function index()
    {
        $session = session();

        if ($session->get('nama_login') || $session->get('status_login') == 'Siswa') {
            return redirect()->to('Peserta/Dashboard');
        } else if ($session->get('nama_login') || $session->get('status_login') == 'Sekolah') {
            return redirect()->to('Sekolah/Dashboard');
        }

        helper(['form']);
        return view('viewLogin');
    }

    public function pengajuanMagang()
    {
        $session = session();
        $model = new Model_login();
        $siswa_tedaftar = array();

        $siswa = $model->data_siswa()->getResultArray();
        foreach ($siswa as $value) {
            array_push($siswa_tedaftar, $value['id_siswa']);
        }
        $hasil = $model->data_seleksi($siswa_tedaftar)->getResultArray();

        $data = [
            'hasil' => $hasil
        ];
        helper(['form']);
        return view('viewPengajuan', $data);
    }

    public function simpanPengajuan()
    {
        $session = session();
        $encrypter = \Config\Services::encrypter();

        $avatar_pengantar = $this->request->getFile('input_pengantar');
        $namabaru_pengantar = $avatar_pengantar->getRandomName();
        $avatar_pengantar->move('docs/file_pengantar/', $namabaru_pengantar);

        $avatar_proposal = $this->request->getFile('input_proposal');
        $namabaru_proposal = $avatar_proposal->getRandomName();
        $avatar_proposal->move('docs/file_proposal/', $namabaru_proposal);

        $data = array(
            'id_siswa'     => $this->request->getPost('input_siswa'),
            'waktu_mulai'     => $this->request->getPost('input_mulai'),
            'waktu_selesai'     => $this->request->getPost('input_selesai'),
            'pengantar'     => "docs/file_pengantar/" . $namabaru_pengantar,
            'proposal'     => "docs/file_proposal/" . $namabaru_proposal,
            'status_pengajuan'     => 'Pengajuan'
        );

        $model = new Model_login();
        $model->add_pengajuan($data);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        return redirect()->to(base_url('Login/pengajuanMagang'));
    }

    public function loginAdmin()
    {
        $session = session();

        if ($session->get('nama_login') || $session->get('status_login') == 'Admin') {
            return redirect()->to('Admin/Dashboard');
        } 

        helper(['form']);
        return view('viewLoginAdmin');
    }

    public function loginSistemAdmin()
    {
        $session = session();

        $model = new Model_login();
        $encrypter = \Config\Services::encrypter();

        $status = $this->request->getPost('status');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $data = $model->loginAdmin($username)->getRowArray();

        if ($data) {
            $pass = $data['password_admin'];
            $status = 'Admin';
            $verify_pass = $encrypter->decrypt(base64_decode($pass));
            if ($verify_pass == $password) {
                $ses_data = [
                    'id_login' => $data['id_admin'],
                    'nama_login' => $data['nama_admin'],
                    'foto' => 'no_image.png',
                    'status_login' => $status,
                    'logged_in' => TRUE,
                    'is_admin' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/Admin/Dashboard');
            } else {
                $session->setFlashdata('msg', 'Password Tidak Sesuai');
                return redirect()->to('/Login/loginAdmin');
            }
        } else {
            $session->setFlashdata('msg', 'Username Tidak di Temukan');
            return redirect()->to('/Login/loginAdmin');
        }
    }


    public function loginSistem()
    {
        $session = session();

        if ($session->get('nama_login') || $session->get('status_login') == 'Siswa') {
            return redirect()->to('Peserta/Dashboard');
        } else if ($session->get('nama_login') || $session->get('status_login') == 'Sekolah') {
            return redirect()->to('Sekolah/Dashboard');
        }
        
        $model = new Model_login();
        $encrypter = \Config\Services::encrypter();

        // $status = $this->request->getPost('status');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // if ($status == 'Siswa') {
            $data = $model->loginSiswa($username)->getRowArray();

            if ($data) {
                $pass = $data['password_siswa'];
                $status = 'Siswa';
                $verify_pass =  $encrypter->decrypt(base64_decode($pass));
                if ($verify_pass == $password) {
                    $ses_data = [
                        'id_login' => $data['id_siswa'],
                        'nama_login' => $data['nama_siswa'],
                        'foto' => 'no_image.png',
                        'status_login' => $status,
                        'logged_in' => TRUE,
                        'is_admin' => TRUE
                    ];
                    $session->set($ses_data);
                    return redirect()->to('/Peserta/Dashboard');
                } else {
                    $session->setFlashdata('msg', 'Password Tidak Sesuai');
                    return redirect()->to('/Login');
                }
            } else {
                // $session->setFlashdata('msg', 'Username Tidak di Temukan');
                // return redirect()->to('/Login');
                $data = $model->loginSekolah($username)->getRowArray();

                if ($data) {
                    $pass = $data['password_sekolah'];
                    $status = 'Sekolah';
                    $verify_pass =  $encrypter->decrypt(base64_decode($pass));
                    if ($verify_pass == $password) {
                        $ses_data = [
                            'id_login' => $data['id_sekolah'],
                            'nama_login' => $data['nama_sekolah'],
                            'foto' => 'no_image.png',
                            'status_login' => $status,
                            'logged_in' => TRUE,
                            'is_admin' => TRUE
                        ];
                        $session->set($ses_data);
                        return redirect()->to('/Sekolah/Dashboard');
                    } else {
                        $session->setFlashdata('msg', 'Password Tidak Sesuai');
                        return redirect()->to('/Login');
                    }
                } else {
                    $session->setFlashdata('msg', 'Username Tidak di Temukan');
                    return redirect()->to('/Login');
                }
            }
        // } else {
        //     $data = $model->loginSekolah($username)->getRowArray();

        //     if ($data) {
        //         $pass = $data['password_sekolah'];
        //         $status = 'Sekolah';
        //         $verify_pass =  $encrypter->decrypt(base64_decode($pass));
        //         if ($verify_pass == $password) {
        //             $ses_data = [
        //                 'id_login' => $data['id_sekolah'],
        //                 'nama_login' => $data['nama_sekolah'],
        //             	'foto' => 'no_image.png',
        //                 'status_login' => $status,
        //                 'logged_in' => TRUE,
        //                 'is_admin' => TRUE
        //             ];
        //             $session->set($ses_data);
        //             return redirect()->to('/Sekolah/Dashboard');
        //         } else {
        //             $session->setFlashdata('msg', 'Password Tidak Sesuai');
        //             return redirect()->to('/Login');
        //         }
        //     } else {
        //         $session->setFlashdata('msg', 'Username Tidak di Temukan');
        //         return redirect()->to('/Login');
        //     }
        // }
    }

    public function registrasiSiswa()
    {
        $session = session();
        $model = new Model_peserta();
        $sekolah = $model->data_sekolah()->getResultArray();
        $data = [
            'sekolah' => $sekolah
        ];
        return view('viewRegistrasi', $data);
    }

    public function simpanSiswa()
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
            'status'     => 'Tidak Aktif'
        );

        $model = new Model_peserta();
        $model->add_data($data);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        return redirect()->to(base_url('Login/registrasiSiswa'));
    }

    public function resetPassword()
    {
        $session = session();
        return view('viewResetPassword');
    }

    public function prosesResetPassword()
    {
        $session = session();
        $encrypter = \Config\Services::encrypter();
        $model = new Model_peserta();
        $username = $this->request->getPost('input_username');
        $password = $this->request->getPost('input_password');
        $konf_password = $this->request->getPost('input_konf_password');
        $cek_akun = $model->cek_akun($username)->getRowArray();
        if ($cek_akun == null) {
            $session->setFlashdata('gagal', 'Data tidak ditemukan');
            return redirect()->to(base_url('Login/resetPassword'));
        }
        $id = $cek_akun['id_siswa'];
        $data = array(
            'password_siswa' => base64_encode($encrypter->encrypt($this->request->getPost('input_password')))
        );
        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        return redirect()->to(base_url('Login/resetPassword'));
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/Login');
    }
}
