<?php

namespace App\Http\Controllers;

use App\Models\Found;
use App\Models\Lost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = auth()->id();

        // Retrieve Found and Lost items for the authenticated user
        $foundItems = Found::where('user_id', $userId)->where('is_claimed', false)->get();
        $lostItems = Lost::where('user_id', $userId)->where('is_claimed', false)->get();

        // Pass the data to the view
        return view('home', compact('foundItems', 'lostItems'));
    }

    public function news() {
        $foundItems = Found::where('is_claimed', false)->get();
        $lostItems = Lost::where('is_claimed', false)->get();
        $historyfoundItems = Found::where('is_claimed', true)->get();
        $historylostItems = Lost::where('is_claimed', true)->get();

        return view('welcome', compact('foundItems', 'lostItems', 'historyfoundItems', 'historylostItems'));
    }
}
