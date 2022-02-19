<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_absen;

class kirim_email extends BaseController
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
    	$email = \Config\Services::email();
        $email->setFrom('bakesbangpoldagrikabmadiun@gmail.com','Badan Kesatuan Bangsa dan Politik Dalam Negeri Kabupaten Madiun');
		$email->setTo('ditamega0411@gmail.com');

		$email->attach(base_url('docs/img/img_logo/1643622777_07e1231c2b3237328d8d.gif'));

		$email->setSubject('Pemberitahuan Pengajuan Magang');
		$email->setMessage('Dengan ini kami melakukan konfirmasi atas pengajuan magang pada kantor Badan Kesatuan Bangsa dan Politik Dalam Negeri Kabupaten Madiun pada tanggal 12-12-2020. Bersama ini kami kirimkan surat penerimaan pengajuan magang oleh saudara Dita Mega Saputri dari Politeknik Negeri Madiun. Untuk mengkonfirmasi pihak Badan Kesatuan Bangsa dan Politik Dalam Negeri, saudara diharapakan datang ke kantor Badan Kesatuan Bangsa dan Politik Dalam Negeri Kabupaten Madiun untuk membahas rencana magang paling lambat pada tanggal 12-02-2022.');

		if(! $email->send()){
			return 'gagal';
		}else{
			return 'berhasil';
		}
    }
}