<?php

namespace App\Controllers\Sekolah;

use App\Controllers\BaseController;
use App\Models\Model_peserta;

class Timeline extends BaseController
{

    protected $Model_peserta;
    public function __construct()
    {
        $this->Model_peserta = new Model_peserta();
        helper(['form', 'url']);
    }

    public function index()
    {
        $session = session();
        $model = new Model_peserta();
        $id = $session->get('id_login');
        $peserta = $model->view_data_calender_peserta($id)->getResultArray();

        $data = [
            'judul' => 'Timeline Peserta Magang',
            'peserta' => $peserta
        ];
        return view('Sekolah/viewTimeline', $data);
    }
}
