<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('karyawan', function (Blueprint $table) {
            $table->foreign('jabatan_id')->references('id')->on('jabatan')->onDelete('cascade');
        });
        Schema::table('presensi', function (Blueprint $table) {
            $table->foreign('karyawan_id')->references('id')->on('karyawan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('karyawan', function (Blueprint $table) {
            $table->dropForeign(['jabatan_id']);
        });
        Schema::table('presensi', function (Blueprint $table) {
            $table->dropForeign(['karyawan_id']);
        });
    }
}
