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

            
            $table->string('input_currency_type')->nullable();
            $table->float('input_number')->nullable();
            $table->string('input_currency_unit')->nullable();

            
            $table->string('output_currency_type')->nullable();
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
