<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_laporan_penilaian extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'id_nilai';

    public function view_data()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('nilai');
		$builder->select('nilai.id_nilai, siswa.nama_siswa, kedisiplinan, tanggung_jawab, kerja_sama, kerajinan, inisiatif, rata_rata');
		$builder->join('siswa','siswa.id_siswa = nilai.id_siswa');
        return $builder->get();
    }

    public function data_nilai()
    {
    	$db      = \Config\Database::connect();
        $builder = $db->table('nilai');
        $builder->select('id_nilai, nama_nilai');
        return $builder->get();
    }

    public function view_data_sudah($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('absen');
        $builder->where('id_nilai', $id);
        $builder->where('date(waktu_absen)', date('Y-m-d'));
        return $builder->countAllResults();
    }

    public function filter($param)
    {
    	$db      = \Config\Database::connect();
        $builder = $db->table('nilai');
		$builder->select('nilai.id_nilai, siswa.nama_siswa, kedisiplinan, tanggung_jawab, kerja_sama, kerajinan, inisiatif, rata_rata');
		$builder->join('siswa','siswa.id_siswa = nilai.id_siswa');
        if ($param['cek_waktu1']) $builder->where('created_at >= ', $param['cek_waktu1']);
        if ($param['cek_waktu2']) $builder->where('created_at <= ', $param['cek_waktu2']);
        
        return $builder->get();
    }
}