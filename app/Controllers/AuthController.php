<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class AuthController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UsersModel();
    }
    public function login()
    {
        $data = [
            'title' => 'Login',
        ];

        if (session()->get('user')) {
            return redirect()->to('/dashboard');
        }
        return view('auth/login', $data); // Menampilkan halaman login
    }

    public function processLogin()
    {
        $validation = \Config\Services::validation();
        // Set validation rules
        $validation->setRules([
            'username' => 'required',
            'password' => 'required|min_length[6]',
        ]);

        // validation
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getVar('password');

        $user = $this->userModel->where('username', $username)->first();
        if ($user) { // Mengecek apakah pengguna ditemukan
            // Validasi password menggunakan password_verify
            if (password_verify($password, $user['password'])) {
                $userData = [
                    'user' => [
                        'id' => $user['id'],
                        'nama' => $user['nama'],
                        'username' => $user['username'],
                        'role' => $user['role'],
                    ],
                ];

                session()->set($userData);
                return redirect()->to('/dashboard');
            } else {
                return redirect()->back()->withInput()->with('error', 'Password salah.');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Username tidak ditemukan.');
        }
    }

    public function logout()
    {
        session()->destroy(); // Hapus data session
        return redirect()->to('/login');
    }
}
