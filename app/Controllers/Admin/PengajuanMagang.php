<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_pengajuan;
use App\Models\Model_peserta;

class PengajuanMagang extends BaseController
{

    protected $Model_pengajuan;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        $this->Model_pengajuan = new Model_pengajuan();
        helper(['form', 'url']);
        $this->db = db_connect();
    }

    public function index()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        
        $model = new Model_pengajuan();
        $pengajuan = $model->view_data()->getResultArray();

        $data = [
            'judul' => 'Tabel Pengajuan Magang',
            'pengajuan' => $pengajuan
        ];
        return view('Admin/viewPengajuanMagang', $data);
    }

    public function konfirmasi_pengajuan()
    {
        $session = session();
        $model = new Model_pengajuan();
        date_default_timezone_set('Asia/Jakarta');

        $id = $this->request->getPost('id_pengajuan');
        $id_siswa = $this->request->getPost('id_siswa');

        $data_siswa = $model->cek_data_pengajuan($id)->getRowArray();
        $nama = $data_siswa['nama_siswa'];
        $waktu_mulai = $data_siswa['waktu_mulai'];
        $waktu_selesai = $data_siswa['waktu_selesai'];
        $email = $data_siswa['email_siswa'];

        if($this->request->getPost('status_pengajuan') == 'Ditolak') {
            $email = \Config\Services::email();
            $email->setFrom('bakesbangpoldagrikabmadiun@gmail.com','Badan Kesatuan Bangsa dan Politik Dalam Negeri Kabupaten Madiun');
            $email->setTo('afiffaris5@gmail.com');

            $email->setSubject('Pemberitahuan Pengajuan Magang');
            // $email->setMessage('Dengan ini kami melakukan Penolakan atas pengajuan magang pada kantor Badan Kesatuan Bangsa dan Politik Dalam Negeri Kabupaten Madiun pada tanggal 12-12-2020.');
            $email->setMessage('Maaf ' . $nama .'! <br>
            Anda belum diterima magang / praktek kerja lapangan pada kantor Badan Kesatuan Bangsa dan Politik Dalam Negeri kabupaten madiun.

            Terima kasih atas ketertarikan Anda untuk melakukan pengajuan magang / praktek kerja lapangan pada kantor Badan kesatuan bangsa dan politik dalam negeri kabupaten madiun');
            $email->send();
        } else {
            $email = \Config\Services::email();
            $email->setFrom('bakesbangpoldagrikabmadiun@gmail.com','Badan Kesatuan Bangsa dan Politik Dalam Negeri Kabupaten Madiun');
            $email->setTo('afiffaris5@gmail.com');

            $email->attach(base_url('docs/img/img_logo/1643622777_07e1231c2b3237328d8d.gif'));

            $email->setSubject('Pemberitahuan Pengajuan Magang');
            // $email->setMessage('Dengan ini kami melakukan konfirmasi atas pengajuan magang pada kantor Badan Kesatuan Bangsa dan Politik Dalam Negeri Kabupaten Madiun pada tanggal 12-12-2020. Bersama ini kami kirimkan surat penerimaan pengajuan magang oleh saudara Dita Mega Saputri dari Politeknik Negeri Madiun. Untuk mengkonfirmasi pihak Badan Kesatuan Bangsa dan Politik Dalam Negeri, saudara diharapakan datang ke kantor Badan Kesatuan Bangsa dan Politik Dalam Negeri Kabupaten Madiun untuk membahas rencana magang paling lambat pada tanggal 12-02-2022.');
            $email->setMessage('Selamat '. $nama .'! <br>
            Kantor Badan Kesatuan Bangsa dan Politik Dalam Negeri kabupaten madiun telah menerima anda untuk melakukan magang / praktek kerja lapanga mulai tangga ' . $waktu_mulai . ' Hingga tanggal ' . $waktu_selesai . ' Selanjutnya anda bisa login pada aplikasi E-Magang dengan username dan password yang sudah terdaftar.');

            $email->send();
        }

        $data = array(
            'id_admin'          => $session->get('id_login'),
            'status_pengajuan'      => $this->request->getVar('status_pengajuan'),
            'updated_at'        => date('Y-m-d H:i:s')
        );

        // $model->update_data($data, $id);

        // $model_peserta = new Model_peserta();
        // if ($this->request->getPost('status_pengajuan') == 'Diterima') {
        //     $data = array(
        //         'status'      => 'Aktif',
        //         'updated_at'        => date('Y-m-d H:i:s')
        //     );
        //     $model_peserta->update_data($data, $id_siswa);
        // }
        $session->setFlashdata('sukses', 'Data berhasil disimpan');
        return redirect()->to(base_url('Admin/PengajuanMagang'));
    }

    public function delete_pengajuan()
    {
        $session = session();
        $model = new Model_pengajuan();
        $id = $this->request->getPost('id');

        $model->delete_data($id);
        session()->setFlashdata('sukses', 'Data sudah berhasil dihapus');
        return redirect()->to('/Admin/PengajuanMagang');
    }

    public function data_edit($id_pengajuan)
    {
        $model = new Model_pengajuan();
        $encrypter = \Config\Services::encrypter();

        $data_pengajuan = $model->detail_data($id_pengajuan)->getResultArray();
        $respon = json_decode(json_encode($data_pengajuan), true);
        $data['results'] = array();
        foreach ($respon as $value) :
            $isi['id_pengajuan'] = $value['id_pengajuan'];
        endforeach;
        echo json_encode($isi);
    }
}
