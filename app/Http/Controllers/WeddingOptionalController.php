<?php

namespace App\Http\Controllers;

use App\Models\Wedding;
use Illuminate\Http\Request;

class WeddingOptionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($selectdb)
    {

        return view('BackEnd.wedding.optional.add', compact('selectdb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage($selectdb)
    {
        $wedding = Wedding::where('select', '=', $selectdb)->where('tab', '=', 'optional')->paginate(10);

        return view('BackEnd.wedding.optional.manage', compact('selectdb', 'wedding'));
    }

    public function delete($id, $selectdb)
    {


        $wedding = Wedding::find($id);
        $wedding->delete();
        return back()->with('sms', 'Optional wedding deleted');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request, $selectdb)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);


        $wedding = new Wedding();

        $wedding->title = $request->title;
        $wedding->subtitle = $request->subtitle;
        $wedding->description = $request->description;
        $wedding->price = $request->price;
        $wedding->select = $selectdb;
        $wedding->tab = "optional";

        $wedding->save();
        return back()->with('sms', 'Optional Wedding saved !');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $selectdb)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        //dd($selectdb);
        $wedding = Wedding::find($request->id);
        $wedding->title = $request->title;
        $wedding->subtitle = $request->subtitle;
        $wedding->description = $request->description;
        $wedding->price = $request->price;
        $wedding->select = $selectdb;
        $wedding->tab = "optional";

        $wedding->save();

        return redirect('admin/wedding_optional/manage/' . $selectdb)->with('sms', 'Optional Wedding updated');
    }
}
