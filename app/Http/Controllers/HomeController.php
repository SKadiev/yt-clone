<?php

namespace App\Http\Controllers;

use App\Notifications\InvoicePaid;
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

        return view('home');
    }

    public function testSend()
    {
        $user = auth()->user();
        $user->notify(new InvoicePaid());
        return (new InvoicePaid())->toArray($user);
    }
}
