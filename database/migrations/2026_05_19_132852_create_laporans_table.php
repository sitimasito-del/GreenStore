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
        Schema::create('laporans', function (Blueprint $table) {

            $table->id();

            // USER

            $table->unsignedBigInteger('user_id');

            // GUNUNG

            $table->unsignedBigInteger('mountain_id');

            // JENIS LAPORAN

            $table->string('jenis_laporan');

            // DESKRIPSI

            $table->text('deskripsi');

            // STATUS

            $table->string('status')
                  ->default('Pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};