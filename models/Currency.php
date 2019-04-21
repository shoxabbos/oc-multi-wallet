<?php namespace Shohabbos\Multiwallet\Models;

use Model;

/**
 * Model
 */
class Currency extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'shohabbos_multiwallet_currencies';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $hasMany = [
        'balances' => Balance::class
    ];


    public function getAddress($account) {
        if ($this->key == 'rbc') {
            return bitcoind()->getnewaddress('rubcoin-web-'.$account)->get();
        }

        return null;
    }

}
