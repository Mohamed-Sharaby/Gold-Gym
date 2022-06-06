<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BaseCollection;
use App\Http\Resources\OrderResource;
use App\Models\Appointment;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Service;
use App\Notifications\OrderStatusNotification;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = auth('api')->user()->orders()->when(\request('status'), function ($q) {
            $q->whereIn('status', \request('status'));
        })->latest()->paginate(10);
        return \responder::success(new BaseCollection($orders, OrderResource::class));
    }


    public function store(Request $request)
    {
        $inputs = $request->validate([
            'service_id' => 'required|exists:services,id',
            'appointment_id' => 'required|exists:appointments,id',
            'coupon' => 'sometimes|exists:coupons,code',
            'no_of_persons' => 'required|int',
            'payment_method' => 'required|in:cash,bank,card',
        ]);
        $service = Service::find($request['service_id']);
       // $inputs['price'] = $service->price;
        $appointment = Appointment::find($request['appointment_id']);
        $inputs['appointment_id'] = $appointment->id;
        $inputs['price'] = $service->price - ($service->price * $service->discount/100) ;
        $inputs['user_id'] = auth()->id();
        $tax = getsetting('tax');

        if ($request->has('coupon')) {
            $coupon = Coupon::whereCode($request['coupon'])->firstOrFail();
            $inputs['coupon_id'] = $coupon->id;
            $inputs['discount'] = $coupon->value * ($inputs['price'] * $inputs['no_of_persons']) / 100;
        }
        $inputs['tax'] = (($inputs['price'] * $inputs['no_of_persons']) - \Arr::get($inputs, 'discount', 0)) * $tax / 100;

        $order = Order::create($inputs)->refresh();
        return \responder::success(new OrderResource($order));

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function update(Request $request, Order $order)
    {
        if ($order->status != 'pending') return \responder::error(__('you can\'t cancel this order'));
        $order->update(['status' => 'canceled']);
        $order->user->notify(new OrderStatusNotification($order));
        return \responder::success(__('Order Canceled successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
