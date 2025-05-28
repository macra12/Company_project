@extends('layouts.app')

@section('title', $service['title'] . ' - Service Details')

@section('content')
<!-- Page Title -->
<div class="page-title accent-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">{{ $service['title'] }}</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('services') }}">Services</a></li>
                <li class="current">{{ $service['title'] }}</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<!-- Service Details Section -->
<section id="service-details" class="service-details section">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="services-list">
                    <a href="{{ route('service-details', 'nesciunt-mete') }}" class="{{ request()->is('services/nesciunt-mete') ? 'active' : '' }}">Nesciunt Mete</a>
                    <a href="{{ route('service-details', 'eosle-commodi') }}" class="{{ request()->is('services/eosle-commodi') ? 'active' : '' }}">Eosle Commodi</a>
                    <a href="{{ route('service-details', 'ledo-markt') }}" class="{{ request()->is('services/ledo-markt') ? 'active' : '' }}">Ledo Markt</a>
                    <a href="{{ route('service-details', 'asperiores-commodit') }}" class="{{ request()->is('services/asperiores-commodit') ? 'active' : '' }}">Asperiores Commodit</a>
                    <a href="{{ route('service-details', 'velit-doloremque') }}" class="{{ request()->is('services/velit-doloremque') ? 'active' : '' }}">Velit Doloremque</a>
                    <a href="{{ route('service-details', 'dolori-architecto') }}" class="{{ request()->is('services/dolori-architecto') ? 'active' : '' }}">Dolori Architecto</a>
                </div>
                <h4>Enim qui eos rerum in delectus</h4>
                <p>Nam voluptatem quasi numquam quas fugiat ex temporibus quo est. Quia aut quam quod facere ut non occaecati ut aut. Nesciunt mollitia illum tempore corrupti sed eum reiciendis. Maxime modi rerum.</p>
            </div>
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                <img src="{{ asset('theme/assets/img/services.jpg') }}" alt="" class="img-fluid services-img">
                <h3>{{ $service['title'] }}</h3>
                <p>{{ $service['description'] }}</p>
                <ul>
                    <li><i class="bi bi-check-circle"></i> <span>Aut eum totam accusantium voluptatem.</span></li>
                    <li><i class="bi bi-check-circle"></i> <span>Assumenda et porro nisi nihil nesciunt voluptatibus.</span></li>
                    <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea</span></li>
                </ul>
                <p>
                    Est reprehenderit voluptatem necessitatibus asperiores neque sed ea illo. Deleniti quam sequi optio iste veniam repellat odit. Aut pariatur itaque nesciunt fuga.
                </p>
                <p>
                    Sunt rem odit accusantium omnis perspiciatis officia. Laboriosam aut consequuntur recusandae mollitia doloremque est architecto cupiditate ullam. Quia est ut occaecati fuga. Distinctio ex repellendus eveniet velit sint quia sapiente cumque.
                </p>
            </div>
        </div>
    </div>
</section><!-- /Service Details Section -->
@endsection
