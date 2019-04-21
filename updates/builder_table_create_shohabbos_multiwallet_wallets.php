<?php namespace Shohabbos\Multiwallet\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateShohabbosMultiwalletWallets extends Migration
{
    public function up()
    {
        Schema::create('shohabbos_multiwallet_wallets', function($table)
        {
            $table->engine = 'InnoDB';
            $table->string('key', 10);
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(1);
            $table->string('address')->nullable();
            $table->decimal('balance', 10, 10)->nullable();
            $table->primary(['key']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('shohabbos_multiwallet_wallets');
    }
}
