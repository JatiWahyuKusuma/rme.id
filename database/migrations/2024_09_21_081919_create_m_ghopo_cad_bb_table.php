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
        Schema::create('ghopo_cad_bb', function (Blueprint $table) {
            $table->id('no');
            $table->integer('jarak');
            $table->decimal('latitude', 10, 6)->nullable();
            $table->decimal('longitude', 10, 6)->nullable();
            $table->integer('no_id');
            $table->string('komoditi');
            $table->string('lokasi_iup');
            $table->string('tipe_sd_cadangan');
            $table->integer('sd_cadangan_ton');
            $table->string('catatan');
            $table->string('status_penyelidikan');
            $table->string('acuan');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('luas_ha');
            $table->date('masa_berlaku_iup')->nullable();
            $table->date('masa_berlaku_ppkh')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ghopo_cad_bb');
    }
};
