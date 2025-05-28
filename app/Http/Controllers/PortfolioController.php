<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolioItems = \App\Models\Portfolio::all(); // Example model
        return view('pages.portfolio', compact('portfolioItems'));
    }

    public function details()
    {
        // Logic for portfolio details page
        return view('pages.portfolio-detail');
    }
}
