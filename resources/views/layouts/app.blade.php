<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'Company Bootstrap Template')</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('theme/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('theme/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('theme/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/assets/css/main.css') }}" rel="stylesheet">
</head>
<body class="index-page">
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center">
            <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
                <img src="{{ asset('theme/assets/img/logo.png') }}" alt="Company Logo">
                <h1 class="sitename">Company</h1><span>.</span>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                    <li class="dropdown">
                        <a href="{{ route('about') }}"><span>About</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="{{ route('team') }}">Team</a></li>
                            <li><a href="{{ route('testimonials') }}">Testimonials</a></li>
                            <li class="dropdown">
                                <a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="#">Deep Dropdown 1</a></li>
                                    <li><a href="#">Deep Dropdown 2</a></li>
                                    <li><a href="#">Deep Dropdown 3</a></li>
                                    <li><a href="#">Deep Dropdown 4</a></li>
                                    <li><a href="#">Deep Dropdown 5</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">Services</a></li>
                    <li><a href="{{ route('portfolio') }}" class="{{ request()->routeIs('portfolio') ? 'active' : '' }}">Portfolio</a></li>
                    <li><a href="{{ route('pricing') }}" class="{{ request()->routeIs('pricing') ? 'active' : '' }}">Pricing</a></li>
                    <li><a href="{{ route('blog') }}" class="{{ request()->routeIs('blog') ? 'active' : '' }}">Blog</a></li>
                    <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <div class="header-social-links">
                <a href="https://twitter.com" class="twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="https://facebook.com" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="https://instagram.com" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="https://linkedin.com" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

    <footer id="footer" class="footer dark-background">
        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                        <span class="sitename">Company</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>A108 Adam Street</p>
                        <p>New York, NY 535022</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                        <p><strong>Email:</strong> <span>info@example.com</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href="https://twitter.com"><i class="bi bi-twitter-x"></i></a>
                        <a href="https://facebook.com"><i class="bi bi-facebook"></i></a>
                        <a href="https://instagram.com"><i class="bi bi-instagram"></i></a>
                        <a href="https://linkedin.com"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About us</a></li>
                        <li><a href="{{ route('services') }}">Services</a></li>
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="{{ route('services') }}">Web Design</a></li>
                        <li><a href="{{ route('services') }}">Web Development</a></li>
                        <li><a href="{{ route('services') }}">Product Management</a></li>
                        <li><a href="{{ route('services') }}">Marketing</a></li>
                        <li><a href="{{ route('services') }}">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12 footer-newsletter">
                    <h4>Our Newsletter</h4>
                    <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
                    <form action="{{ route('newsletter.subscribe') }}" method="post" class="php-email-form">
                        @csrf
                        <div class="newsletter-form">
                            <input type="email" name="email" required>
                            <input type="submit" value="Subscribe">
                        </div>
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your subscription request has been sent. Thank you!</div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Company</strong> <span>All Rights Reserved</span></p>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a>
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('theme/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('theme/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('theme/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('theme/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('theme/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('theme/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('theme/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('theme/assets/js/main.js') }}"></script>
</body>
</html>
<script>
    // Isotope
    document.addEventListener('DOMContentLoaded', function () {
        if (document.querySelector('.isotope-container')) {
            var elem = document.querySelector('.isotope-container');
            var iso = new Isotope(elem, {
                itemSelector: '.isotope-item',
                layoutMode: 'masonry'
            });

            var filters = document.querySelectorAll('.portfolio-filters li');
            filters.forEach(function (filter) {
                filter.addEventListener('click', function () {
                    filters.forEach(f => f.classList.remove('filter-active'));
                    this.classList.add('filter-active');
                    iso.arrange({ filter: this.getAttribute('data-filter') });
                });
            });
        }

        // GLightbox
        const lightbox = GLightbox({
            selector: '.glightbox'
        });

        // Swiper
        if (document.querySelector('.portfolio-details-slider')) {
            const swiper = new Swiper('.portfolio-details-slider', JSON.parse(document.querySelector('.swiper-config')?.textContent || '{}'));
        }
    });

</script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>AOS.init();</script>
