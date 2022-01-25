<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Jobdesk extends BaseController
{

    protected $Model_jobdesk;

    public function index()
    {
        $data = [
            'judul' => 'Tabel Job Deskripsi'
        ];
        return view('Admin/viewTJobdesk', $data);
    }

    public function add_jobdesk()
    {
    }

    public function update_jobdesk()
    {
    }

    public function delete_jobdesk()
    {
    }
}