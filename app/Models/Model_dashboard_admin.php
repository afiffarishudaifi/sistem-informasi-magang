<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_dashboard_admin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';

    public function total_peserta_aktif()
    {
    	$db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->selectCount('id_siswa');
        $builder->where('status','Aktif');
        return $builder->get();
    }

    public function total_peserta_tidak_aktif()
    {
    	$db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->selectCount('id_siswa');
        $builder->where('status','Tidak Aktif');
        return $builder->get();
    }

    public function total_sekolah()
    {
    	$db      = \Config\Database::connect();
        $builder = $db->table('sekolah');
        $builder->selectCount('id_sekolah');
        return $builder->get();
    }

    public function total_pengajuan()
    {
    	$db      = \Config\Database::connect();
        $builder = $db->table('pengajuan_magang');
        $builder->selectCount('id_pengajuan');
        $builder->where('status_pengajuan','Pengajuan');
        return $builder->get();
    }
}
