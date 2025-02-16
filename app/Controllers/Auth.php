<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function loginForm(): string
    {
        return view('auth/login');
    }

    public function login(): \CodeIgniter\HTTP\ResponseInterface
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $model->where('email', $email)->first();

        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id' => $data['id'],
                    'email' => $data['email'],
                    'level' => $data['level'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return $this->response->setJSON(['status' => 'success', 'redirect' => base_url($data['level'] . '/profile')]);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Wrong Password']);
            }
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Email not Found']);
        }
    }

    public function logout(): \CodeIgniter\HTTP\RedirectResponse
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
}
