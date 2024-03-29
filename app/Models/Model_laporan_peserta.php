<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_laporan_peserta extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';

    public function view_data()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
		$builder->select('siswa.id_siswa, nama_siswa, alamat_siswa, no_telp_siswa, status, jurusan, nama_sekolah, waktu_mulai, waktu_selesai');
		$builder->join('sekolah','sekolah.id_sekolah = siswa.id_sekolah');
		$builder->join('pengajuan_magang','pengajuan_magang.id_siswa = siswa.id_siswa','left');
        return $builder->get();
    }

    public function view_data_sekolah($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->select('siswa.id_siswa, nama_siswa, alamat_siswa, no_telp_siswa, status, jurusan, nama_sekolah, waktu_mulai, waktu_selesai');
        $builder->join('sekolah','sekolah.id_sekolah = siswa.id_sekolah');
        $builder->join('pengajuan_magang','pengajuan_magang.id_siswa = siswa.id_siswa','left');
        $builder->where('sekolah.id_sekolah', $id);
        return $builder->get();
    }

    public function data_siswa()
    {
    	$db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->select('id_siswa, nama_siswa');
        return $builder->get();
    }

    public function view_data_sudah($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('absen');
        $builder->where('id_siswa', $id);
        $builder->where('date(waktu_absen)', date('Y-m-d'));
        return $builder->countAllResults();
    }

    public function filter($param)
    {
    	$db      = \Config\Database::connect();
        $builder = $db->table('siswa');
		$builder->select("siswa.id_siswa, nama_siswa, alamat_siswa, no_telp_siswa, status, jurusan, nama_sekolah, DATE_FORMAT(waktu_mulai, '%d-%m-%Y') as waktu_mulai, DATE_FORMAT(waktu_selesai, '%d-%m-%Y') as waktu_selesai");
		$builder->join('sekolah','sekolah.id_sekolah = siswa.id_sekolah');
		$builder->join('pengajuan_magang','pengajuan_magang.id_siswa = siswa.id_siswa','left');
        if ($param['cek_waktu1']) $builder->where('waktu_mulai >= ', $param['cek_waktu1']);
        if ($param['cek_waktu2']) $builder->where('waktu_mulai <= ', $param['cek_waktu2']);
        if ($param['status']) $builder->where('status', $param['status']);
        
        return $builder->get();
    }

    public function filter_sekolah($param)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->select("siswa.id_siswa, nama_siswa, alamat_siswa, no_telp_siswa, status, jurusan, nama_sekolah, DATE_FORMAT(waktu_mulai, '%d-%m-%Y') as waktu_mulai, DATE_FORMAT(waktu_selesai, '%d-%m-%Y') as waktu_selesai");
        $builder->join('sekolah','sekolah.id_sekolah = siswa.id_sekolah');
        $builder->where('sekolah.id_sekolah', $param['id_sekolah']);
        $builder->join('pengajuan_magang','pengajuan_magang.id_siswa = siswa.id_siswa','left');
        if ($param['cek_waktu1']) $builder->where('waktu_mulai >= ', $param['cek_waktu1']);
        if ($param['cek_waktu2']) $builder->where('waktu_mulai <= ', $param['cek_waktu2']);
        if ($param['status']) $builder->where('status', $param['status']);
        
        return $builder->get();
    }
}
