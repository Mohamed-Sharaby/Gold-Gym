<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Users');
    }


    public function index()
    {
        $users = User::latest()->get();
        return view('dashboard.users.index', compact('users'));
    }


    public function create()
    {
        return view('dashboard.users.create');
    }


    public function store(UserRequest $request)
    {
        $validator = $request->validated();
        User::create($validator);
        return redirect(route('admin.users.index'))->with('success', 'تم الاضافة بنجاح');
    }


    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }


    public function update(UserRequest $request, User $user)
    {
        $validator = $request->validated();
        if ($request->image) {
            if ($user->image) {
                $image = str_replace(url('/') . '/storage/', '', $user->image);
                deleteImage('uploads', $image);
            }
        }

        $user->update($validator);
        return redirect(route('admin.users.index'))->with('success', 'تم التعديل بنجاح');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return 'Done';
    }
}
