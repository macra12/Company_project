<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['title' => 'Nesciunt Mete', 'slug' => 'nesciunt-mete', 'description' => 'Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.', 'image' => null, 'icon' => 'bi-activity', 'color' => 'item-cyan'],
            ['title' => 'Eosle Commodi', 'slug' => 'eosle-commodi', 'description' => 'Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.', 'image' => null, 'icon' => 'bi-broadcast', 'color' => 'item-orange'],
            ['title' => 'Ledo Markt', 'slug' => 'ledo-markt', 'description' => 'Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.', 'image' => null, 'icon' => 'bi-easel', 'color' => 'item-teal'],
            ['title' => 'Asperiores Commodit', 'slug' => 'asperiores-commodit', 'description' => 'Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.', 'image' => null, 'icon' => 'bi-bounding-box-circles', 'color' => 'item-red'],
            ['title' => 'Velit Doloremque', 'slug' => 'velit-doloremque', 'description' => 'Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.', 'image' => null, 'icon' => 'bi-calendar4-week', 'color' => 'item-indigo'],
            ['title' => 'Dolori Architecto', 'slug' => 'dolori-architecto', 'description' => 'Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti recusandae ducimus enim.', 'image' => null, 'icon' => 'bi-chat-square-text', 'color' => 'item-pink'],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
