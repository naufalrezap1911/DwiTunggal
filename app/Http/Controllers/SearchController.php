<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('all.search.index');
    }

    public function search(Type $var = null)
    {
        # code...
    }
}
