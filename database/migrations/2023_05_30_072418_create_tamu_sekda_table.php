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
        Schema::create('sekdas', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->string("noHp");
            $table->string("nip")->nullable(true);
            $table->string("statusPegawai");
            $table->text("alamatAsalInstansi");
            $table->string("bidang")->nullable(true);
            $table->string("jabatan")->nullable(true);
            $table->string("keperluan");
            $table->string("tujuan");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sekdas');
    }
};
