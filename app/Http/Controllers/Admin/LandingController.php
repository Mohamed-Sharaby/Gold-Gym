<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\LandingSlider;
use App\Models\OurServices;
use App\Models\OurWork;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing-page', [
            'services' => OurServices::all(),
            'works' => OurWork::all(),
            'clients' => Client::all(),
            'sliders' => LandingSlider::all()
        ]);
    }


}
