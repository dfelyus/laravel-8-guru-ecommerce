<?php

namespace App\Http\Controllers;

use App\Models\Delivery_boys;
use Illuminate\Http\Request;

class deliverBoyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('BackEnd.deliveryBoy.add');
    }


    public function activeBoy($delivery_boy_id)
    {
        $boy = Delivery_boys::find($delivery_boy_id);
        $boy->delivery_boy_status = 1;
        $boy->save();

        return back();
    }

    public function InactiveBoy($delivery_boy_id)
    {
        $boy = Delivery_boys::find($delivery_boy_id);
        $boy->delivery_boy_status = 0;
        $boy->save();

        return back();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_boy(Request $request)
    {
        $this->validate($request, [
            'delivery_boy_name' => 'required',
            'delivery_boy_phone_number' => 'required',
            'delivery_boy_password' => 'required',
            'delivery_boy_status' => 'required',
            'added_on' => 'required',
        ]);

        $boy = new Delivery_boys();

        $boy->delivery_boy_name = $request->delivery_boy_name;
        $boy->delivery_boy_phone_number = $request->delivery_boy_phone_number;
        $boy->delivery_boy_password = $request->delivery_boy_password;
        $boy->delivery_boy_status = $request->delivery_boy_status;
        $boy->added_on = $request->added_on;
        $boy->save();
        return back()->with('sms', 'Boy saved');
    }

    public function boy_manage()
    {
        $boys = Delivery_boys::paginate(10);
        return view('BackEnd.deliveryBoy.manage', compact('boys'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateBoy(Request $request, $delivery_boy_id)
    {
        $this->validate($request, [
            'delivery_boy_name' => 'required',
            'delivery_boy_phone_number' => 'required',
            'delivery_boy_password' => 'required',
            'added_on' => 'required',
        ]);

        $boy = Delivery_boys::find($delivery_boy_id);
        $boy->delivery_boy_name = $request->delivery_boy_name;
        $boy->delivery_boy_phone_number = $request->delivery_boy_phone_number;
        $boy->save();
        return redirect('admin/delivery/manage')->with('sms', 'Boy updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function boy_delete($delivery_boy_id)
    {
        $category = Delivery_boys::find($delivery_boy_id);
        $category->delete();
        return back()->with('sms', 'Deliver boy deleted');
    }
}
