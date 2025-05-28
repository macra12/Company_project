<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = []; // Replace with model data if available
        return view('pages.testimonials', compact('testimonials'));
    }
}
