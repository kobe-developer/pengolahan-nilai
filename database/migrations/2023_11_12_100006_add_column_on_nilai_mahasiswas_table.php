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
        Schema::table('nilai_mahasiswa', function (Blueprint $table) {
            $table->bigInteger('id_mk')->after('mhs_nim')->unsigned();
            $table->bigInteger('id_user')->after('id_mk')->unsigned();
            $table->integer('nilai_uts')->after('id_user');
            $table->integer('nilai_uas')->after('nilai_uts');
            $table->integer('nilai_tugas')->after('nilai_uas');
            $table->integer('presensi')->after('nilai_tugas');
            $table->foreign('id_mk')->references('id')->on('mata_kuliah')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nilai_mahasiswa', function (Blueprint $table) {
            $table->dropForeign(['id_mk', 'id_user']);
            $table->dropColumn(['nilai_uts', 'nilai_uas', 'nilai_tugas', 'presensi', 'id_mk', 'id_user']);
        });
    }
};
