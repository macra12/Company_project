<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $team = []; // Replace with model data if available
        return view('pages.team', compact('team'));
    }
}
