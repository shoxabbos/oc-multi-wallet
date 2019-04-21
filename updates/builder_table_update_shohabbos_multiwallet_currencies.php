<?php namespace Shohabbos\Multiwallet\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateShohabbosMultiwalletCurrencies extends Migration
{
    public function up()
    {
        Schema::rename('shohabbos_multiwallet_wallets', 'shohabbos_multiwallet_currencies');
        Schema::table('shohabbos_multiwallet_currencies', function($table)
        {
            $table->dropColumn('address');
            $table->dropColumn('balance');
            $table->dropColumn('user_id');
        });
    }
    
    public function down()
    {
        Schema::rename('shohabbos_multiwallet_currencies', 'shohabbos_multiwallet_wallets');
        Schema::table('shohabbos_multiwallet_wallets', function($table)
        {
            $table->string('address', 191)->nullable();
            $table->decimal('balance', 10, 10)->nullable();
            $table->integer('user_id');
        });
    }
}
