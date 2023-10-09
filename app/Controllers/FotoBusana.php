<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FotoBusanaModel;

class FotoBusana extends BaseController
{
    protected $FTBusana;
    public function __construct()
    {
        $this->FTBusana = new FotoBusanaModel();
    }

    public function index()
    {
    }

    public function store($id)
    {
        $rules = [
            'photo_busana' => [
                'rules'     => 'uploaded[photo_busana]|is_image[photo_busana]|max_size[photo_busana,2048]|mime_in[photo_busana,image/jpg,image/jpeg,image/png]',
                'errors'    => []
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $validData = $this->validator->getValidated();
        $valid_Image = $this->request->getFile('photo_busana');

        if ($valid_Image->getError() != 4 || $valid_Image->getName() != null) {
            $newName = $valid_Image->getRandomName();
            $valid_Image->move('busanaImages', $newName);
        }

        $this->FTBusana->saveImages($newName, $this->request->getVar('id_busana'));

        return redirect()->back()->with('message', 'Foto Busana Berhasil Ditambahkan !');
    }
    
    public function delete ($id){
        $dataFoto = $this->FTBusana->find($id);
        
        if($dataFoto != null){
            $this->FTBusana->delete($id);
            unlink('busanaImages/'.$dataFoto['photo_busana']);
        }
        
        return redirect()->back()->with('message', 'Foto Busana Berhasil DiHapus !');
    }
}
