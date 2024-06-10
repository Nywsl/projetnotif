<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InscriptionsController extends Controller
{
    public function index()
    {
        return view('inscription');
    }
}
