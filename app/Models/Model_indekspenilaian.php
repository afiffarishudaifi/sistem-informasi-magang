<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_indekspenilaian extends Model
{
    protected $table = 'indeks_penilaian';
    protected $primaryKey = 'id_indeks';

    public function view_data()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('indeks_penilaian');
        return $builder->get();
    }

    public function add_data($data)
    {
        $query = $this->db->table('indeks_penilaian')->insert($data);
        return $query;
    }

    public function detail_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('indeks_penilaian');
        $builder->where('id_indeks', $id);
        return $builder->get();
    }

    public function update_data($data, $id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('indeks_penilaian');
        $builder->where('id_indeks', $id);
        $builder->set($data);
        return $builder->update();
    }

    public function delete_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('indeks_penilaian');
        $builder->where('id_indeks', $id);
        return $builder->delete();
    }
}
