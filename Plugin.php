<?php namespace Shohabbos\Multiwallet;


use \App;
use \Event;
use \System\Classes\PluginBase;
use \Illuminate\Foundation\AliasLoader;

use \Rainlab\User\Models\User;
use \Shohabbos\Multiwallet\Models\Balance;

use \Denpa\Bitcoin\Facades\Bitcoind;
use \Denpa\Bitcoin\Providers\ServiceProvider;


class Plugin extends PluginBase
{

    public $require = ['RainLab.User'];

    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function register()
    {
        $this->registerConsoleCommand('shohabbos.rbcupdatebalance', 'Shohabbos\Multiwallet\Console\RbcUpdateBalance');
    }

    public function boot() {

    	// register bitcoin service provider
    	App::register(ServiceProvider::class);

    	// Register alias
    	$alias = AliasLoader::getInstance();
   	    $alias->alias('Bitcoind', Bitcoind::class);


        User::extend(function($model) {
            $model->hasMany['balances'] = Balance::class;

            $model->addDynamicMethod('getBalance', function($currency = 'rbc') use ($model) {
                $balance = $model->balances()->where('currency', $currency)->first();

                if (!$balance) {
                    $balance = new Balance([
                        'currency' => $currency,
                        'wallet' => $currency->getAddress($model->id)
                    ]);
                    $model->balances()->add($balance);
                }

                return $balance;
            });
        });


        // get balance or generate wallets
        Event::listen('rainlab.user.login', function($user) {
            $user->getBalance();
        });

    }



}
