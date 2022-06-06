<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\OurServices;
use App\Models\OurWork;
use Illuminate\Http\Request;

class LandingClientController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('permission:Banners');
//    }


    public function index()
    {
        $clients = Client::latest()->get();
        return view('dashboard.landing.clients.index', compact('clients'));
    }


    public function create()
    {
        return view('dashboard.landing.clients.create');
    }


    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',
        ]);
        Client::create($validator);
        return redirect(route('admin.clients.index'))->with('success', 'تم الاضافة بنجاح');
    }


    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('dashboard.landing.clients.edit', compact('client'));
    }


    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'sometimes|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',
        ]);
        if ($request->image) {
            if ($client->image) {
                $image = str_replace(url('/') . '/storage/', '', $client->image);
                deleteImage('uploads', $image);
            }
        }

        $client->update($validator);
        return redirect(route('admin.clients.index'))->with('success', 'تم التعديل بنجاح');
    }


    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return 'Done';
    }
}
