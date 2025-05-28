<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        // Fetch pricing plans
        return view('pages.pricing');
    }

    public function trial()
    {
        // Handle trial signup logic
        return redirect()->route('pricing')->with('success', 'Trial signup initiated!');
    }
}
