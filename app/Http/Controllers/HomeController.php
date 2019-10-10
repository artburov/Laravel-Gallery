<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    function about()
    {
        return view( 'about' );
    }
}
