<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table){
            $table->id();
            $table->string('title');
            $table->string('director')->nullable();
            $table->date('date_published')->nullable();
            $table->string('genre');
            $table->integer('evaluation');
            $table->date('date_watched');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->text('comment')->nullable();;
            $table->string('image')->nullable();
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
};
