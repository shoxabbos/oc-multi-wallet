<?php namespace Shohabbos\Multiwallet\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateShohabbosMultiwalletBalances extends Migration
{
    public function up()
    {
        Schema::table('shohabbos_multiwallet_balances', function($table)
        {
            $table->string('wallet')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('shohabbos_multiwallet_balances', function($table)
        {
            $table->dropColumn('wallet');
        });
    }
}
