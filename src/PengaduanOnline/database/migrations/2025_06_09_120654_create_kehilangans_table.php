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
        Schema::create('kehilangans', function (Blueprint $table) {
            $table->id();

            // add foreign key columns first
            $table->unsignedBigInteger('user_id')->nullable();

            // reference to the users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            $table->string('nama_barang');
            $table->string('lokasi_hilang');
            $table->text('deskripsi');
            $table->date('tanggal_hilang');
            $table->string('foto')->nullable();
            $table->enum('status', ['belum_ditemukan', 'ditemukan'])->default('belum_ditemukan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kehilangans');
    }
};
