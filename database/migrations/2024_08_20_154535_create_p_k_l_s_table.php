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
        Schema::create('p_k_l_s', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->string('tempat_pkl');
            $table->string('lama_pkl');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('bukti_pembayaran');
            $table->string('surat_pernyataan');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('verified_by')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('mahasiswa_id')->references('id')->on('users');
            $table->foreign('verified_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_k_l_s');
    }
};
