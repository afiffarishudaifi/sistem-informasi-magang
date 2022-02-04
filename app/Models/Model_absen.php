<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_absen extends Model
{
    protected $table = 'absen';
    protected $primaryKey = 'id_absen';

    public function view_data()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('absen');
		$builder->select('absen.id_absen, absen.foto_absen, siswa.nama_siswa, absen.status_absen');
		$builder->join('siswa', 'siswa.id_siswa = absen.id_siswa');
        return $builder->get();
    }

    public function add_data($data)
    {
        $query = $this->db->table('absen')->insert($data);
        return $query;
    }

    public function detail_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('absen');
		$builder->select('absen.id_absen, absen.foto_absen, absen.waktu_absen, absen.status_absen, absen.keterangan, siswa.id_siswa, siswa.nama_siswa');
		$builder->join('siswa', 'siswa.id_siswa = absen.id_siswa');
        $builder->where('id_absen', $id);
        return $builder->get();
    }

    public function update_data($data, $id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('absen');
        $builder->where('id_absen', $id);
        $builder->set($data);
        return $builder->update();
    }

    public function delete_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('absen');
        $builder->where('id_absen', $id);
        return $builder->delete();
    }

    public function cek_foreign($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('absen');
        $builder->join('admin', 'admin.id_absen = absen.id_absen');
        $builder->where('absen.id_absen', $id);
        return $builder->countAllResults();
    }

    public function data_siswa()
    {
    	$db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->select('id_siswa, nama_siswa');
        return $builder->get();
    }
}