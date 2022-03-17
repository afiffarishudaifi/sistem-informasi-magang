<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_peserta;

class Timeline extends BaseController
{

    protected $Model_peserta;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        $this->Model_peserta = new Model_peserta();
        helper(['form', 'url']);
    }

    public function index()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        
        $model = new Model_peserta();
        $peserta = $model->view_data_calender()->getResultArray();

        $data = [
            'judul' => 'Timeline Peserta Magang',
            'peserta' => $peserta
        ];
        return view('Admin/viewTimeline', $data);
    }
}
