<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BusanaModel;
use App\Models\JenisModel;

class JenisBusana extends BaseController
{
    protected $Jenis;
    protected $Busana;

    public function __construct()
    {
        $this->Jenis = new JenisModel();
        $this->Busana = new BusanaModel();
    }

    public function index()
    {
        $data = [
            'page' => 'jenis',
            'form' => 'tambah',
            'list_jenis' => $this->Jenis->getData(),
        ];
        return view('_jenisBusana/indexJenis', $data);
    }

    public function edit($id)
    {
        $data = [
            'page' => 'jenis',
            'form' => 'update',
            'list_jenis' => $this->Jenis->getData(),
            'jenis' => $this->Jenis->getData($id),
        ];

        return view('_jenisBusana/indexJenis', $data);
    }

    public function store()
    {
        $rules = [
            'nama_jenis' => [
                'rules' => 'required|is_unique[tb_jenis_busana.nama_jenis]',
                'errors' => []
            ],
        ];

        // Pengecekan Validasi Rule
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $validData = $this->validator->getValidated();

        $storeJenis = $this->Jenis->storeJenis($validData);

        if ($storeJenis) {
            return redirect()->to('/jenis')->with('message', 'Berhasil Menambahkan Jenis Busan');
        }
    }

    public function update($id)
    {
        $Jenis_Busana = $this->Jenis->getData($id);
        $rules = [
            'nama_jenis' => [
                'rules' => "required|is_unique[tb_jenis_busana.nama_jenis,nama_jenis,{$Jenis_Busana['nama_jenis']}]",
                'errors' => []
            ],
        ];

        // Pengecekan Validasi Rule
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $validData = $this->validator->getValidated();

        $storeJenis = $this->Jenis->storeJenis($validData, $id);

        if ($storeJenis) {
            return redirect()->to('/jenis')->with('message', 'Jenis Busan Berhasi Di Update');
        }
    }
    
    public function delete ($id){
        $this->Jenis->delete($id);
        return redirect()->to('/jenis')->with('message', 'Jenis Busan Berhasi Di Hapus');
    }
}
