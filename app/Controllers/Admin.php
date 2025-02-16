<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Admin extends Controller
{

    // function profile() will load the view file app/Views/admin/admin_profile.php.
    public function profile(): string
    {
        $userModel = new UserModel();
        $user = $userModel->getUserByEmail(session()->get('email'));


        return view('admin/admin_profile', [
            'user' => $user,
        ]);
    }

// function profile() will load the view file app/Views/admin/admin_profile.php.
    public function addUserForm(): string
    {
        return view('admin/add_user');
    }

// function addUserForm() will load the view file app/Views/admin/add_user.php.

    /**
     * @throws \ReflectionException
     */
    public function addUser(): \CodeIgniter\HTTP\ResponseInterface
    {
        //        Log the form data for debugging
        //        log_message('info', 'Form data: ' . json_encode($this->request->getPost()));

        $validation = \Config\Services::validation();

        $validation->setRules([
            'photo' => 'uploaded[photo]|max_size[photo,1024]|is_image[photo]',
            'nama_lengkap' => 'required|min_length[3]|max_length[255]',
            'gelar_depan' => 'required|min_length[2]|max_length[50]',
            'gelar_belakang' => 'required|min_length[2]|max_length[50]',
            'nip' => 'permit_empty|numeric|exact_length[18]',
            'nik' => 'required|numeric|exact_length[16]',
            'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
            'alamat' => 'permit_empty|max_length[255]',
            'email' => 'required|valid_email|max_length[255]',
            'password' => 'required|min_length[8]',
            'level' => 'required|in_list[admin,user]',
        ]);

        // Log the jenis_kelamin value
        // log_message('info', 'Jenis Kelamin: ' . $this->request->getPost('jenis_kelamin'));

        if (!$validation->withRequest($this->request)->run()) {
            log_message('error', 'Validation failed: ' . json_encode($validation->getErrors()));
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $validation->getErrors(),
            ]);
        }

        $userModel = new UserModel();
        $data = [
            'photo' => $this->request->getFile('photo')->store(),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'gelar_depan' => $this->request->getPost('gelar_depan'),
            'gelar_belakang' => $this->request->getPost('gelar_belakang'),
            'nip' => $this->request->getPost('nip'),
            'nik' => $this->request->getPost('nik'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'level' => $this->request->getPost('level'),
        ];
// Log the data to be inserted
//        log_message('info', 'Data to be inserted: ' . json_encode($data));

        if (!$userModel->insert($data)) {
            log_message('error', 'Failed to insert user: ' . json_encode($userModel->errors()));
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $userModel->errors(),
            ]);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'User added successfully',
            'redirect' => base_url('admin/profile')
        ]);
    }
}
