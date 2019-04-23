<?php namespace Shohabbos\Multiwallet\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateShohabbosMultiwalletBalances3 extends Migration
{
    public function up()
    {
        Schema::table('shohabbos_multiwallet_balances', function($table)
        {
            $table->decimal('balance', 10, 5)->change();
            $table->decimal('additional_balance', 10, 5)->change();
        });
    }
    
    public function down()
    {
        Schema::table('shohabbos_multiwallet_balances', function($table)
        {
            $table->decimal('balance', 10, 10)->change();
            $table->decimal('additional_balance', 10, 10)->change();
        });
    }
}
