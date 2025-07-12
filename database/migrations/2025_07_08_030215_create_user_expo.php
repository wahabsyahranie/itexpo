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
        #foreignId
        Schema::create('xp_user_expos', function (Blueprint $table) {
            $table->id();
            $table->char('user_id', 26);
            $table->string('username');
            $table->string('linkedin');
            $table->string('instagram');
            $table->string('github');
            $table->string('whatsapp');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->unique(['user_id', 'username']);
        });

        #foreignId
        Schema::create('xp_teams', function (Blueprint $table) {
            $table->id();
            $table->char('user_id', 26);
            $table->string('nama_team');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });

        #foreignId
        Schema::create('xp_anggota_teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('xp_user_expo_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('xp_team_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();

            $table->unique(['xp_user_expo_id', 'xp_team_id']);
        });

        Schema::create('xp_kategoris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori');
            $table->timestamps();
        });

        #foreignId
        Schema::create('xp_karyas', function (Blueprint $table) {
            $table->id();
            $table->char('user_id', 26); #pembuat karya
            $table->foreignId('xp_kategori_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('xp_team_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama_karya');
            $table->longText('deskripsi');
            $table->string('video_promosi');
            $table->string('banner');
            $table->string('poster');
            $table->string('ppt');
            $table->string('thumbnail');
            $table->year('tahun_dibuat');
            $table->boolean('dipublikasi')->default(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });

        #foreignId
        Schema::create('xp_suka_karyas', function (Blueprint $table) {
            $table->id();
            $table->char('user_id', 26);
            $table->foreignId('xp_karya_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();

            $table->unique(['user_id', 'xp_karya_id']);
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('xp_suka_karyas');
        Schema::dropIfExists('xp_karyas');
        Schema::dropIfExists('xp_kategoris');
        Schema::dropIfExists('xp_anggota_teams');
        Schema::dropIfExists('xp_teams');
        Schema::dropIfExists('xp_user_expos');
    }
};
