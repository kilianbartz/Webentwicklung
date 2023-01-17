<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
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
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    public $login = [
        'email' => 'required|valid_email',
        'password' => 'required',
        'agbs' => 'required'
    ];
    public $login_errors = [
        'email' => [
            'required' => 'Bitte tragen Sie eine E-Mail Adresse ein.',
            'valid_email' => 'Diese E-Mail Adresse ist ungültig!'
        ],
        'password' => [
            'required' => 'Zum Einloggen müssen Sie ein Passwort angeben!'
        ],'agbs' => [
            'required' => 'Um diese Webseite zu nutzen müssen Sie unseren AGBs zustimmen.'
        ],

    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
}
