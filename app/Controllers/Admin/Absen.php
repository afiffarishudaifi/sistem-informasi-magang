<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_absen;

class Absen extends BaseController
{

    protected $Model_absen;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }

        $this->Model_absen = new Model_absen();
        helper(['form', 'url']);
        $this->db = db_connect();
    }

    public function index()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        
        $model = new Model_absen();
        $absen = $model->view_data_pengajuan()->getResultArray();

        $data = [
            'judul' => 'Tabel Absensi',
            'absen' => $absen
        ];
        return view('Admin/viewTAbsen', $data);
    }

    public function add_absen()
    {
        $session = session();

        $avatar      = $this->request->getFile('input_foto');
        if ($avatar != '') {
            $namabaru     = $avatar->getRandomName();
            $avatar->move('docs/img/img_absen/', $namabaru);
        } else {
            $namabaru = 'noimage.jpg';
        }

        $data = array(
            'id_siswa'     => $this->request->getPost('input_siswa'),
            'foto_absen'     => "docs/img/img_absen/" . $namabaru,
            'status_absen'     => $this->request->getPost('input_status'),
            'keterangan'     => $this->request->getPost('input_keterangan')
        );

        $model = new Model_absen();
        $model->add_data($data);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        return redirect()->to(base_url('Admin/Absen'));
    }

    public function update_absen()
    {
        $session = session();
        $model = new Model_absen();
        
        $id = $this->request->getPost('id_absen');

        $avatar      = $this->request->getFile('edit_foto');
        if ($avatar != '') {
            $namabaru     = $avatar->getRandomName();
            $avatar->move('docs/img/img_absen/', $namabaru);
            
            $data = array(
	            'id_siswa'     => $this->request->getPost('edit_siswa'),
	            'foto_absen'     => "docs/img/img_absen/" . $namabaru,
	            'status_absen'     => $this->request->getPost('edit_status'),
	            'keterangan'     => $this->request->getPost('edit_keterangan'),
                'updated_at' => date('Y-m-d H:i:s')
            );

            $data_foto = $model->detail_data($id)->getRowArray();

            if ($data_foto != null) {
                if ($data_foto['foto_absen'] != 'docs/img/img_absen/noimage.jpg') {
                    if (file_exists($data_foto['foto_absen'])) {
                        unlink($data_foto['foto_absen']);
                    }
                }
            }
        } else {
            $data = array(
	            'id_siswa'     => $this->request->getPost('edit_siswa'),
	            'status_absen'     => $this->request->getPost('edit_status'),
	            'keterangan'     => $this->request->getPost('edit_keterangan'),
                'updated_at' => date('Y-m-d H:i:s')
            );
        }

        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil diubah');
        return redirect()->to(base_url('Admin/Absen'));
    }

    public function delete_absen()
    {
        $session = session();
        $model = new Model_absen();
        $id = $this->request->getPost('id');
        // $foreign = $model->cek_foreign($id);
        // if ($foreign == 0) {
            $data_foto = $model->detail_data($id)->getRowArray();

            if ($data_foto != null) {
                if ($data_foto['foto_absen'] != 'docs/img/img_absen/noimage.jpg') {
                    if (file_exists($data_foto['foto_absen'])) {
                        unlink($data_foto['foto_absen']);
                    }
                }
            }
            $model->delete_data($id);
            session()->setFlashdata('sukses', 'Data ini berhasil dihapus');
        // } else {
        //     session()->setFlashdata('gagal', 'Data ini dipakai di tabel lain dan tidak bisa dihapus');
        // }
        return redirect()->to('/Admin/Absen');
    }

    public function data_edit($id_absen)
    {
        $model = new Model_absen();

        $data_absen = $model->detail_data($id_absen)->getResultArray();
        $respon = json_decode(json_encode($data_absen), true);
        $data['results'] = array();
        foreach ($respon as $value) :
            $isi['id_siswa'] = $value['id_siswa'];
            $isi['nama_siswa'] = $value['nama_siswa'];
            $isi['id_absen'] = $value['id_absen'];
            $isi['foto_absen'] = $value['foto_absen'];
            $isi['waktu_absen'] = $value['waktu_absen'];
            $isi['status_absen'] = $value['status_absen'];
            $isi['keterangan'] = $value['keterangan'];
        endforeach;
        echo json_encode($isi);
    }

    public function data_siswa()
    {
        $request = service('request');
        $postData = $request->getPost(); // OR $this->request->getPost();

        $response = array();

        $data = array();

        $db      = \Config\Database::connect();
        $builder = $this->db->table("siswa");

        $poli = [];

        if (isset($postData['query'])) {

            $query = $postData['query'];

            // Fetch record
            $builder->select('id_siswa, nama_siswa');
            $builder->like('nama_siswa', $query, 'both');
            $query = $builder->get();
            $data = $query->getResult();
        } else {

            // Fetch record
            $builder->select('id_siswa, nama_siswa');
            $query = $builder->get();
            $data = $query->getResult();
        }

        foreach ($data as $siswa) {
            $poli[] = array(
                "id" => $siswa->id_siswa,
                "text" => $siswa->nama_siswa,
            );
        }

        $response['data'] = $poli;

        return $this->response->setJSON($response);
    }

    public function konfirmasi_absen()
    {
    	$session = session();
        $model = new Model_absen();
        
        $id = $this->request->getPost('id_absen_konfirmasi');
        $data = array(
            'konfirmasi_absen'     => $this->request->getPost('konfirmasi_absen'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil diubah');
        return redirect()->to(base_url('Admin/Absen'));
    }
}
