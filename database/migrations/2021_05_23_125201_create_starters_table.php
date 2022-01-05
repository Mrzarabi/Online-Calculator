<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('starters', function (Blueprint $table) {
            $table->id();
            
            $table->foreignUuid('user_id')->references('id')->on('users')
                                    ->onDelete('cascade')
                                    ->onUpdate('cascade');
                                    
            $table->string('title', 255);
            $table->string('start_number')->unique();
            $table->boolean('closed')->default(false);
            $table->boolean('answerd')->delfault(false);

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
        Schema::dropIfExists('starters');
    }
}
