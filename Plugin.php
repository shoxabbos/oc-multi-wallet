<?php namespace Shohabbos\Multiwallet;


use \App;
use \Event;
use \System\Classes\PluginBase;
use \Illuminate\Foundation\AliasLoader;

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




        // generate unique btc wallet
        
        // Event::listen('rainlab.user.login', function($user) {
        //     if (empty($user->btc_address)) {
        //         $wallet = bitcoind()->getnewaddress('rubcoin-web-'.$user->id)->get();

        //         if ($wallet) {
        //             $user->btc_address = $wallet;
        //             $user->save();
        //         }
        //     }
        // });


    }

}
