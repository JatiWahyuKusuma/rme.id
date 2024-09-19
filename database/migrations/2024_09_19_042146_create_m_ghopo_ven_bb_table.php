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
        Schema::create('ghopo_ven_bb', function (Blueprint $table) {
            $table->id('no');
            $table->integer('jarak');
            $table->decimal('koordinat');
            $table->string('vendor');
            $table->string('komoditi');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->integer('kap(ton/thn)');
            $table->string('konsumsi(ton/thn)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ghopo_ven_bb');
    }
};
