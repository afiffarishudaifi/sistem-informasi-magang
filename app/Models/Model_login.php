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

    public function addProfile($data)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        $query =  $builder->insert($data);
     
        return $query;
    }

}
