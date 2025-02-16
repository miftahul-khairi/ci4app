<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    // public array $user = [
    //     'photo' => 'uploaded[photo]|max_size[photo,1024]|is_image[photo]',
    //     'full_name' => 'required|min_length[3]|max_length[255]',
    //     'front_title' => 'required|min_length[2]|max_length[50]',
    //     'back_title' => 'required|min_length[2]|max_length[50]',
    //     'nip' => 'permit_empty|numeric|exact_length[18]',
    //     'nik' => 'required|numeric|exact_length[16]',
    //     'gender' => 'required|in_list[male,female]',
    //     'address' => 'permit_empty|max_length[255]',
    //     'email' => 'required|valid_email|max_length[255]',
    //     'password' => 'required|min_length[8]',
    //     'level' => 'required|in_list[admin,user]',
    // ];
}
