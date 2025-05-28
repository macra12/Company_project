<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run()
    {
        $posts = [
            [
                'title' => 'Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia',
                'slug' => 'dolorum-optio-tempore',
                'content' => 'Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta...',
                'image' => 'blog-1.jpg',
                'author' => 'John Doe',
                'category' => 'Politics',
                'published_at' => '2024-12-12 00:00:00',
            ],
            [
                'title' => 'Nisi magni odit consequatur autem nulla dolorem',
                'slug' => 'nisi-magni-odit',
                'content' => 'Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam quis illum voluptatum et. Quo libero rerum voluptatem pariatur nam...',
                'image' => 'blog-2.jpg',
                'author' => 'Julia Parker',
                'category' => 'Economics',
                'published_at' => '2025-03-19 00:00:00',
            ],
            [
                'title' => 'Possimus soluta ut id suscipit ea ut',
                'slug' => 'possimus-soluta-ut',
                'content' => 'Aut iste neque ut illum qui perspiciatis similique recusandae non. Fugit autem dolorem labore omnis et. Eum temporibus fugiat voluptate enim tenetur sunt omnis...',
                'image' => 'blog-3.jpg',
                'author' => 'Maria Doe',
                'category' => 'Sports',
                'published_at' => '2025-06-24 00:00:00',
            ],
            [
                'title' => 'Non rem rerum nam cum quo minus',
                'slug' => 'non-rem-rerum',
                'content' => 'Aspernatur rerum perferendis et sint. Voluptates cupiditate voluptas atque quae. Rem veritatis rerum enim et autem. Saepe atque cum eligendi eaque iste omnis a qui...',
                'image' => 'blog-4.jpg',
                'author' => 'Maria Doe',
                'category' => 'Sports',
                'published_at' => '2025-08-05 00:00:00',
            ],
            [
                'title' => 'Accusamus quaerat aliquam qui debitis facilis consequatur',
                'slug' => 'accusamus-quaerat',
                'content' => 'In itaque assumenda aliquam voluptatem qui temporibus iusto nisi quia. Autem vitae quas aperiam nesciunt mollitia tempora odio omnis...',
                'image' => 'blog-5.jpg',
                'author' => 'John Parker',
                'category' => 'Politics',
                'published_at' => '2025-09-17 00:00:00',
            ],
            [
                'title' => 'Distinctio provident quibusdam numquam aperiam aut',
                'slug' => 'distinctio-provident',
                'content' => 'Expedita et temporibus eligendi enim molestiae est architecto praesentium dolores. Illo laboriosam officiis quis. Labore officia quia sit voluptatem nisi est dignissimos totam...',
                'image' => 'blog-6.jpg',
                'author' => 'Julia White',
                'category' => 'Economics',
                'published_at' => '2025-12-07 00:00:00',
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
