<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();

            $table->foreignUuid('user_id')->references('id')->on('users')
                                    ->onDelete('cascade')
                                    ->onUpdate('cascade');

            $table->foreignId('order_id')->references('id')->on('orders')
                                    ->onDelete('cascade')
                                    ->onUpdate('cascade');

            
            $table->string('email');
            $table->string('contact_email');
            $table->string('wallet')->nullable();
            $table->string('telegram')->nullable();
            $table->string('whatsApp')->nullable();
            $table->string('skype')->nullable();
            $table->string('extra', 255)->nullable();
            $table->boolean('cheack')->default(false);

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
        Schema::dropIfExists('forms');
    }
}
