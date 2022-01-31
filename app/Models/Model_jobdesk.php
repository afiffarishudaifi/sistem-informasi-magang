<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_jobdesk extends Model
{
    protected $table = 'jobdesk';
    protected $primaryKey = 'id_jobdesk';

    public function view_data()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jobdesk');
        $builder->select('jobdesk.id_jobdesk, siswa.nama_siswa, jobdesk.nama_jobdesk, jobdesk.deskripsi, 
        jobdesk.waktu_mulai, jobdesk.waktu_selesai, jobdesk.status_jobdesk');
        $builder->join('siswa', 'jobdesk.id_siswa = siswa.id_siswa');
        return $builder->get();
    }

    public function add_data($data)
    {
        $query = $this->db->table('jobdesk')->insert($data);
        return $query;
    }

    public function detail_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jobdesk');
        $builder->select('jobdesk.id_jobdesk, jobdesk.nama_jobdesk, jobdesk.deskripsi, 
        jobdesk.waktu_mulai, jobdesk.waktu_selesai, jobdesk.status_jobdesk, siswa.id_siswa, siswa.nama_siswa');
        $builder->join('siswa', 'jobdesk.id_siswa = siswa.id_siswa');
        $builder->where('id_jobdesk', $id);
        return $builder->get();
    }

    public function update_data($data, $id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jobdesk');
        $builder->where('id_jobdesk', $id);
        $builder->set($data);
        return $builder->update();
    }

    public function delete_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jobdesk');
        $builder->where('id_jobdesk', $id);
        return $builder->delete();
    }

    public function cek_foreign($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jobdesk');
        $builder->join('siswa', 'jobdesk.id_siswa = siswa.id_siswa');
        $builder->where('jobdesk.id_jobdesk', $id);
        return $builder->countAllResults();
    }

    public function data_siswa()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        return $builder->get();
    }
}
