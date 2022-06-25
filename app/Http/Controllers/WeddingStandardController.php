<?php

namespace App\Http\Controllers;

use App\Models\Choice_of;
use App\Models\Cocktail_hour;
use App\Models\Deluxe_wedding;
use App\Models\Dessert;
use App\Models\Extra;
use App\Models\Per_person;
use App\Models\Wedding;
use App\Models\Wedding_buffet;
use Illuminate\Http\Request;

class WeddingStandardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($selectdb)
    {

        return view('BackEnd.wedding.standards.add', compact('selectdb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage($selectdb)
    {
        $wedding = Wedding::where('select', '=', $selectdb)->where('tab', '=', 'standards')->paginate(10);

        return view('BackEnd.wedding.standards.manage', compact('selectdb', 'wedding'));
    }

    public function delete($id, $selectdb)
    {


        $wedding = Wedding::find($id);

        $wedding->delete();
        return back()->with('sms', 'Standards wedding deleted');
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
            'title' => 'required',
        ]);


        $wedding = new Wedding();

        $wedding->title = $request->title;
        $wedding->subtitle = $request->subtitle;
        $wedding->description = $request->description;
        $wedding->select = $selectdb;
        $wedding->tab = "standards";

        $wedding->save();
        return back()->with('sms', 'Standards Wedding saved !');
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
            'title' => 'required',
        ]);

        //dd($selectdb);
        $wedding = Wedding::find($request->id);
        $wedding->title = $request->title;
        $wedding->subtitle = $request->subtitle;
        $wedding->description = $request->description;
        $wedding->select = $selectdb;
        $wedding->tab = "standards";

        $wedding->save();

        return redirect('admin/wedding_standards/manage/' . $selectdb)->with('sms', 'Standard Wedding updated');
    }
}
