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
        $builder->select('jobdesk.id_jobdesk, jobdesk.nama_jobdesk, jobdesk.deskripsi, jobdesk.waktu_mulai, jobdesk.waktu_selesai, jobdesk.status_jobdesk, siswa.nama_siswa');
        $builder->join('siswa', 'jobdesk.id_siswa = siswa.id_siswa');
        return $builder->get();
    }

    public function view_data_sekolah($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jobdesk');
        $builder->select('jobdesk.id_jobdesk, jobdesk.nama_jobdesk, jobdesk.deskripsi, jobdesk.waktu_mulai, jobdesk.waktu_selesai, jobdesk.status_jobdesk, siswa.nama_siswa');
        $builder->where('siswa.id_sekolah', $id);
        $builder->join('siswa', 'jobdesk.id_siswa = siswa.id_siswa');
        return $builder->get();
    }

    public function view_data_siswa($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jobdesk');
        $builder->select('jobdesk.id_jobdesk, jobdesk.nama_jobdesk, jobdesk.deskripsi, jobdesk.waktu_mulai, jobdesk.waktu_selesai, jobdesk.status_jobdesk, siswa.nama_siswa');
        $builder->where('siswa.id_siswa', $id);
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
        $builder->select("jobdesk.id_jobdesk, jobdesk.nama_jobdesk, jobdesk.deskripsi, DATE_FORMAT(jobdesk.waktu_mulai, '%Y-%m-%dT%H:%i') as waktu_mulai, DATE_FORMAT(jobdesk.waktu_selesai, '%Y-%m-%dT%H:%i') as waktu_selesai, jobdesk.status_jobdesk, siswa.id_siswa, siswa.nama_siswa");
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

    public function view_jobdesk()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jobdesk');
        $builder->select('jobdesk.id_jobdesk, jobdesk.nama_jobdesk, jobdesk.deskripsi, jobdesk.waktu_mulai, jobdesk.waktu_selesai, jobdesk.status_jobdesk, siswa.nama_siswa');
        $builder->join('siswa', 'jobdesk.id_siswa = siswa.id_siswa');
        $builder->where('siswa.status', 'Aktif');
        return $builder->get();
    }

    public function filter($param)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jobdesk');
        $builder->select('jobdesk.id_jobdesk, nama_siswa, DATE_FORMAT(waktu_mulai, "%d %m %Y") as waktu_mulai, DATE_FORMAT(waktu_selesai, , "%d %m %Y") as waktu_selesai, status_jobdesk, nama_jobdesk, deskripsi');
        $builder->join('siswa', 'siswa.id_siswa = jobdesk.id_siswa');
        if ($param['cek_waktu1']) $builder->where('waktu_mulai >= ', $param['cek_waktu1']);
        if ($param['cek_waktu2']) $builder->where('waktu_mulai <= ', $param['cek_waktu2']);
        return $builder->get();
    }

    public function peserta_filter($param)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jobdesk');
        $builder->select('jobdesk.id_jobdesk, nama_siswa, DATE_FORMAT(waktu_mulai, "%d %m %Y") as waktu_mulai, DATE_FORMAT(waktu_selesai, , "%d %m %Y") as waktu_selesai, status_jobdesk, nama_jobdesk, deskripsi');
        $builder->join('siswa', 'siswa.id_siswa = jobdesk.id_siswa');
        $builder->where('jobdesk.id_siswa', $param['id_siswa']);
        if ($param['cek_waktu1']) $builder->where('waktu_mulai >= ', $param['cek_waktu1']);
        if ($param['cek_waktu2']) $builder->where('waktu_mulai <= ', $param['cek_waktu2']);
        return $builder->get();
    }

    public function filter_sekolah($param)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jobdesk');
        $builder->select('jobdesk.id_jobdesk, nama_siswa, DATE_FORMAT(waktu_mulai, "%d %m %Y") as waktu_mulai, DATE_FORMAT(waktu_selesai, , "%d %m %Y") as waktu_selesai, status_jobdesk, nama_jobdesk, deskripsi');
        $builder->join('siswa', 'siswa.id_siswa = jobdesk.id_siswa');
        $builder->where('siswa.id_sekolah', $param['id_sekolah']);
        if ($param['cek_waktu1']) $builder->where('waktu_mulai >= ', $param['cek_waktu1']);
        if ($param['cek_waktu2']) $builder->where('waktu_mulai <= ', $param['cek_waktu2']);
        return $builder->get();
    }
}
