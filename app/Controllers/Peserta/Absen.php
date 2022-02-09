<?php

namespace App\Controllers\Peserta;

use App\Controllers\BaseController;
use App\Models\Model_absen;

class Absen extends BaseController
{

    protected $Model_absen;
    public function __construct()
    {
        $this->Model_absen = new Model_absen();
        helper(['form', 'url']);
        $this->db = db_connect();
    }

    public function index()
    {	
    	$session = session();
        $model = new Model_absen();
        $absen = $model->view_data_sudah($session->get('id_login'));

        $data = [
            'judul' => 'Form Absensi',
            'absen' => $absen
        ];
        return view('Peserta/viewAbsen', $data);
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
            'id_siswa' => $session->get('id_login'),
            'foto_absen' => "docs/img/img_absen/" . $namabaru,
            'status_absen' => $this->request->getPost('input_status'),
            'keterangan' => $this->request->getPost('input_keterangan'),
            'konfirmasi_absen' => 'Menunggu'
        );

        $model = new Model_absen();
        $model->add_data($data);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        return redirect()->to(base_url('Peserta/Absen'));
    }
}