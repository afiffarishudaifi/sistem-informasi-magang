<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_laporan_jobdesk extends Model
{
    protected $table = 'jobdesk';
    protected $primaryKey = 'id_jobdesk';

    public function filter($param)
    {
    	$db      = \Config\Database::connect();
        $builder = $db->table('jobdesk');
		$builder->select('jobdesk.id_jobdesk, nama_siswa, DATE_FORMAT(waktu_mulai, "%d %m %Y") as waktu_mulai, DATE_FORMAT(waktu_selesai, , "%d %m %Y") as waktu_selesai, status_jobdesk, nama_jobdesk, deskripsi');
		$builder->join('siswa','siswa.id_siswa = jobdesk.id_siswa');
        if ($param['cek_waktu1']) $builder->where('waktu_mulai >= ', $param['cek_waktu1']);
        if ($param['cek_waktu2']) $builder->where('waktu_mulai <= ', $param['cek_waktu2']);
        if ($param['status_jobdesk']) $builder->where('status_jobdesk', $param['status_jobdesk']);
        
        return $builder->get();
    }

    public function peserta_filter($param)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jobdesk');
		$builder->select('jobdesk.id_jobdesk, nama_siswa, DATE_FORMAT(waktu_mulai, "%d %m %Y") as waktu_mulai, DATE_FORMAT(waktu_selesai, , "%d %m %Y") as waktu_selesai, status_jobdesk, nama_jobdesk, deskripsi');
        $builder->join('siswa','siswa.id_siswa = jobdesk.id_siswa');
        $builder->where('jobdesk.id_siswa', $param['id_siswa']);
        if ($param['cek_waktu1']) $builder->where('waktu_mulai >= ', $param['cek_waktu1']);
        if ($param['cek_waktu2']) $builder->where('waktu_mulai <= ', $param['cek_waktu2']);
        if ($param['status_jobdesk']) $builder->where('status_jobdesk', $param['status_jobdesk']);
        
        return $builder->get();
    }
}