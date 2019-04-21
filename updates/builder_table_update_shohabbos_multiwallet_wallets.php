<?php namespace Shohabbos\Multiwallet\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateShohabbosMultiwalletWallets extends Migration
{
    public function up()
    {
        Schema::table('shohabbos_multiwallet_wallets', function($table)
        {
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('shohabbos_multiwallet_wallets', function($table)
        {
            $table->dropColumn('deleted_at');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
}
