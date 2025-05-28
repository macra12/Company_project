<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Feature;

class FeatureSeeder extends Seeder
{
    public function run(): void
    {
        $features = [
            ['title' => 'Lorem Ipsum', 'image' => null, 'icon' => 'bi-eye', 'color' => '#ffbb2c'],
            ['title' => 'Dolor Sitema', 'image' => null, 'icon' => 'bi-infinity', 'color' => '#5578ff'],
            ['title' => 'Sed perspiciatis', 'image' => null, 'icon' => 'bi-mortarboard', 'color' => '#e80368'],
            ['title' => 'Magni Dolores', 'image' => null, 'icon' => 'bi-nut', 'color' => '#e361ff'],
            ['title' => 'Nemo Enim', 'image' => null, 'icon' => 'bi-shuffle', 'color' => '#47aeff'],
            ['title' => 'Eiusmod Tempor', 'image' => null, 'icon' => 'bi-star', 'color' => '#ffa76e'],
            ['title' => 'Midela Teren', 'image' => null, 'icon' => 'bi-x-diamond', 'color' => '#11dbcf'],
            ['title' => 'Pira Neve', 'image' => null, 'icon' => 'bi-camera-video', 'color' => '#4233ff'],
            ['title' => 'Dirada Pack', 'image' => null, 'icon' => 'bi-command', 'color' => '#b2904f'],
            ['title' => 'Moton Ideal', 'image' => null, 'icon' => 'bi-dribbble', 'color' => '#b20969'],
            ['title' => 'Verdo Park', 'image' => null, 'icon' => 'bi-activity', 'color' => '#ff5828'],
            ['title' => 'Flavor Nivelanda', 'image' => null, 'icon' => 'bi-brightness-high', 'color' => '#29cc61'],
        ];

        foreach ($features as $feature) {
            Feature::create($feature);
        }
    }
}
