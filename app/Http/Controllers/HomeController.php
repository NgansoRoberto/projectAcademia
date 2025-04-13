<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        return view('welcome');
    }
    public function index()
    {
        $Notifications = Notification::where('user_id', auth()->id())
        ->where('statut', 'envoyée')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('home' , compact('Notifications'));
    }
}
