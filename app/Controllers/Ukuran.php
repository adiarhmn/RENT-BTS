<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UkuranModel;

class Ukuran extends BaseController
{

    protected $Ukuran;
    public function __construct()
    {
        $this->Ukuran = new UkuranModel();
    }
    public function index()
    {
        //
    }

    public function store($id)
    {
        $ukuran = $this->request->getVar('ukuran');
        $validUkuran = $this->Ukuran->validUkuran($ukuran, $id);
        $rules = [
            'ukuran' => [
                'rules'     => "required|alpha|in_list[XXS,XS,S,M,L,XL,XXL]{$validUkuran}",
                'errors'    => [],
            ],
            'stok'  => [
                'rules'     => "required|numeric|greater_than_equal_to[1]",
                'errors'    => [],
            ]
        ];

        // Pengecekan Validasi Rule
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $validData = $this->validator->getValidated();
        $result = $this->Ukuran->storeData($validData, $id);

        if($result){
            return redirect()->back()->with('message', 'Berhasil Menambahkan Ukuran');
        }
        
    }
    
    public function delete($id){
        $this->Ukuran->delete($id);
        return redirect()->back()->with('message', 'Data Berhasil Dihapus');
    }
}
