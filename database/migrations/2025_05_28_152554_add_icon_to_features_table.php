<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('features', function (Blueprint $table) {
            if (!Schema::hasColumn('features', 'icon')) {
                $table->string('icon')->nullable()->after('image');
            }
            if (!Schema::hasColumn('features', 'color')) {
                $table->string('color')->nullable()->after('icon');
            }
        });
    }

    public function down(): void
    {
        Schema::table('features', function (Blueprint $table) {
            if (Schema::hasColumn('features', 'icon')) {
                $table->dropColumn('icon');
            }
            if (Schema::hasColumn('features', 'color')) {
                $table->dropColumn('color');
            }
        });
    }
};
