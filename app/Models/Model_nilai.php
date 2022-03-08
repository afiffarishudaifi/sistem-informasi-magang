<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_nilai extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'id_nilai';

    public function view_data()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('nilai');
        $builder->select('nilai.id_nilai, siswa.id_siswa, siswa.nama_siswa, nilai.kedisiplinan, nilai.tanggung_jawab, nilai.kerja_sama, nilai.kerajinan, nilai.inisiatif, nilai.jumlah, nilai.rata_rata');
        $builder->join('siswa', 'nilai.id_siswa = siswa.id_siswa');
        $builder->where('siswa.status', 'Aktif');
        return $builder->get();
    }

    public function add_data($data)
    {
        $query = $this->db->table('nilai')->insert($data);
        return $query;
    }

    public function detail_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('nilai');
        $builder->select('nilai.id_nilai, siswa.id_siswa, siswa.nama_siswa, nilai.kedisiplinan, nilai.tanggung_jawab, nilai.kerja_sama, nilai.kerajinan, nilai.inisiatif, nilai.jumlah, nilai.rata_rata');
        $builder->join('siswa', 'nilai.id_siswa = siswa.id_siswa');
        $builder->where('id_nilai', $id);
        return $builder->get();
    }

    public function update_data($data, $id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('nilai');
        $builder->where('id_nilai', $id);
        $builder->set($data);
        return $builder->update();
    }

    public function delete_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('nilai');
        $builder->where('id_nilai', $id);
        return $builder->delete();
    }

    public function cek_foreign($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('nilai');
        $builder->join('siswa', 'nilai.id_siswa = siswa.id_siswa');
        $builder->join('sertifikat', 'nilai.id_sertifikat = sertifikat.id_sertifikat');
        $builder->where('nilai.id_nilai', $id);
        return $builder->countAllResults();
    }

    public function data_siswa()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        return $builder->get();
    }

    public function data_sertifikat()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sertifikat');
        return $builder->get();
    }
}
