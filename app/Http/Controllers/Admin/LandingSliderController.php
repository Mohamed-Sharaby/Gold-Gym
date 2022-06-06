<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use App\Models\LandingSlider;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class LandingSliderController extends Controller
{



    public function index()
    {
        $sliders = LandingSlider::latest()->get();
        return view('dashboard.landing.sliders.index', compact('sliders'));
    }


    public function create()
    {
        return view('dashboard.landing.sliders.create');
    }


    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',
        ]);
        LandingSlider::create($validator);
        return redirect(route('admin.landing-sliders.index'))->with('success', 'تم الاضافة بنجاح');
    }


    public function edit($id)
    {
        $slider = LandingSlider::findOrFail($id);
        return view('dashboard.landing.sliders.edit', compact('slider'));
    }


    public function update(Request $request, $id)
    {
        $slider = LandingSlider::findOrFail($id);
        $validator = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',
        ]);
        if ($request->image) {
            if ($slider->image) {
                $image = str_replace(url('/') . '/storage/', '', $slider->image);
                deleteImage('uploads', $image);
            }
        }

        $slider->update($validator);
        return redirect(route('admin.landing-sliders.index'))->with('success', 'تم التعديل بنجاح');
    }


    public function destroy($id)
    {
        $slider = LandingSlider::findOrFail($id);
        $slider->delete();
        return 'Done';
    }
}
