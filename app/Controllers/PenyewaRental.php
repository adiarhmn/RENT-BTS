<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BusanaModel;

class PenyewaRental extends BaseController
{

    protected $Busana;
    public function __construct()
    {
        $this->Busana = new BusanaModel();
    }

    public function index()
    {
        return view('_rent_store/mainRent');
    }

    public function dataBusana()
    {
        $data = [
            'page'        => 'busana',
            'list_busana' => $this->Busana->getData(),
        ];
        // dd($data);
        return view('_rent_store/dataBusana.php', $data);
    }
}
