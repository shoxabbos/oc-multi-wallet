<?php namespace Shohabbos\Multiwallet\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateShohabbosMultiwalletBalances2 extends Migration
{
    public function up()
    {
        Schema::table('shohabbos_multiwallet_balances', function($table)
        {
            $table->decimal('balance', 10, 10)->nullable()->change();
            $table->decimal('additional_balance', 10, 10)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('shohabbos_multiwallet_balances', function($table)
        {
            $table->decimal('balance', 10, 10)->nullable(false)->change();
            $table->decimal('additional_balance', 10, 10)->nullable(false)->change();
        });
    }
}
