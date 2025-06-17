<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Gunakan raw SQL untuk mengubah enum dan menambahkan default
        DB::statement("ALTER TABLE keramaians MODIFY status ENUM('menunggu', 'disetujui', 'ditolak') DEFAULT 'menunggu'");
    }

    public function down(): void
    {
        // Jika perlu, kembalikan default ke null (tanpa default)
        DB::statement("ALTER TABLE keramaians MODIFY status ENUM('menunggu', 'disetujui', 'ditolak') DEFAULT NULL");
    }
};
