<?php

namespace App\Models;

use CodeIgniter\Model;

class BusanaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_busana';
    protected $primaryKey       = 'id_busana';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_busana',
        'deskripsi',
        'harga_sewa',
        'id_jenis',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getData($id = false, $update = false)
    {
        if (!$id) {
            return $this->select('tb_busana.*, nama_jenis, stok_query.stok, stok_query.jumlahUkuran, tb_photobusana.id_photoBusana, tb_photobusana.photo_busana')
                ->join('tb_jenis_busana', 'tb_busana.id_jenis = tb_jenis_busana.id_jenis')
                ->join('(SELECT id_busana, SUM(stok) as stok, COUNT(ukuran) as jumlahUkuran FROM tb_ukuran GROUP BY id_busana) stok_query', 'tb_busana.id_busana = stok_query.id_busana', 'left')
                ->join('(SELECT id_busana, MIN(id_photoBusana) as id_photoBusana, photo_busana FROM tb_photobusana GROUP BY id_busana) tb_photobusana', 'tb_busana.id_busana = tb_photobusana.id_busana', 'left')
                ->groupBy('tb_busana.id_busana')
                ->get()->getResultArray();
        }

        if($id && $update){
            return $this->find($id);
        }

        return $this->join('tb_jenis_busana', 'tb_busana.id_jenis = tb_jenis_busana.id_jenis')->find($id);
    }

    public function showBusana(){
        return $this->select('tb_busana.*, tb_photobusana.photo_busana as photo_busana')
                    ->join('tb_photobusana', 'tb_busana.id_busana = tb_photobusana.id_busana', 'left')
                    ->groupBy('tb_busana.id_busana')
                    ->get()
                    ->getResultArray();
    }

    
    public function saveData($validData, $id = ""){
        $this->save([
            'id_busana' => $id,
            'nama_busana' => $validData['nama_busana'],
            'deskripsi' => $validData['deskripsi'],
            'harga_sewa' => $validData['harga_sewa'],
            'id_jenis' => $validData['id_jenis'],
        ]);
    
        return true;
    }
}
