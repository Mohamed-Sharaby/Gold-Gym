<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function __invoke(Request $request)
    {
        $settings = Setting::all()->mapWithKeys(function ($q) {
            return [$q['name'] => $q['value']];
        });
        return \responder::success($settings);
    }
}
