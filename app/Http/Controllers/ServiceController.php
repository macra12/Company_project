<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = [
            ['slug' => 'nesciunt-mete', 'title' => 'Nesciunt Mete', 'description' => 'Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.'],
            ['slug' => 'eosle-commodi', 'title' => 'Eosle Commodi', 'description' => 'Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.'],
            ['slug' => 'ledo-markt', 'title' => 'Ledo Markt', 'description' => 'Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.'],
            ['slug' => 'asperiores-commodit', 'title' => 'Asperiores Commodit', 'description' => 'Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.'],
            ['slug' => 'velit-doloremque', 'title' => 'Velit Doloremque', 'description' => 'Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.'],
            ['slug' => 'dolori-architecto', 'title' => 'Dolori Architecto', 'description' => 'Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti recusandae ducimus enim.'],
        ];
        return view('pages.services', compact('services'));
    }

    public function show($service)
    {
        $services = [
            'nesciunt-mete' => ['title' => 'Nesciunt Mete', 'description' => 'Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.'],
            'eosle-commodi' => ['title' => 'Eosle Commodi', 'description' => 'Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.'],
            'ledo-markt' => ['title' => 'Ledo Markt', 'description' => 'Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.'],
            'asperiores-commodit' => ['title' => 'Asperiores Commodit', 'description' => 'Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.'],
            'velit-doloremque' => ['title' => 'Velit Doloremque', 'description' => 'Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.'],
            'dolori-architecto' => ['title' => 'Dolori Architecto', 'description' => 'Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti recusandae ducimus enim.'],
        ];
        $service = $services[$service] ?? abort(404, 'Service not found');
        return view('pages.service-details', compact('service'));
    }
}
