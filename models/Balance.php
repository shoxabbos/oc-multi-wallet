<?php namespace Shohabbos\Multiwallet\Models;

use Model;
use RainLab\User\Models\User;

/**
 * Model
 */
class Balance extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'shohabbos_multiwallet_balances';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'user' => User::class
    ];

    public $guarded = ['id'];
    
}
