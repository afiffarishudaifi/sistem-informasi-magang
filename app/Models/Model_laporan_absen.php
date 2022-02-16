<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_laporan_absen extends Model
{
    protected $table = 'absen';
    protected $primaryKey = 'id_absen';

    public function view_data()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('absen');
		$builder->select('absen.id_absen, nama_siswa, status_absen, keterangan, konfirmasi_absen, DATE_FORMAT(waktu_absen, "%d %m %Y") as waktu_absen');
		$builder->join('siswa','siswa.id_siswa = absen.id_siswa');
		$builder->join('sekolah','sekolah.id_sekolah = siswa.id_sekolah');
        return $builder->get();
    }

    public function view_data_sudah($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('absen');
        $builder->where('id_absen', $id);
        $builder->where('date(waktu_absen)', date('Y-m-d'));
        return $builder->countAllResults();
    }

    public function filter($param)
    {
    	$db      = \Config\Database::connect();
        $builder = $db->table('absen');
		$builder->select('absen.id_absen, nama_siswa, waktu_absen, status_absen, keterangan, konfirmasi_absen, DATE_FORMAT(waktu_absen, "%d %m %Y") as waktu_absen');
		$builder->join('siswa','siswa.id_siswa = absen.id_siswa');
		$builder->join('sekolah','sekolah.id_sekolah = siswa.id_sekolah');
        if ($param['cek_waktu1']) $builder->where('waktu_absen >= ', $param['cek_waktu1']);
        if ($param['cek_waktu2']) $builder->where('waktu_absen <= ', $param['cek_waktu2']);
        if ($param['status_absen']) $builder->where('status_absen', $param['status_absen']);
        
        return $builder->get();
    }
}