<?php namespace Shohabbos\Multiwallet\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateShohabbosMultiwalletBalances4 extends Migration
{
    public function up()
    {
        Schema::table('shohabbos_multiwallet_balances', function($table)
        {
            $table->string('currency', 3)->default('rbc');
            $table->dropColumn('currency_id');
        });
    }
    
    public function down()
    {
        Schema::table('shohabbos_multiwallet_balances', function($table)
        {
            $table->dropColumn('currency');
            $table->integer('currency_id');
        });
    }
}
