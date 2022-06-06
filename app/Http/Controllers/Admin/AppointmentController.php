<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentRequest;
use App\Http\Requests\ServiceRequest;
use App\Models\Appointment;
use App\Models\Service;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Services');
    }


    public function index(Request $request)
    {
        $service = Service::findOrFail($request->service);
        $appointments = Appointment::withoutGlobalScope('expire')->whereServiceId($service->id)->get();
        return view('dashboard.appointments.index', compact('service','appointments'));
    }


    public function create(Request $request)
    {
        $service = Service::findOrFail($request->service);
        return view('dashboard.appointments.create',compact('service'));
    }


    public function store(AppointmentRequest $request)
    {
        $service = Service::findOrFail($request->service_id);
        $validator = $request->validated();
        $validator['service_id'] = $service->id;
        Appointment::create($validator);
        return redirect(route('admin.appointments.index',['service'=>$service]))->with('success', 'تم الاضافة بنجاح');
    }


    public function edit($id)
    {
        $appointment = Appointment::withoutGlobalScope('expire')->findOrFail($id);
        return view('dashboard.appointments.edit', compact('appointment'));
    }


    public function update(AppointmentRequest $request, $id)
    {
        $appointment = Appointment::withoutGlobalScope('expire')->findOrFail($id);
        $validator = $request->validated();
        $appointment->update($validator);
        return redirect(route('admin.appointments.index',['service'=>$appointment->service_id]))->with('success', 'تم التعديل بنجاح');
    }


    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return 'Done';
    }
}
