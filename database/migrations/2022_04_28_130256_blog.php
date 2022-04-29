<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Blog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    
        Schema::create('blog', function (Blueprint $table) {
            $table->id();
            $table->char('title',15);
            $table->string('content',500);
            $table->char('image',30);
            $table->timestamps();

            $table->foreignId('addedBy')
                  ->constrained('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('blog');
    }
}
