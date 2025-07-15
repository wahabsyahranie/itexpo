<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('xp_news', function (Blueprint $table) {
            $table->id();
            $table->text('nama_berita');
            $table->longText('deskripsi_berita');
            $table->string('slug');
            $table->boolean('dipublikasi');
            $table->char('user_id', 26);
            $table->string('gambar_berita');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('xp_news');
    }
};
