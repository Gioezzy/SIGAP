<?php

use App\Models\Berita;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('beritas', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('judul');
        });

        $beritas = Berita::all();
        foreach ($beritas as $berita){
            $slug = Str::slug($berita->judul);

            $counter = 1;
            $originalSlug = $slug;

            while (Berita::where('slug', $slug)->where('id', '!=', $berita->id)->exists()){
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            $berita->update(['slug' => $slug]);
        }

        // Update the slug for existing records
        Schema::table('beritas', function (Blueprint $table) {
            $table->string('slug')->nullable()->change();
            $table->unique('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('beritas', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn('slug');
        });
    }
};
