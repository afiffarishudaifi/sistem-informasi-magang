<?php

namespace App\Controllers\Peserta;

use App\Controllers\BaseController;
use App\Models\Model_peserta;

class Timeline extends BaseController
{

    protected $Model_peserta;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Siswa') {
            return redirect()->to('Login');
        }
        
        $this->Model_peserta = new Model_peserta();
        helper(['form', 'url']);
    }

    public function index()
    {   
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Siswa') {
            return redirect()->to('Login');
        }
        
        $model = new Model_peserta();
        $id = $session->get('id_login');
        $peserta = $model->view_data_calender_peserta($id)->getResultArray();

        $data = [
            'judul' => 'Timeline Peserta Magang',
            'peserta' => $peserta
        ];
        return view('Peserta/viewTimeline', $data);
    }
}
