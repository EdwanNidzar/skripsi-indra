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
        Schema::create('peminjaman_aulas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('jumlah_hari');
            $table->string('nama_pj');
            $table->string('organisasi');
            $table->string('jabatan');
            $table->string('prodi');
            $table->string('no_hp');
            $table->text('keperluan');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->unsignedBigInteger('peminjam_id');
            $table->unsignedBigInteger('verified_by')->nullable();
            $table->timestamps();

            // foreign key
            $table->foreign('peminjam_id')->references('id')->on('users');
            $table->foreign('verified_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_aulas');
    }
};
