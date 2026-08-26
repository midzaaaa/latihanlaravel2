<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerusahaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
{
    Schema::create('perusahaans', function (Blueprint $table) {
        $table->id();
        $table->string('nama_perusahaan', 100);
        $table->string('bidang_usaha', 100);       // contoh: Software House, 
        $table->text('alamat');
        $table->string('nama_pembimbing_industri', 100)->nullable();
        $table->string('telepon', 20)->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perusahaans');
    }
}
