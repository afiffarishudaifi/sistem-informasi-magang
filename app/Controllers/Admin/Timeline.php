<?php

namespace App\Controllers\Admin;

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
        $peserta = $model->view_data_calender()->getResultArray();

        $data = [
            'judul' => 'Timeline Peserta Magang',
            'peserta' => $peserta
        ];
        return view('Admin/viewTimeline', $data);
    }
}
