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
        Schema::table('mata_kuliah', function (Blueprint $table) {
            $table->integer('stmt')->after('sks');
            $table->string('dosen_nip',10)->index()->after('stmt');
            $table->foreign('dosen_nip')->references('nip')->on('dosen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
     Schema::table('mata_kuliah', function (Blueprint $table) {
         $table->dropColumn('stmt');
         $table->dropForeign('dosen_nip');
         $table->dropColumn('dosen_nip');
     });
    }
};
