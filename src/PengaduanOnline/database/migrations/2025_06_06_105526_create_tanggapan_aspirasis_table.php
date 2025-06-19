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
        Schema::create('tanggapan_aspirasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_aspirasi');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('id_aspirasi')->references('id')->on('aspirasis')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->text('tanggapan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanggapan_aspirasis');
    }
};
