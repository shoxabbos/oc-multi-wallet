<?php namespace Shohabbos\Multiwallet\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateShohabbosMultiwalletBalances extends Migration
{
    public function up()
    {
        Schema::create('shohabbos_multiwallet_balances', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('currency_id');
            $table->integer('user_id');
            $table->decimal('balance', 10, 10);
            $table->decimal('additional_balance', 10, 10);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('shohabbos_multiwallet_balances');
    }
}
