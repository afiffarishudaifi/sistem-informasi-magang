<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_dashboard_sekolah extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';

    public function total_peserta_aktif($id)
    {
    	$db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->selectCount('id_siswa');
        $builder->where('status','Aktif');
        $builder->join('sekolah','siswa.id_sekolah = sekolah.id_sekolah');
        $builder->where('sekolah.id_sekolah', $id);
        return $builder->get();
    }

    public function total_peserta_tidak_aktif($id)
    {
    	$db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->selectCount('id_siswa');
        $builder->where('status','Tidak Aktif');
        $builder->join('sekolah','siswa.id_sekolah = sekolah.id_sekolah');
        $builder->where('sekolah.id_sekolah', $id);
        return $builder->get();
    }

    public function total_pengajuan($id)
    {
    	$db      = \Config\Database::connect();
        $builder = $db->table('pengajuan_magang');
        $builder->selectCount('id_pengajuan');
        $builder->where('status_pengajuan','Pengajuan');
        $builder->join('siswa', 'pengajuan_magang.id_siswa = siswa.id_siswa');
        $builder->join('sekolah','siswa.id_sekolah = sekolah.id_sekolah');
        $builder->where('sekolah.id_sekolah', $id);
        return $builder->get();
    }
}
