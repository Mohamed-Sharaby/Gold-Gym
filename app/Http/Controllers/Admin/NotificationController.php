<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Traits\FireBase;
use App\Models\User;
use App\Notifications\GeneralNotification;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Notifications');
    }


    public function index()
    {
        return view('dashboard.users.notifications.index', ['notifications' => DatabaseNotification::where('notifiable_type','App\Models\User')->latest()->paginate(12)]);
    }


    public function create()
    {
       // $users = User::active()->get();
       // return view('dashboard.users.notifications.create',compact('users'));
        return view('dashboard.users.notifications.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
          //  'users' => 'required|array',
            'title' => 'required',
            'body' => 'required',
        ]);

        FireBase::sendFCMTopic("/topics/general",$data['title'],$data['body'],$data);

        return redirect()->back()->with('success', 'تم ارسال الاشعار بنجاح');
    }


    public function destroy($id)
    {
        $notification = DatabaseNotification::findOrFail($id);
        $notification->delete();
        return 'Done';
    }
}
