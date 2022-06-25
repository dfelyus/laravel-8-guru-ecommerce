<?php

namespace App\Http\Controllers;

use App\Models\Trays;
use Illuminate\Http\Request;

class TrayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('BackEnd.tray.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage()
    {
        $trays = Trays::paginate(10);

        return view('BackEnd.tray.manage', compact('trays'));
    }

    public function active($id)
    {
        $trays = Trays::find($id);
        $trays->tray_status = 1;
        $trays->save();

        return back();
    }

    public function Inactive($id)
    {
        $trays = Trays::find($id);
        $trays->tray_status = 0;
        $trays->save();

        return back();
    }

    public function delete($id)
    {
        $trays = Trays::find($id);
        $trays->delete();
        return back()->with('sms', 'Tray deleted');;
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'small' => 'required',
            'medium' => 'required',
            'semi_large' => 'required',
            'large' => 'required',
            'extra_large' => 'required',
            'tray_status' => 'required',
        ]);

        $trays = new Trays();
        $trays->title = $request->title;
        $trays->small = $request->small;
        $trays->medium = $request->medium;
        $trays->semi_large = $request->semi_large;
        $trays->large = $request->large;
        $trays->extra_large = $request->extra_large;
        $trays->tray_status = $request->tray_status;
        $trays->save();
        return back()->with('sms', 'Trays saved !');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required',
            'small' => 'required',
            'medium' => 'required',
            'semi_large' => 'required',
            'large' => 'required',
            'extra_large' => 'required',
        ]);

        $trays = Trays::find($id);
        $trays->title = $request->title;
        $trays->small = $request->small;
        $trays->medium = $request->medium;
        $trays->semi_large = $request->semi_large;
        $trays->large = $request->large;
        $trays->extra_large = $request->extra_large;
        $trays->save();
        return redirect('admin/tray/manage')->with('sms', 'Tray updated');
    }
}
