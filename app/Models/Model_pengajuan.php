<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_pengajuan extends Model
{
    protected $table = 'pengajuan_magang';
    protected $primaryKey = 'id_pengajuan';

    public function view_data()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pengajuan_magang');
        $builder->select('pengajuan_magang.id_pengajuan, siswa.id_siswa, siswa.nama_siswa, pengajuan_magang.waktu_mulai, pengajuan_magang.waktu_selesai, pengajuan_magang.status_pengajuan, pengajuan_magang.pengantar, pengajuan_magang.proposal');
        $builder->join('siswa', 'pengajuan_magang.id_siswa = siswa.id_siswa');
        return $builder->get();
    }

    public function detail_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pengajuan_magang');
        $builder->select('pengajuan_magang.id_pengajuan, siswa.id_siswa, siswa.nama_siswa, pengajuan_magang.waktu_mulai, pengajuan_magang.waktu_selesai, pengajuan_magang.status_pengajuan, pengajuan_magang.pengantar, pengajuan_magang.proposal');
        $builder->join('siswa', 'pengajuan_magang.id_siswa = siswa.id_siswa');
        $builder->where('id_pengajuan', $id);
        return $builder->get();
    }

    public function update_data($data, $id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pengajuan_magang');
        $builder->where('id_pengajuan', $id);
        $builder->set($data);
        return $builder->update();
    }

    public function delete_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pengajuan_magang');
        $builder->where('id_pengajuan', $id);
        return $builder->delete();
    }

    public function cek_foreign($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pengajuan_magang');
        $builder->join('siswa', 'pengajuan_magang.id_siswa = siswa.id_siswa');
        $builder->join('admin', 'pengajuan_magang.id_admin = admin.id_admin');
        $builder->where('pengajuan_magang.id_pengajuan', $id);
        return $builder->countAllResults();
    }

    public function data_siswa()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        return $builder->get();
    }
}
