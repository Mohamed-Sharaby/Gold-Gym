<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Http\Requests\OfferRequest;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Coupons');
    }


    public function index()
    {
        $coupons = Coupon::all();
        return view('dashboard.coupons.index', compact('coupons'));
    }


    public function create()
    {
        return view('dashboard.coupons.create');
    }


    public function store(CouponRequest $request)
    {
        $validator = $request->validated();
        Coupon::create($validator);
        return redirect(route('admin.coupons.index'))->with('success', 'تم الاضافة بنجاح');
    }


    public function edit(Coupon $coupon)
    {
        return view('dashboard.coupons.edit', compact('coupon'));
    }


    public function update(CouponRequest $request, Coupon $coupon)
    {
        $validator = $request->validated();
        $coupon->update($validator);
        return redirect(route('admin.coupons.index'))->with('success', 'تم التعديل بنجاح');
    }


    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return 'Done';
    }
}
