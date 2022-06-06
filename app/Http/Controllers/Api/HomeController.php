<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BannerResource;
use App\Http\Resources\ServiceResource;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        return  \responder::success([
            'banners'=>BannerResource::collection(Banner::active()->get()),
            'news'=>Blog::active()->limit(10)->get()->pluck('title'),
            'services'=>ServiceResource::collection(Service::latest()->with('appointments')->active()->limit(20)->whereIsOffer(0)->get()),
            'settings'=>Setting::pluck('ar_value','name')
        ]);
    }
}
