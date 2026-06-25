<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if(!Schema::hasColumn('users', 'nomor_wa'))
            {
                $table->string('nomor_wa')->nullable()->after('foto');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if(Schema::hasColumn('users', 'nomor_wa'))
            {
                $table->dropColumn('nomor_wa');
            }
        });
    }
};
