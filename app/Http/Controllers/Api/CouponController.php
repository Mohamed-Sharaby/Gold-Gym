<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'coupon'=>'required|exists:coupons,code'
        ]);
        $coupon=Coupon::valid()->active()->where('code',$request['coupon'])->first();
        if (!$coupon){
            return  \responder::success('coupon is invalid');
        }
        return  \responder::success(['discount'=>$coupon->value]);
    }
}
