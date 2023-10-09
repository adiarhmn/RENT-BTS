<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Authenticating extends BaseController
{
    protected $User;
    public function __construct()
    {
        $this->User = new UsersModel();
    }

    public function index()
    {
        return view('_auth/loginIndex');
    }

    public function auth()
    {
        $user = $this->User->where('email', $this->request->getVar('email'))->join('tb_role', 'tb_role.id_role=tb_users.id_role')->first();

        if ($user != null) {
            $data = [
                'nama_lengkap' => $user['nama_lengkap'],
                'no_hp' => $user['no_hp'],
                'alamat' => $user['alamat'],
                'photo_profile' => $user['photo_profile'],
                'role' => $user['role'],
                'email' => $user['email'],
            ];
            if (!password_verify($this->request->getVar('password'), $user['password'])) {
                return redirect()->to('/login')->withInput()->with('error', 'Password Salah !');
            } else {
                session()->set($data);
                return redirect()->to('/');
            }
        } else {
            return redirect()->to('/login')->withInput()->with('error', 'Email Tidak Sesuai !');
        }
    }


    // Method Register
    public function register()
    {
        return view('_auth/registerIndex');
    }

    public function store()
    {
        // Mendefenisikan Rule Validasi
        $rules = [
            'nama_lengkap' => [
                'rules'     => 'required|min_length[10]|max_length[50]|alpha_space',
                'errors'    => [
                    'required' => 'Nama Lengkap Harus Diisi !'
                ]
            ],
            'alamat' => [
                'rules'     => 'required|min_length[10]|max_length[200]',
                'errors'    => [
                    'required' => 'Alamat Harus Diisi !'
                ]
            ],
            'email' => [
                'rules'     => 'required|is_unique[tb_users.email]|valid_email',
                'errors'    => [
                    'required'    => 'Email Harus Diisi !',
                    'is_unique'   => 'Email Sudah Terdaftar ! Coba Yang Lain',
                    'valid_email' => 'Masukkan Email Dengan Benar !'
                ]
            ],
            'no_hp' => [
                'rules'     => 'required|min_length[12]|max_length[20]|numeric|is_unique[tb_users.no_hp]',
                'errors'    => []
            ],
            'password' => [
                'rules'     => 'required|min_length[8]|max_length[200]',
                'errors'    => []
            ],
            'confirm_password' => [
                'rules'     => 'matches[password]',
                'errors'    => []
            ],
            'photo_profile' => [
                'rules'     => 'permit_empty',
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

        // Sensitive Case
        $validData['id_role'] = 3;

        // Input Data User
        $result = $this->User->storeUser($validData);
        if ($result) {
            return redirect()->to(site_url('login'))->with('message', 'Registrasi Berhasil !');
        }
    }

    public function logout()
    {
        session()->remove('nama_lengkap');
        session()->remove('no_hp');
        session()->remove('alamat');
        session()->remove('photo_profile');
        session()->remove('role');
        session()->remove('email');

        return redirect()->to(site_url('login'));
    }
}
