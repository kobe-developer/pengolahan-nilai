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
        Schema::create("mahasiswa", function (Blueprint $table) {
            $table->id();
            $table->string("nim", 10)->unique();
            $table->string("nama", 150);
            $table->enum('jenis_kelamin', ['P','L']);
            $table->string('alamat');
            $table->string('email');
            $table->string('nomor_hp',20);
            $table->bigInteger('id_kelas')->unsigned();
            $table->bigInteger('id_prodi')->unsigned();
            $table->integer('tahun_masuk');
            $table->timestamps();
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
            $table->foreign('id_prodi')->references('id')->on('prodi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
