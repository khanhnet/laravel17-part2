<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return 'home';
    }

    public function page($page=null)
    {
        return "page $page";
    }
}
