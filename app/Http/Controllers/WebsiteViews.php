<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteViews extends Controller
{

    public function home()
    {
        return view('website.pages.home');
    }
    public function about()
    {
        return view('website.pages.about');
    }
    public function contact()
    {
        return view('website.pages.contact');
    }
    public function features()
    {
        return view('website.pages.features');
    }
    public function services()
    {
        return view('website.pages.services');
    }
    public function privacypolicy()
    {
        return view('website.pages.privacypolicy');
    }
}
