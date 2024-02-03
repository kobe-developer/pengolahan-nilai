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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 10)->unique()->index();
            $table->string('nama');
            $table->enum('jenis_kelamin',['P','L']);
            $table->string('alamat')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('id_prodi');
            $table->string('img_src')->nullable();
            $table->timestamps();
            $table->foreign('id_prodi')->references('id')->on('prodi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
