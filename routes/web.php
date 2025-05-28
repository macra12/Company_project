<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ServiceController;

use App\Http\Controllers\PricingController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PortfolioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These routes
| are loaded by the RouteServiceProvider and all of them will be assigned to the
| "web" middleware group.
|
*/

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// About Page
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Team Page
Route::get('/team', [TeamController::class, 'index'])->name('team');

// Testimonials Page
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials');

// Services Page
Route::get('/services', [ServiceController::class, 'index'])->name('services');

// Service Details Page
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('service-details');

// Portfolio Pages
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{id}', [PortfolioController::class, 'show'])->name('portfolio-details');

// Pricing Page
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');

// Pricing Trial Signup
Route::get('/pricing/trial', [PricingController::class, 'trial'])->name('pricing.trial');

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog');

Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog-details');
Route::get('/blog/search', [BlogController::class, 'search'])->name('blog.search');
Route::post('/blog/{slug}/comment', [BlogController::class, 'comment'])->name('blog.comment');
Route::get('/author/{username}', [BlogController::class, 'authorPosts'])->name('author.posts');

// Contact Page
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Contact Form Submission
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

Route::post('/newsletter', 'NewsletterController@subscribe');
Route::get('/portfolio/details', [PortfolioController::class, 'details'])->name('portfolio-details');
// Removed duplicate /about route that returned a missing view
