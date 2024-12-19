<?php

namespace App\Http\Controllers;
use App\Models\Master;

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
        $services = Master::join('pricing_details', 'pricing_details.serviceid', '=', 'masters.id')->select('pricing_details.*', 'masters.*')->where('type', '=', 'Services')->get();
        // dd($services);
        return view('website.pages.services', compact('services'));
    }
    public function privacypolicy()
    {
        return view('website.pages.privacypolicy');
    }
    public function termsandconditions()
    {
        return view('website.pages.termsandconditions');
    }
    public function returnandrefund()
    {
        return view('website.pages.returnandrefund');
    }
}
