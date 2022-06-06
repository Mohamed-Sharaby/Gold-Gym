<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurServices;
use Illuminate\Http\Request;

class LandingServiceController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('permission:Banners');
//    }


    public function index()
    {
        $services = OurServices::latest()->get();
        return view('dashboard.landing.our-services.index', compact('services'));
    }


    public function create()
    {
        return view('dashboard.landing.our-services.create');
    }


    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',
        ]);
        OurServices::create($validator);
        return redirect(route('admin.landing-services.index'))->with('success', 'تم الاضافة بنجاح');
    }


    public function edit($id)
    {
        $service = OurServices::findOrFail($id);
        return view('dashboard.landing.our-services.edit', compact('service'));
    }


    public function update(Request $request, $id)
    {
        $service = OurServices::findOrFail($id);
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',
        ]);
        if ($request->image) {
            if ($service->image) {
                $image = str_replace(url('/') . '/storage/', '', $service->image);
                deleteImage('uploads', $image);
            }
        }

        $service->update($validator);
        return redirect(route('admin.landing-services.index'))->with('success', 'تم التعديل بنجاح');
    }


    public function destroy($id)
    {
        $service = OurServices::findOrFail($id);
        $service->delete();
        return 'Done';
    }
}
