<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.layouts.main');
    }


    public function active($id, $className)
    {
        $baseClass = 'App\Models\\' . $className;
        $model = $baseClass::findOrFail($id);
        $model->update(['is_active' => !$model->is_active]);

        if ($className == 'Category'){
            $model->services()->update(['is_active'=>$model->is_active]);
        }

        return back()->with('success', __('تم التحديث بنجاح'));
    }


    public function deletePhoto($id)
    {
        $photo = Media::findOrFail($id);
        $photo->delete();
        return response()->json([
            'status' => true,
            'id' => $photo->id,
        ]);
    }
}
