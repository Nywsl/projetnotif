<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OthersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'other']);
    }

    /**
     * Show the other user dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('other.home');
    }
}
