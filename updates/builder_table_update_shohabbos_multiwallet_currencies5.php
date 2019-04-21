<?php namespace Shohabbos\Multiwallet\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateShohabbosMultiwalletCurrencies5 extends Migration
{
    public function up()
    {
        Schema::table('shohabbos_multiwallet_currencies', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('key')->change()->unique();
        });
    }
    
    public function down()
    {
        Schema::table('shohabbos_multiwallet_currencies', function($table)
        {
            $table->dropColumn('id');
            $table->string('key', 191)->change();
        });
    }
}