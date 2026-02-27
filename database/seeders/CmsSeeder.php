<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CMS;
use Illuminate\Support\Str;

class CmsSeeder extends Seeder
{
    public function run()
    {
        $sliders = [
            [
                'title' => 'Discover Top Universities',
                'content' => json_encode([
                    'caption' => 'Discover Top Universities',
                    'sub_caption' => 'Find the perfect course for your future',
                    'link' => 'http://127.0.0.1:8000/universities',
                ]),
                'image_path' => 'https://media.istockphoto.com/id/1758823939/photo/african-american-customer-providing-five-satisfaction-ratings-customer-service-evaluation.jpg?s=612x612&w=0&k=20&c=t3ALREwkwN40ZAFRPbtWAZe_63wq0kh73Bfixq6_2V4=',
            ],
            [
                'title' => 'Explore Our Colleges',
                'content' => json_encode([
                    'caption' => 'Explore Our Colleges',
                    'sub_caption' => 'Join a vibrant academic community',
                    'link' => 'http://127.0.0.1:8000/colleges',
                ]),
                'image_path' => 'https://media.istockphoto.com/id/1758823939/photo/african-american-customer-providing-five-satisfaction-ratings-customer-service-evaluation.jpg?s=612x612&w=0&k=20&c=t3ALREwkwN40ZAFRPbtWAZe_63wq0kh73Bfixq6_2V4=',
            ],
        ];

        foreach ($sliders as $slider) {
            CMS::updateOrCreate(
                ['title' => $slider['title']],
                [
                    'content' => $slider['content'],
                    'image_path' => $slider['image_path'],
                    'slug' => Str::slug($slider['title']),
                ]
            );
        }
    }
}
 