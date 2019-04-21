<?php namespace Shohabbos\Multiwallet\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateShohabbosMultiwalletCurrencies2 extends Migration
{
    public function up()
    {
        Schema::table('shohabbos_multiwallet_currencies', function($table)
        {
            $table->boolean('is_default')->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('shohabbos_multiwallet_currencies', function($table)
        {
            $table->dropColumn('is_default');
        });
    }
}
