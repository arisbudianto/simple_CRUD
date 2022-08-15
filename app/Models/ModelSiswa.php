<?php namespace App\Models;
 
use CodeIgniter\Model;
$db = \Config\Database::connect();
$builder = $db->table('kelas');


class ModelSiswa extends Model
{
    protected $table = 'kelas';
 
    public function getSiswa()
    {
        return $this->orderBy('nilai', 'asc')->findAll();
    }

    public function pencarian($kunci) {
        return $this->table('kelas')->like('nama', $kunci);
    }
    
    public function get_data_siswa($id){
        $query = "CALL get_data_siswa($id)";
        $result = $this->db->query($query)->getRowArray();
        return $result;
    }

    public function get_nama_siswa($id_parameter){
        $query = "call get_data_siswa('$id_parameter')";
        $result = $this->db->query($query)->getRowArray();
        return $result;
    }
}

