<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurServices;
use App\Models\OurWork;
use Illuminate\Http\Request;

class LandingWorkController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('permission:Banners');
//    }


    public function index()
    {
        $works = OurWork::latest()->get();
        return view('dashboard.landing.our-works.index', compact('works'));
    }


    public function create()
    {
        return view('dashboard.landing.our-works.create');
    }


    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',
        ]);
        OurWork::create($validator);
        return redirect(route('admin.landing-works.index'))->with('success', 'تم الاضافة بنجاح');
    }


    public function edit($id)
    {
        $work = OurWork::findOrFail($id);
        return view('dashboard.landing.our-works.edit', compact('work'));
    }


    public function update(Request $request, $id)
    {
        $work = OurWork::findOrFail($id);
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',
        ]);
        if ($request->image) {
            if ($work->image) {
                $image = str_replace(url('/') . '/storage/', '', $work->image);
                deleteImage('uploads', $image);
            }
        }

        $work->update($validator);
        return redirect(route('admin.landing-works.index'))->with('success', 'تم التعديل بنجاح');
    }


    public function destroy($id)
    {
        $work = OurWork::findOrFail($id);
        $work->delete();
        return 'Done';
    }
}
