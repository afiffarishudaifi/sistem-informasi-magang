<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_peserta extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';

    public function view_data()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
		$builder->select('siswa.id_siswa, siswa.nama_siswa, sekolah.nama_sekolah');
		$builder->join('sekolah', 'sekolah.id_sekolah = siswa.id_sekolah');
        return $builder->get();
    }

    public function add_data($data)
    {
        $query = $this->db->table('siswa')->insert($data);
        return $query;
    }

    public function detail_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
		$builder->select('siswa.id_siswa, siswa.nama_siswa, siswa.username_siswa, siswa.nomor_induk, siswa.email_siswa, siswa.no_telp_siswa, siswa.alamat_siswa, siswa.jurusan, siswa.status, siswa.foto_resmi, sekolah.id_sekolah, sekolah.nama_sekolah');
		$builder->join('sekolah', 'sekolah.id_sekolah = siswa.id_sekolah');
        $builder->where('id_siswa', $id);
        return $builder->get();
    }

    public function update_data($data, $id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->where('id_siswa', $id);
        $builder->set($data);
        return $builder->update();
    }

    public function delete_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->where('id_siswa', $id);
        return $builder->delete();
    }

    public function cek_username($username)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->select('id_siswa');
        $builder->where('username_siswa', $username);
        return $builder->get();
    }

    public function cek_nis($nis)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->select('id_siswa');
        $builder->where('nomor_induk', $nis);
        return $builder->get();
    }

    public function cek_foreign($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->join('admin', 'admin.id_siswa = siswa.id_siswa');
        $builder->where('siswa.id_siswa', $id);
        return $builder->countAllResults();
    }

    public function data_sekolah()
    {
    	$db      = \Config\Database::connect();
        $builder = $db->table('sekolah');
        $builder->select('id_sekolah, nama_sekolah');
        return $builder->get();
    }
}