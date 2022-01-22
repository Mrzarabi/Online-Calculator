<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignUuid('user_id')->references('id')->on('users')
                                    ->onDelete('cascade')
                                    ->onUpdate('cascade');

            $table->foreignId('calculator_id')->references('id')->on('calculators')
                                    ->onDelete('cascade')
                                    ->onUpdate('cascade');

            $table->foreignId('element_id')->references('id')->on('elements')
                                    ->onDelete('cascade')
                                    ->onUpdate('cascade');

            
            $table->float('input_number')->nullable();
            $table->string('input_currency_unit')->nullable();

            
            $table->float('output_number')->nullable();
            $table->string('output_currency_unit')->nullable();

            $table->bigInteger('order_number')->unique();

            $table->boolean('accept')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
