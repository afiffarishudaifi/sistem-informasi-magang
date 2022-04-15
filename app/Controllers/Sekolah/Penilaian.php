<?php

namespace App\Controllers\Sekolah;

use App\Controllers\BaseController;
use App\Models\Model_nilai;
use App\Models\Model_peserta;
use App\Models\Model_profil;
use Dompdf\Dompdf;

class Penilaian extends BaseController
{

    protected $Model_nilai;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Sekolah') {
            return redirect()->to('Login');
        }
        $this->Model_nilai = new Model_nilai();
        helper(['form', 'url']);
        $this->db = db_connect();
    }

    public function index()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Sekolah') {
            return redirect()->to('Login');
        }
        
        $model = new Model_nilai();
        $id = $session->get('id_login');
        $nilai = $model->view_data_sekolah($id)->getResultArray();

        $data = [
            'judul' => 'Tabel Nilai Peserta',
            'nilai' => $nilai
        ];
        return view('Sekolah/viewNilaiPeserta', $data);
    }

    public function generate($id_nilai)
    {
        $filename = date('y-m-d-H-i-s'). '-cetak sertifikat';

        $model = new Model_nilai();

        $data_nilai = $model->detail_data_cetak($id_nilai)->getRowArray();

        
        $model_profil = new Model_profil();
        $profil = $model_profil->view_data()->getRowArray();

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        $data = [
            'nama' => $data_nilai['nama_siswa'],
            'asal' => $data_nilai['nama_sekolah'],
            'jurusan' => $data_nilai['jurusan'],
            'kepala' => $profil['kepala']
        ];

        // load HTML content
        $dompdf->loadHtml(view('Admin/cetakSertifikat', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->set_option('isRemoteEnabled', true);

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);
    }
}
