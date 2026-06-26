<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mountain;

class MountainSeeder extends Seeder
{
    public function run(): void
    {
        Mountain::create([
            'name' => 'Gunung Arjuno',
            'image' => 'https://i.ibb.co.com/d4F80GXY/gunung-arjuno-di-malang.jpg',
            'description' => '3.339 mdpl'
        ]);

        Mountain::create([
            'name' => 'Gunung Lawu',
            'image' => 'https://i.ibb.co.com/RT7Yb1Tb/Gunung-Lawu.jpg',
            'description' => '3.265 mdpl'
        ]);

        Mountain::create([
            'name' => 'Gunung Semeru',
            'image' => 'https://i.ibb.co.com/qYLqnbCF/semeru21.jpg',
            'description' => '3.676 mdpl'
        ]);
    }
}