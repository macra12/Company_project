<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            if (!Schema::hasColumn('services', 'icon')) {
                $table->string('icon')->nullable()->after('image');
            }
            if (!Schema::hasColumn('services', 'color')) {
                $table->string('color')->nullable()->after('icon');
            }
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            if (Schema::hasColumn('services', 'icon')) {
                $table->dropColumn('icon');
            }
            if (Schema::hasColumn('services', 'color')) {
                $table->dropColumn('color');
            }
        });
    }
};
