<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProviderRequest;
use App\Models\Category;
use App\Models\Provider;
use App\Models\Service;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Notification;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Providers');
    }


    public function index()
    {
        $providers = Provider::latest()->get();
        return view('dashboard.providers.index', compact('providers'));
    }


    public function create()
    {
        $categories = Category::active()->get();
        return view('dashboard.providers.create',compact('categories'));
    }


    public function store(ProviderRequest $request)
    {
        $validator = $request->validated();
        Provider::create($validator);
        return redirect(route('admin.providers.index'))->with('success', 'تم الاضافة بنجاح');
    }


    public function edit(Provider $provider)
    {
        $categories = Category::all();
        return view('dashboard.providers.edit', compact('provider','categories'));
    }


    public function update(ProviderRequest $request, Provider $provider)
    {
        $validator = $request->validated();
        if ($request->image) {
            if ($provider->image) {
                deleteImage('uploads', $provider->image);
            }
        }
        if ($request->photos){
            if ($provider->photos) {
                foreach ((array)$provider->photos as $photo) {
                    deleteImage('uploads', $photo);
                }
            }
        }

        $provider->update($validator);
        return redirect(route('admin.providers.index'))->with('success', 'تم التعديل بنجاح');
    }


    public function destroy(Provider $provider)
    {
        $provider->delete();
        return 'Done';
    }

    public function showNotifications()
    {
        return view('dashboard.providers.notifications.index', ['notifications' => DatabaseNotification::where('notifiable_type','App\Models\Provider')->latest()->paginate(12)]);
    }

    public function createNotifications()
    {
        $providers = Provider::active()->get();
        return view('dashboard.providers.notifications.create',compact('providers'));
    }


    public function sendNotifications(Request $request)
    {
        $request->validate([
            'providers' => 'required|array',
            'title' => 'required',
            'body' => 'required',
        ]);
        $data = $request->except('_token');
        $providers = Provider::whereIn('id', $data['providers'])->get();
        foreach ($providers as $provider) {
            Notification::send($provider, new GeneralNotification([
                'title' => $data['title'],
                'body' => $data['body'],
            ]));
        }

        return redirect(route('admin.providers.notifications'))->with('success', 'تم ارسال الاشعار بنجاح');
    }


    public function destroyNotifications($id)
    {
        $notification = DatabaseNotification::findOrFail($id);
        $notification->delete();
        return 'Done';
    }

    public function getServices($id)
    {
        $category = Category::active()->findOrFail($id);
        $services = Service::whereCategoryId($category->id)->pluck('ar_name','id');
        return response()->json($services);
    }
}
