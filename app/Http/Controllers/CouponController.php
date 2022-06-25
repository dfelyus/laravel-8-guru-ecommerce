<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('BackEnd.coupon.addCoupon');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function coupon_manage()
    {
        $coupons = Coupon::paginate(10);

        return view('BackEnd.coupon.manageCoupon', compact('coupons'));
    }

    public function activeCoupon($coupon_id)
    {
        $coupons = Coupon::find($coupon_id);
        $coupons->coupon_status = 1;
        $coupons->save();

        return back();
    }

    public function InactiveCoupon($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $coupon->coupon_status = 0;
        $coupon->save();

        return back();
    }

    public function coupon_delete($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        return back()->with('sms', 'Coupon deleted');;
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_coupon(Request $request)
    {
        $this->validate($request, [
            'coupon_code' => 'required',
            'coupon_type' => 'required',
            'coupon_value' => 'required',
            'coupon_status' => 'required',
            'cart_min_value' => 'required',
            'expired_on' => 'required',
            'added_on' => 'required',
        ]);

        $coupon = new Coupon();
        $coupon->coupon_code = $request->coupon_code;
        $coupon->coupon_type = $request->coupon_type;
        $coupon->coupon_value = $request->coupon_value;
        $coupon->coupon_status = $request->coupon_status;
        $coupon->cart_min_value = $request->cart_min_value;
        $coupon->expired_on = $request->expired_on;
        $coupon->added_on = $request->added_on;
        $coupon->save();
        return back()->with('sms', 'Coupon saved !');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCoupon(Request $request, $coupon_id)
    {
        $this->validate($request, [
            'coupon_type' => 'required',
            'coupon_value' => 'required',
            'cart_min_value' => 'required',
        ]);

        $coupon = Coupon::find($coupon_id);
        $coupon->coupon_type = $request->coupon_type;
        $coupon->coupon_value = $request->coupon_value;
        $coupon->cart_min_value = $request->cart_min_value;
        $coupon->save();
        return back()->with('sms', 'Coupon updated');
    }
}
