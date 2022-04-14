<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Controller;
use Dompdf\Dompdf;

class PdfController extends Controller
{
    public function index()
    {
        $data = [
            'nama' => 'Afif Faris Hudaifi',
            'asal' => 'Politeknik Negeri Jember',
            'jurusan' => 'Teknologi Informasi / Manajemen Informatika'
        ];

        return view('Admin/cetakSertifikat', $data);
    }

    public function generate()
    {
        $filename = date('y-m-d-H-i-s'). '-cetak sertifikat';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        $data = [
            'nama' => 'Afif Faris Hudaifi',
            'asal' => 'Politeknik Negeri Jember',
            'jurusan' => 'Teknologi Informasi / Manajemen Informatika'
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