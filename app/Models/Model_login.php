<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_login extends Model
{
    protected $table= 'siswa';
    protected $primaryKey ='id_siswa';
    protected $useTimestamps = true;

    public function loginAdmin($username)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('admin');
        $builder->where('username_admin', $username);
        $builder->where('status_admin', 'Aktif');
        return $builder->get();
    }

    public function loginSiswa($username)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->where('username_siswa', $username);
        $builder->where('status', 'Aktif');
        return $builder->get();
    }

    public function loginSekolah($username)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sekolah');
        $query = $builder->where('username_sekolah', $username);
        return $query->get();
    }

    public function add_siswa($data)
    {
        $query = $this->db->table('siswa')->insert($data);
        return $query;
    }

    public function add_pengajuan($data)
    {
        $query = $this->db->table('pengajuan_magang')->insert($data);
        return $query;
    }

    public function data_sekolah()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sekolah');
        $builder->select('id_sekolah, nama_sekolah');
        return $builder->get();
    }

    public function data_siswa()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pengajuan_magang');
        $builder->select('pengajuan_magang.id_siswa');
        return $builder->get();
    }

    public function data_seleksi($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->select('id_siswa, nama_siswa');
        $builder->whereNotIn('id_siswa', $id);
        return $builder->get();
    }

}
