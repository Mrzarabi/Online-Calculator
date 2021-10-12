<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();

            $table->foreignUuid('user_id')->references('id')->on('users')
                                    ->onDelete('cascade')
                                    ->onUpdate('cascade');

            $table->string('title', 50)->nullable();

            $table->text('body')->nullable();

            $table->string('link_whatsapp')->nullable();
            $table->string('link_telegram')->nullable();
            $table->string('link_instagram')->nullable();
            $table->string('link_gmail')->nullable();
            $table->string('link_skype')->nullable();
            
            $table->string('logo')->nullable();

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
        Schema::dropIfExists('about_us');
    }
}
