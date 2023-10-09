<?php

namespace App\Models;

use CodeIgniter\Model;

class UkuranModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_ukuran';
    protected $primaryKey       = 'id_ukuran';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ukuran',
        'stok',
        'id_busana'
    ];

    // Dates
    protected $useTimestamps = false;
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


    public function getData($id_busana = false)
    {
    
        if ($id_busana) {
            return $this->where('id_busana', $id_busana)->findAll();
        }

        return $this->select('id_busana, COUNT(*) as ukuranTersedia, SUM(stok) as jumlahBusana')->groupBy('id_busana')->findAll();
    }

    public function validUkuran($ukuran, $idBusana)
    {
        $result = $this->where('ukuran =', $ukuran)->where('id_busana =', $idBusana)->first();

        if ($result == null) {
            return "";
        }
        return "|is_unique[tb_ukuran.ukuran]";
    }

    public function storeData($validData, $id){
        $this->save([
            'id_busana' => $id,
            'stok'      => $validData['stok'],
            'ukuran'      => $validData['ukuran'],
        ]);

        return true;
    }
}
