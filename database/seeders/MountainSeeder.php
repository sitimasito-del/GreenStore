<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mountain;

class MountainSeeder extends Seeder
{
    public function run(): void
    {
        Mountain::create([
            'nama_gunung' => 'Gunung Penanggungan',
            'lokasi' => 'Mojokerto',
            'deskripsi' => 'Gunung populer di Mojokerto'
        ]);

        Mountain::create([
            'nama_gunung' => 'Gunung Welirang',
            'lokasi' => 'Mojokerto',
            'deskripsi' => 'Gunung dengan jalur pendakian alami'
        ]);
    }
}