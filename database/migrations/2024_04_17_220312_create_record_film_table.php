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
        Schema::create('record_film', function (Blueprint $table) {
            $table->id(); // 中間テーブルの主キー
            $table->foreignId('record_id')->constrained('records')->onDelete('cascade'); // recordsテーブルへの外部キー
            $table->foreignId('film_id')->constrained('films')->onDelete('cascade'); // filmsテーブルへの外部キー
            $table->timestamps(); // created_at と updated_at のカラムが自動的に追加されます
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('record_film');
    }
};
