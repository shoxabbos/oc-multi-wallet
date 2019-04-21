<?php namespace Shohabbos\Multiwallet\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateShohabbosMultiwalletCurrencies3 extends Migration
{
    public function up()
    {
        Schema::table('shohabbos_multiwallet_currencies', function($table)
        {
            $table->dropColumn('key');
        });
    }
    
    public function down()
    {
        Schema::table('shohabbos_multiwallet_currencies', function($table)
        {
            $table->string('key', 10);
        });
    }
}
