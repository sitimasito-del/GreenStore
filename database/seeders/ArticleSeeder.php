<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Tips Persiapan Mendaki Gunung Untuk Pemula',
                'category' => 'Tips & Trik',
                'link' => 'https://example.com/artikel-1',
                'views' => 245,
                'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=500&h=300&fit=crop'
            ],
            [
                'title' => 'Perlengkapan Wajib untuk Pendaki Pemula',
                'category' => 'Perlengkapan',
                'link' => 'https://example.com/artikel-2',
                'views' => 189,
                'image' => 'https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=500&h=300&fit=crop'
            ],
            [
                'title' => 'Rute Pendakian Paling Indah di Indonesia',
                'category' => 'Destinasi',
                'link' => 'https://example.com/artikel-3',
                'views' => 312,
                'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=500&h=300&fit=crop'
            ]
        ];

        foreach ($articles as $article) {
            Article::firstOrCreate(
                ['title' => $article['title']],
                $article
            );
        }
    }
}
