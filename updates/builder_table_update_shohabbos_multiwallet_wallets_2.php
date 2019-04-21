<?php namespace Shohabbos\Multiwallet\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateShohabbosMultiwalletWallets2 extends Migration
{
    public function up()
    {
        Schema::table('shohabbos_multiwallet_wallets', function($table)
        {
            $table->integer('user_id');
        });
    }
    
    public function down()
    {
        Schema::table('shohabbos_multiwallet_wallets', function($table)
        {
            $table->dropColumn('user_id');
        });
    }
}
