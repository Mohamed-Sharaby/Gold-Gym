<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ServicesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Services');
    }


    public function index(ServicesDataTable $dataTable)
    {
        return $dataTable->render('dashboard.services.index');
    }


    public function create()
    {
        return view('dashboard.services.create');
    }


    public function store(ServiceRequest $request)
    {
        $validator = $request->validated();
        DB::beginTransaction();
        $service = Service::create($validator);
        if ($request->has('photos')) {
            $service->addMultipleMediaFromRequest(['photos'])->each(function ($fileAdder) {
                $fileAdder->toMediaCollection('photos');
            });
        }
        DB::commit();
        return redirect(route('admin.services.index'))->with('success', 'تم الاضافة بنجاح');
    }

    public function show(Service $service)
    {
        return view('dashboard.services.show', compact('service'));
    }


    public function edit(Service $service)
    {
        return view('dashboard.services.edit', compact('service'));
    }


    public function update(ServiceRequest $request, Service $service)
    {

        $validator = $request->validated();
        if ($request->image) {
            if ($service->image) {
                $image = str_replace(url('/') . '/storage/', '', $service->image);
                deleteImage('uploads', $image);
            }
        }
        if ($request->has('photos')) {
            $service->addMultipleMediaFromRequest(['photos'])->each(function ($fileAdder) {
                $fileAdder->toMediaCollection('photos');
            });
        }

        $service->update($validator);
        return redirect(route('admin.services.index'))->with('success', 'تم التعديل بنجاح');
    }


    public function destroy(Service $service)
    {
        $service->delete();
        return 'Done';
    }
}
