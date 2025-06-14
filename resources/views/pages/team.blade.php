@extends('layouts.app')

@section('title', 'Team - Company Bootstrap Template')

@section('content')
<!-- Page Title -->
<div class="page-title accent-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Team</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="current">Team</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<!-- Team Section -->
<section id="team" class="team section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Team</h2>
        <p>Meet our dedicated team members who drive our success</p>
    </div>

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="team-member">
                    <div class="member-img">
                        <img src="{{ asset('theme/assets/img/team/team-1.jpg') }}" class="img-fluid" alt="Walter White">
                        <div class="social">
                            <a href="https://twitter.com"><i class="bi bi-twitter-x"></i></a>
                            <a href="https://facebook.com"><i class="bi bi-facebook"></i></a>
                            <a href="https://instagram.com"><i class="bi bi-instagram"></i></a>
                            <a href="https://linkedin.com"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>Walter White</h4>
                        <span>Chief Executive Officer</span>
                    </div>
                </div>
            </div><!-- End Team Member -->

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="team-member">
                    <div class="member-img">
                        <img src="{{ asset('theme/assets/img/team/team-2.jpg') }}" class="img-fluid" alt="Sarah Jhonson">
                        <div class="social">
                            <a href="https://twitter.com"><i class="bi bi-twitter-x"></i></a>
                            <a href="https://facebook.com"><i class="bi bi-facebook"></i></a>
                            <a href="https://instagram.com"><i class="bi bi-instagram"></i></a>
                            <a href="https://linkedin.com"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>Sarah Jhonson</h4>
                        <span>Product Manager</span>
                    </div>
                </div>
            </div><!-- End Team Member -->

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                <div class="team-member">
                    <div class="member-img">
                        <img src="{{ asset('theme/assets/img/team/team-3.jpg') }}" class="img-fluid" alt="William Anderson">
                        <div class="social">
                            <a href="https://twitter.com"><i class="bi bi-twitter-x"></i></a>
                            <a href="https://facebook.com"><i class="bi bi-facebook"></i></a>
                            <a href="https://instagram.com"><i class="bi bi-instagram"></i></a>
                            <a href="https://linkedin.com"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>William Anderson</h4>
                        <span>CTO</span>
                    </div>
                </div>
            </div><!-- End Team Member -->

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
                <div class="team-member">
                    <div class="member-img">
                        <img src="{{ asset('theme/assets/img/team/team-4.jpg') }}" class="img-fluid" alt="Amanda Jepson">
                        <div class="social">
                            <a href="https://twitter.com"><i class="bi bi-twitter-x"></i></a>
                            <a href="https://facebook.com"><i class="bi bi-facebook"></i></a>
                            <a href="https://instagram.com"><i class="bi bi-instagram"></i></a>
                            <a href="https://linkedin.com"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>Amanda Jepson</h4>
                        <span>Accountant</span>
                    </div>
                </div>
            </div><!-- End Team Member -->
        </div>
    </div>
</section><!-- /Team Section -->
@endsection
