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
use App\Http\Controllers\FeatureController;

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// About Page
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Team Page
Route::get('/team', [TeamController::class, 'index'])->name('team');

// Testimonials Page
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials');

// Services CRUD
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::get('/services/{slug}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('/services/{slug}', [ServiceController::class, 'update'])->name('services.update');
Route::delete('/services/{slug}', [ServiceController::class, 'destroy'])->name('services.destroy');
Route::get('/service/{slug}', [ServiceController::class, 'show'])->name('service-details');

// Features CRUD
Route::resource('features', FeatureController::class);

// Portfolio Pages
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{id}', [PortfolioController::class, 'show'])->name('portfolio-details');

// Pricing Page
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');
Route::get('/pricing/trial', [PricingController::class, 'trial'])->name('pricing.trial');

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog-details');
Route::get('/blog/search', [BlogController::class, 'search'])->name('blog.search');
Route::post('/blog/{slug}/comment', [BlogController::class, 'comment'])->name('blog.comment');
Route::get('/author/{username}', [BlogController::class, 'authorPosts'])->name('author.posts');

// Contact Page
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Newsletter Subscription
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
