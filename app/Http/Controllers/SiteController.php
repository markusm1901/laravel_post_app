<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function help()
    {
        return view('welcome');
    }
    public function home()
    {
        return view('home');
    }
}
