<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_admin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';

    public function view_data()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('admin');
		$builder->select('admin.id_admin, admin.nama_admin, status_admin, jabatan.nama_jabatan');
		$builder->join('jabatan', 'jabatan.id_jabatan = admin.id_jabatan');
        return $builder->get();
    }

    public function add_data($data)
    {
        $query = $this->db->table('admin')->insert($data);
        return $query;
    }

    public function detail_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('admin');
		$builder->select('admin.id_admin, admin.nama_admin, admin.username_admin, admin.no_telp_admin, admin.status_admin, admin.foto_resmi_admin, jabatan.id_jabatan, jabatan.nama_jabatan');
		$builder->join('jabatan', 'jabatan.id_jabatan = admin.id_jabatan');
        $builder->where('id_admin', $id);
        return $builder->get();
    }

    public function update_data($data, $id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('admin');
        $builder->where('id_admin', $id);
        $builder->set($data);
        return $builder->update();
    }

    public function delete_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('admin');
        $builder->where('id_admin', $id);
        return $builder->delete();
    }

    public function cek_username($username)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('admin');
        $builder->select('id_admin');
        $builder->where('username_admin', $username);
        return $builder->get();
    }

    public function cek_foreign($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('admin');
        $builder->join('admin', 'admin.id_admin = admin.id_admin');
        $builder->where('admin.id_admin', $id);
        return $builder->countAllResults();
    }

    public function data_jabatan()
    {
    	$db      = \Config\Database::connect();
        $builder = $db->table('jabatan');
        return $builder->get();
    }
}