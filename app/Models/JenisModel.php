<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_jenis_busana';
    protected $primaryKey       = 'id_jenis';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_jenis'];

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

    public function getData ($id = false, $notId = false){
        if(!$id && !$notId){
            return $this->findAll();
        }
        if(!$id && $notId){
            return $this->where('id_jenis !=', $notId)->findAll();
        }
        return $this->find($id);
    }

    public function storeJenis($validData, $id_jenis = false){
        if(!$id_jenis) $validData['id_jenis_busana'] = "";

        $this->save([
            'id_jenis_busana' => $id_jenis,
            'nama_jenis' => $validData['nama_jenis'],
        ]);

    return true;
    }
}
