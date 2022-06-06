<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Blogs');
    }


    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('dashboard.blogs.index', compact('blogs'));
    }


    public function create()
    {
        return view('dashboard.blogs.create');
    }


    public function store(BlogRequest $request)
    {
        $validator = $request->validated();
        DB::beginTransaction();
        $blog = Blog::create($validator);

        if ($request->has('photos')) {
            $blog->addMultipleMediaFromRequest(['photos'])->each(function ($fileAdder) {
                $fileAdder->toMediaCollection('photos');
            });
        }
        DB::commit();
        return redirect(route('admin.blogs.index'))->with('success', 'تم الاضافة بنجاح');
    }


    public function edit(Blog $blog)
    {
        return view('dashboard.blogs.edit', compact('blog'));
    }


    public function update(BlogRequest $request, Blog $blog)
    {
        $validator = $request->validated();
        if ($request->image) {
            if ($blog->image) {
                $image = str_replace(url('/') . '/storage/', '', $blog->image);
                deleteImage('uploads', $image);
            }
        }
        if ($request->has('photos')) {
            $blog->addMultipleMediaFromRequest(['photos'])->each(function ($fileAdder) {
                $fileAdder->toMediaCollection('photos');
            });
        }

        $blog->update($validator);
        return redirect(route('admin.blogs.index'))->with('success', 'تم التعديل بنجاح');
    }


    public function destroy(Blog $blog)
    {
        $blog->delete();
        return 'Done';
    }
}
