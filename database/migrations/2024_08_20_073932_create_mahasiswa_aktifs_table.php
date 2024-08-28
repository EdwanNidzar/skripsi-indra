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
        Schema::create('mahasiswa_aktifs', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->text('tujuan_surat');
            $table->string('file_surat');
            $table->enum('status', ['approve', 'reject', 'pending'])->default('pending');
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
        Schema::dropIfExists('mahasiswa_aktifs');
    }
};
