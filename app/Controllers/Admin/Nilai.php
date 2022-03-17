<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_nilai;
use App\Models\Model_peserta;

class Nilai extends BaseController
{

    protected $Model_nilai;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        $this->Model_nilai = new Model_nilai();
        helper(['form', 'url']);
        $this->db = db_connect();
    }

    public function index()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        
        $model = new Model_nilai();
        $nilai = $model->view_data()->getResultArray();

        $data = [
            'judul' => 'Tabel Nilai Peserta',
            'nilai' => $nilai
        ];
        return view('Admin/viewNilaiPeserta', $data);
    }

    public function add_nilai()
    {
        $session = session();
        $model = new Model_nilai();

        $id = $this->request->getPost('input_siswa');

        $data = array(
            'id_siswa'          => $id,
            'kedisiplinan'      => $this->request->getPost('input_kedisiplinan'),
            'tanggung_jawab'    => $this->request->getPost('input_tanggung_jawab'),
            'kerja_sama'        => $this->request->getPost('input_kerja_sama'),
            'kerajinan'         => $this->request->getPost('input_kerajinan'),
            'inisiatif'         => $this->request->getPost('input_inisiatif'),
            'jumlah'            => $this->request->getPost('input_jumlah'),
            'rata_rata'         => $this->request->getPost('input_rata')
        );

        $model->add_data($data);

        $data = array(
            'status'     => 'Selesai',
            'updated_at' => date('Y-m-d H:i:s')
        );
        $modelsiswa = new Model_peserta();
        $modelsiswa->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        return redirect()->to(base_url('Admin/Nilai'));
    }

    public function update_nilai()
    {
        $session = session();
        $model = new Model_nilai();

        $id = $this->request->getPost('id_nilai');

        $data = array(
            'id_siswa'     => $this->request->getPost('edit_siswa'),
            'kedisiplinan'      => $this->request->getPost('edit_kedisiplinan'),
            'tanggung_jawab'    => $this->request->getPost('edit_tanggung_jawab'),
            'kerja_sama'        => $this->request->getPost('edit_kerja_sama'),
            'kerajinan'         => $this->request->getPost('edit_kerajinan'),
            'inisiatif'         => $this->request->getPost('edit_inisiatif'),
            'jumlah'            => $this->request->getPost('edit_jumlah'),
            'rata_rata'             => $this->request->getPost('edit_rata')
        );

        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        return redirect()->to(base_url('Admin/Nilai'));
    }

    public function delete_nilai()
    {
        $session = session();
        $model = new Model_nilai();
        $id = $this->request->getPost('id');

        $model->delete_data($id);
        session()->setFlashdata('sukses', 'Data sudah berhasil dihapus');
        return redirect()->to('/Admin/Nilai');
    }

    public function data_edit($id_nilai)
    {
        $model = new Model_nilai();
        $encrypter = \Config\Services::encrypter();

        $data_nilai = $model->detail_data($id_nilai)->getResultArray();
        $respon = json_decode(json_encode($data_nilai), true);
        $data['results'] = array();
        foreach ($respon as $value) :
            $isi['id_nilai'] = $value['id_nilai'];
            $isi['id_siswa'] = $value['id_siswa'];
            $isi['nama_siswa'] = $value['nama_siswa'];
            $isi['kedisiplinan'] = $value['kedisiplinan'];
            $isi['tanggung_jawab'] = $value['tanggung_jawab'];
            $isi['kerja_sama'] = $value['kerja_sama'];
            $isi['kerajinan'] = $value['kerajinan'];
            $isi['inisiatif'] = $value['inisiatif'];
            $isi['jumlah'] = $value['jumlah'];
            $isi['rata_rata'] = $value['rata_rata'];
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
            $builder->where('status', 'Aktif');
            $builder->like('nama_siswa', $query, 'both');
            $query = $builder->get();
            $data = $query->getResult();
        } else {

            // Fetch record
            $builder->select('id_siswa, nama_siswa');
            $builder->where('status', 'Aktif');
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
}
