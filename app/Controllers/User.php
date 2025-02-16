<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class User extends Controller
{
    public function profile()
    {
        $userModel = new UserModel();
        $user = $userModel->getUserByEmail(session()->get('email'));


        return view('user/user_profile', [
            'user' => $user,
        ]);
    }
}
