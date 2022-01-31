<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_profil extends Model
{
    protected $table = 'profil';
    protected $primaryKey = 'id';

    public function view_data()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('profil');
        return $builder->get();
    }

    public function add_data($data)
    {
        $query = $this->db->table('profil')->insert($data);
        return $query;
    }

    public function detail_data()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('profil');
        $builder->where('id', 1);
        return $builder->get();
    }

    public function update_data($data, $id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('profil');
        $builder->where('id', $id);
        $builder->set($data);
        return $builder->update();
    }
}