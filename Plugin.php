<?php namespace Shohabbos\Multiwallet;


use \App;
use \Event;
use \System\Classes\PluginBase;
use \Illuminate\Foundation\AliasLoader;

use \Rainlab\User\Models\User;
use \Shohabbos\Multiwallet\Models\Currency;
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


    public function boot() {

    	// register bitcoin service provider
    	App::register(ServiceProvider::class);

    	// Register alias
    	$alias = AliasLoader::getInstance();
   	    $alias->alias('Bitcoind', Bitcoind::class);


        User::extend(function($model) {
            $model->addDynamicMethod('getBalance', function($currency = null) use ($model) {
                if ($currency) {
                    $currency = Currency::where('key', $currency)->first();
                } else {
                    $currency = Currency::where('is_default', 1)->first();
                }

                if (!$currency) {
                    return;
                }

                $balance = $currency->balances()->where('user_id', $model->id)->first();

                if (!$balance) {
                    $balance = new Balance([
                        'user_id' => $model->id,
                        'wallet' => $currency->getAddress($model->id)
                    ]);
                    $currency->balances()->add($balance);
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
