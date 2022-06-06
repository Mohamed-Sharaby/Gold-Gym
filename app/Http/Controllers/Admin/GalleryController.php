<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\GalleryRequest;
use App\Models\Blog;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Galleries');
    }


    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('dashboard.galleries.index', compact('galleries'));
    }


    public function create()
    {
        return view('dashboard.galleries.create');
    }


    public function store(GalleryRequest $request)
    {
        $validator = $request->validated();
        Gallery::create($validator);
        return redirect(route('admin.galleries.index'))->with('success', 'تم الاضافة بنجاح');
    }


    public function edit(Gallery $gallery)
    {
        return view('dashboard.galleries.edit', compact('gallery'));
    }


    public function update(GalleryRequest $request, Gallery $gallery)
    {
        $validator = $request->validated();
        if ($request->image) {
            if ($gallery->image) {
                $image = str_replace(url('/') . '/storage/', '', $gallery->image);
                deleteImage('uploads', $image);
            }
        }
        $gallery->update($validator);
        return redirect(route('admin.galleries.index'))->with('success', 'تم التعديل بنجاح');
    }


    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return 'Done';
    }
}
