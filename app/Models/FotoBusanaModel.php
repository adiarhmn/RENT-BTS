<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoBusanaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_photobusana';
    protected $primaryKey       = 'id_photoBusana';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['photo_busana', 'id_busana'];

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

    public function getData($id = false)
    {
        if (!$id) {
            return $this->select('photo_busana, id_busana, MIN(id_photoBusana)')->groupBy('id_busana')->get()->getResultArray();
        }

        return $this->where('id_busana =', $id)->findAll();
    }

    public function saveImages($images = false, $id = false){
        if($images && $id){
            $this->save([
                'photo_busana' => $images,
                'id_busana'    => $id
            ]);
            return true;
        }
        return false;
    }
}
