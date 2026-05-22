<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mountain;

class MountainSeeder extends Seeder
{
    public function run(): void
    {
        Mountain::create([
            'nama' => 'Gunung Arjuno',
            'foto' => 'https://i.ibb.co.com/d4F80GXY/gunung-arjuno-di-malang.jpg',
            'tinggi' => '3.339 mdpl'
        ]);

        Mountain::create([
            'nama' => 'Gunung Lawu',
            'foto' => 'https://i.ibb.co.com/RT7Yb1Tb/Gunung-Lawu.jpg',
            'tinggi' => '3.265 mdpl'
        ]);

        Mountain::create([
            'nama' => 'Gunung Semeru',
            'foto' => 'https://i.ibb.co.com/qYLqnbCF/semeru21.jpg',
            'tinggi' => '3.676 mdpl'
        ]);
    }
}