<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'password', 'level', 'photo', 'nama_lengkap', 'gelar_depan',
        'gelar_belakang', 'nip', 'nik', 'jenis_kelamin', 'alamat', 'email'
    ];

    public function getUserByEmail(string $email): ?array
    {
        return $this->where('email', $email)->first();
    }
}
