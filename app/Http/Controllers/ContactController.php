<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function submit(Request $request)
    {
        // Validate and process contact form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        // Example: Save to database or send email
        return redirect()->route('contact')->with('success', 'Your message has been sent. Thank you!');
    }
}
