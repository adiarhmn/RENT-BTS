<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RoleModel;
use App\Models\UsersModel;

class Users extends BaseController
{
    protected $User;
    protected $Role;
    public function __construct()
    {
        $this->User = new UsersModel();
        $this->Role = new RoleModel();
    }

    public function index()
    {
        $data = [
            'page'  => 'user',
            'list_user' => $this->User->getData(),
            'list_role' => $this->Role->getData(),
        ];
        return view('_users/indexUser', $data);
    }

    public function create()
    {
        $data = [
            'page'  => 'user',
            'form'  => 'tambah',
            'list_role' => $this->Role->getData(),
        ];

        return view('_users/formUser', $data);
    }

    public function store()
    {
        // Mendefenisikan Rule Validasi
        $rules = [
            'nama_lengkap' => [
                'rules'     => 'required|min_length[10]|max_length[50]|alpha_space',
                'errors'    => []
            ],
            'alamat' => [
                'rules'     => 'required|min_length[10]|max_length[200]',
                'errors'    => []
            ],
            'email' => [
                'rules'     => 'required|is_unique[tb_users.email]|valid_email',
                'errors'    => []
            ],
            'no_hp' => [
                'rules'     => 'required|min_length[10]|max_length[15]|numeric',
                'errors'    => []
            ],
            'password' => [
                'rules'     => 'required|min_length[8]|max_length[200]',
                'errors'    => []
            ],
            'id_role' => [
                'rules'     => 'required|numeric',
                'errors'    => []
            ],
            'photo_profile' => [
                'rules'     => 'permit_empty|is_image[photo_profile]|max_size[photo_profile,2048]|mime_in[photo_profile,image/jpg,image/jpeg,image/png]',
                'errors'    => []
            ]
        ];
        // Pengecekan Validasi Rule
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $validData = $this->validator->getValidated();
        $valid_Image = $this->request->getFile('photo_profile');

        if ($valid_Image->getName() != null) {
            $new_name_file = $valid_Image->getRandomName(); // Merubah Nama File

            $validData['photo_profile'] = $new_name_file;

            $valid_Image->move('profile_images', $new_name_file);
        } else {
            $validData['photo_profile'] = "default_images.jpeg";
        }

        $result = $this->User->storeUser($validData);

        if ($result) {
            return redirect()->to('/user')->with('message', "{$validData['nama_lengkap']} Berhasil Ditambahkan ");
        }
    }


    public function edit($id)
    {
        $user = $this->User->getData($id);
        $data = [
            'page' => 'user',
            'form'  => 'update',
            'user' => $user,
            'list_role' => $this->Role->getData($user['id_role'], "edit"),
        ];

        return view('_users/formUser', $data);
    }

    public function update($id)
    {
        $userData = $this->User->getData($id);
        $rules = [
            'nama_lengkap' => [
                'rules'     => 'required|min_length[10]|max_length[50]|alpha_space',
                'errors'    => []
            ],
            'alamat' => [
                'rules'     => 'required|min_length[10]|max_length[200]',
                'errors'    => []
            ],
            'email' => [
                'rules'     => "required|is_unique[tb_users.email,email,{$userData['email']}]|valid_email",
                'errors'    => []
            ],
            'no_hp' => [
                'rules'     => "required|is_unique[tb_users.no_hp,no_hp,{$userData['no_hp']}]|min_length[10]|max_length[13]|numeric",
                'errors'    => []
            ],
            'password' => [
                'rules'     => 'permit_empty|min_length[8]|max_length[200]',
                'errors'    => []
            ],
            'id_role' => [
                'rules'     => 'required|numeric',
                'errors'    => []
            ],
            'photo_profile' => [
                'rules'     => 'permit_empty|is_image[photo_profile]|max_size[photo_profile,2048]|mime_in[photo_profile,image/jpg,image/jpeg,image/png]',
                'errors'    => []
            ]
        ];

        // Pengecekan Validasi Rule
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $validData = $this->validator->getValidated();

        if($validData['password'] == null){
            $validData['password'] = $userData['password'];
        }else{
            $validData['password'] = password_hash($validData['password'], PASSWORD_DEFAULT);
        }

        $valid_Image = $this->request->getFile('photo_profile');
        
        if ($valid_Image->getName() != null || $valid_Image->getError() != 4) {

            $new_name_file = $valid_Image->getRandomName();
            $validData['photo_profile'] = $new_name_file;
            $valid_Image->move('profile_images', $new_name_file);

            if ($userData['photo_profile'] != 'default_images.jpeg') {
                unlink("profile_images/" . $userData['photo_profile']);
            }
        } else {
            $validData['photo_profile'] = $userData['photo_profile'];
        }

        $result = $this->User->saveData($validData, $id);
        if ($result) {
            return redirect()->to('/user')->with('message', "{$validData['nama_lengkap']} Berhasil DiUpdate");
        }

    }

    public function destroy($id){
        $userData = $this->User->getData($id);
        if($userData != null){
            $this->User->delete($id);
            if($userData['photo_profile'] != 'default_images.jpeg'){
                unlink("profile_images/".$userData['photo_profile']);
            }
        }
        
        return redirect()->to('/user')->with('message', 'Data User Berhasil Dihapus');
    }
}
