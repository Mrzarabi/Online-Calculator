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

            $table->foreignId('user_id')->nullable()->references('id')->on('users')
                                    ->onDelete('set null')
                                    ->onUpdate('cascade');

            $table->foreignId('currency_id')->nullable()->references('id')->on('currencies')
                                    ->onDelete('set null')
                                    ->onUpdate('cascade');

            $table->foreignId('exchange_id')->nullable()->references('id')->on('exchanges')
                                    ->onDelete('set null')
                                    ->onUpdate('cascade');

            $table->foreignId('country_id')->nullable()->references('id')->on('countries')
                                    ->onDelete('set null')
                                    ->onUpdate('cascade');

            
            $table->float('input_number')->nullable();
            $table->string('input_currency_unit')->nullable();

            
            $table->float('output_number')->nullable();
            $table->string('output_currency_unit')->nullable();

            $table->bigInteger('order_number')->unique();

            $table->boolean('is_accept')->default(false);

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
