<?php namespace Shohabbos\Multiwallet\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Currencies extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'manage_multiwallet_currencies' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Shohabbos.Multiwallet', 'multiwallet', 'multiwallet-currencies');
    }
}
