<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\OrdersDataTable;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use App\Notifications\OrderStatusNotification;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Orders');
    }


    public function index(OrdersDataTable $dataTable)
    {
        return $dataTable->render('dashboard.orders.index');
    }


    public function show(Order $order)
    {
        return view('dashboard.orders.show', compact('order'));
    }


    public function store(OrderRequest $request)
    {
        //
    }


    public function edit(Order $order)
    {
        return view('dashboard.orders.edit',[
            'order'=>$order,
            'users'=>User::pluck('name','id'),
            'services'=>Service::pluck('ar_name','id'),
            'appointments'=>Appointment::whereServiceId($order->service_id)->pluck('day','id'),
        ]);
    }


    public function update(Request $request, Order $order)
    {
        $request->validate([
            'user_id' => 'required|numeric|exists:users,id',
            'service_id' => 'required|numeric|exists:services,id',
            'appointment_id' => 'required|numeric|exists:appointments,id',
            'no_of_persons' => 'required|numeric',
           // 'payment_method' => 'required|in:cash,bank,card',
        ]);
        $order->update($request->all());
        return redirect()->route('admin.orders.index')->with('success','تم التعديل بنجاح');
    }


    public function destroy(Order $order)
    {
        $order->delete();
        return 'Done';
    }

    public function changeStatus(Request $request, Order $order)
    {
        $request->validate(['status' => 'required|in:pending,confirmed,rejected,canceled,finished']);

        $order->update(['status' => $request->status]);
        if ($request->status == 'finished'){
            $order->update(['finished_at' => now()]);
        }
        $order->user->notify(new OrderStatusNotification($order));
        return redirect()->back()->with('success', 'تم تغيير الحالة بنجاح');
    }
}
