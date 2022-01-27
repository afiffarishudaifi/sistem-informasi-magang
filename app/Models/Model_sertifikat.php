<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_sertifikat extends Model
{
    protected $table = 'sertifikat';
    protected $primaryKey = 'id_sertifikat';

    public function view_data()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sertifikat');
        return $builder->get();
    }

    public function add_data($data)
    {
        $query = $this->db->table('sertifikat')->insert($data);
        return $query;
    }

    public function detail_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sertifikat');
        $builder->where('id_sertifikat', $id);
        return $builder->get();
    }

    public function update_data($data, $id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sertifikat');
        $builder->where('id_sertifikat', $id);
        $builder->set($data);
        return $builder->update();
    }

    public function delete_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sertifikat');
        $builder->where('id_sertifikat', $id);
        return $builder->delete();
    }

    public function cek_foreign($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sertifikat');
        $builder->join('nilai', 'nilai.id_sertifikat = sertifikat.id_sertifikat');
        $builder->where('sertifikat.id_sertifikat', $id);
        return $builder->countAllResults();
    }
}