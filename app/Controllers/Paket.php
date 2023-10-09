<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PaketModel;

class Paket extends BaseController
{
    protected $Paket;
    public function __construct(){
        $this->Paket = new PaketModel();
    }
    public function index()
    {
        $data = [
            'page' => 'paket',
            'list_paket' => $this->Paket->getData()
        ];

        // dd($data);
        return view('_paket/indexPaket', $data);
    }

    public function create(){
        $data = [
            'page'  => 'paket',
        ];
        return view('_paket/formPaket', $data);
    }

    public function store(){
        $rules = [
            'nama_paket' => [
                'rules'     => 'required|is_unique[tb_busana.nama_busana]|alpha_numeric_space',
                'errors'    => [],
            ],
            'deskripsi_paket'   => [
                'rules'     => "required",
                'errors'    => [],
            ],
            'harga_paket'  => [
                'rules'     => "required|numeric|greater_than_equal_to[0]",
                'errors'    => [],
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $validData = $this->validator->getValidated();
        
        $result = $this->Paket->saveData($validData);
        if($result){
            return redirect()->to('paket')->with('message', 'Data Berhasil DiTambah');
        }
    }
}
