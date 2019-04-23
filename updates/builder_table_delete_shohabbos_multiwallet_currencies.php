<?php namespace Shohabbos\Multiwallet\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteShohabbosMultiwalletCurrencies extends Migration
{
    public function up()
    {
        Schema::dropIfExists('shohabbos_multiwallet_currencies');
    }
    
    public function down()
    {
        Schema::create('shohabbos_multiwallet_currencies', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name', 191);
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->boolean('is_default')->default(0);
            $table->string('key', 191);
        });
    }
}
