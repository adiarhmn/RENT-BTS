<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_users';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_lengkap',
        'email',
        'password',
        'alamat',
        'no_hp',
        'photo_profile',
        'id_role'
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

    public function getData($id = false)
    {
        if (!$id) return $this->join('tb_role', 'tb_users.id_role = tb_role.id_role')->get()->getResultArray();

        return $this->where('id_user', $id)->join('tb_role', 'tb_users.id_role = tb_role.id_role')->first();
    }

    public function storeUser($validData)
    {
        $this->insert([
            'nama_lengkap' => $validData['nama_lengkap'],
            'email' => $validData['email'],
            'alamat' => $validData['alamat'],
            'no_hp' => $validData['no_hp'],
            'photo_profile' => $validData['photo_profile'],
            'password' => password_hash($validData['password'], PASSWORD_DEFAULT),
            'id_role' => $validData['id_role'],
        ]);

        return true;
    }

    public function saveData($validData, $id = "")
    {
        $this->save([
            'id_user' => $id,
            'nama_lengkap' => $validData['nama_lengkap'],
            'email' => $validData['email'],
            'alamat' => $validData['alamat'],
            'no_hp' => $validData['no_hp'],
            'photo_profile' => $validData['photo_profile'],
            'password' => $validData['password'],
            'id_role' => $validData['id_role'],
        ]);

        return true;
    }
}
