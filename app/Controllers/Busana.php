<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BusanaModel;
use App\Models\FotoBusanaModel;
use App\Models\JenisModel;
use App\Models\UkuranModel;

class Busana extends BaseController
{
    protected $Busana;
    protected $Ukuran;
    protected $Jenis;
    protected $FotoBusana;
    public function __construct()
    {
        $this->Ukuran = new UkuranModel();
        $this->Busana = new BusanaModel();
        $this->FotoBusana = new FotoBusanaModel();
        $this->Jenis = new JenisModel();
    }
    public function index()
    {
        $data = [
            'page' => 'busana',
            'list_busana' => $this->Busana->getData(),
            'data_ukuran' => $this->Ukuran->getData(),
        ];
        return view('_busana/busanaIndex', $data);
    }

    public function detail($id)
    {
        $dataUkuran = $this->Ukuran->getData($id);
        $dataBusana = $this->Busana->getData($id);
        $dataPhoto  = $this->FotoBusana->getData($id);
        $dataJenis  = $this->Jenis->getData(false, $dataBusana['id_jenis']);
        $data = [
            'page'       => 'busana',
            'listUkuran' => $dataUkuran,
            'dataBusana' => $dataBusana,
            'photoBusana' => $dataPhoto,
            'listJenis'  => $dataJenis,
        ];
        return view('_busana/detailBusana', $data);
    }

    public function create()
    {
        $data = [
            'page'          => 'busana',
            'listJenis'     => $this->Jenis->getData(),
        ];
        return view('_busana/formBusana', $data);
    }

    public function store()
    {
        $rules = [
            'nama_busana' => [
                'rules'     => "required|is_unique[tb_busana.nama_busana]|alpha_numeric_space",
                'errors'    => [],
            ],
            'deskripsi'   => [
                'rules'     => "required|min_length[100]",
                'errors'    => [],
            ],
            'harga_sewa'  => [
                'rules'     => "required|numeric|greater_than_equal_to[0]",
                'errors'    => [],
            ],
            'id_jenis'    => [
                'rules'     => "required|numeric",
                'errors'    => [],
            ]

        ];

        // Pengecekan Validasi Rule
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $validData = $this->validator->getValidated();
        $result = $this->Busana->saveData($validData);
        if ($result) {
            return redirect()->to('/busana')->with('message', 'Data Busana Berhasil DiTambahkan');
        }
    }

    public function update($id)
    {
        // dd($this->request->getVar());
        $dataBusana = $this->Busana->getData($id, 'update');
        $rules = [
            'nama_busana' => [
                'rules'     => "required|is_unique[tb_busana.nama_busana,nama_busana,{$dataBusana['nama_busana']}]|alpha_numeric_space",
                'errors'    => [],
            ],
            'deskripsi'   => [
                'rules'     => "required",
                'errors'    => [],
            ],
            'harga_sewa'  => [
                'rules'     => "required|numeric|greater_than_equal_to[0]",
                'errors'    => [],
            ],
            'id_jenis'    => [
                'rules'     => "required|numeric",
                'errors'    => [],
            ]

        ];

        // Pengecekan Validasi Rule
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $validData = $this->validator->getValidated();
        $result = $this->Busana->saveData($validData, $dataBusana['id_busana']);
        if ($result) {
            return redirect()->back()->with('message', 'Data Busana Berhasil DiUpdate');
        }
    }

    public function delete($id)
    {
        $dataFoto = $this->FotoBusana->getData($id);
        foreach ($dataFoto as $item) {
            unlink("busanaImages/" . $item['photo_busana']);
        }
        return redirect()->to('/busana')->with('message', 'Data Busana Berhasil Dihapus');
    }
}
