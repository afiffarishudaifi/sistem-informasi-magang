<?php

namespace App\Controllers\Sekolah;

use App\Controllers\BaseController;
use App\Models\Model_jobdesk;

class Jobdesk extends BaseController
{

    protected $Model_jobdesk;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Sekolah') {
            return redirect()->to('Login');
        }
        
        $this->Model_jobdesk = new Model_jobdesk();
        helper(['form', 'url']);
        $this->db = db_connect();
    }

    public function index()
    {   
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Sekolah') {
            return redirect()->to('Login');
        }
        
        $model = new Model_jobdesk();
        $id = $session->get('id_login');
        $jobdesk = $model->view_data_sekolah($id)->getResultArray();
        $data = [
            'judul' => 'Tabel Job Deskripsi',
            'jobdesk' => $jobdesk

        ];
        return view('Sekolah/viewJobdesk', $data);
    }
}
