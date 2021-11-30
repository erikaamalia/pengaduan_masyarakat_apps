<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function News()
    {
        return view('pages.news.dashboard');
    }
}
