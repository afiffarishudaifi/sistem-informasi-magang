<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_sekolah extends Model
{
    protected $table = 'sekolah';
    protected $primaryKey = 'id_sekolah';

    public function view_data()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sekolah');
        $builder->select('sekolah.id_sekolah, sekolah.nama_sekolah, sekolah.alamat_sekolah, sekolah.no_telp_sekolah');
        return $builder->get();
    }

    public function add_data($data)
    {
        $query = $this->db->table('sekolah')->insert($data);
        return $query;
    }

    public function detail_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sekolah');
        $builder->where('id_sekolah', $id);
        return $builder->get();
    }

    public function update_data($data, $id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sekolah');
        $builder->where('id_sekolah', $id);
        $builder->set($data);
        return $builder->update();
    }

    public function delete_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sekolah');
        $builder->where('id_sekolah', $id);
        return $builder->delete();
    }

    public function cek_username($username)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sekolah');
        $builder->select('id_sekolah');
        $builder->where('username_sekolah', $username);
        return $builder->get();
    }

    public function cek_foreign($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sekolah');
        $builder->join('admin', 'admin.id_sekolah = sekolah.id_sekolah');
        $builder->where('sekolah.id_sekolah', $id);
        return $builder->countAllResults();
    }
}
