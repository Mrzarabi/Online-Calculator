<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();

            $table->foreignId('ticket_id')->nullable()->references('id')->on('tickets')
                                    ->onDelete('set null')
                                    ->onUpdate('cascade');

            $table->foreignId('starter_id')->nullable()->references('id')->on('starters')
                                    ->onDelete('cascade')
                                    ->onUpdate('cascade');
                                    
            $table->text('body');
            $table->boolean('watched')->default(false);
            $table->string('importance')->default(0);
            $table->string('image')->nullable();

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
        Schema::dropIfExists('tickets');
    }
}
