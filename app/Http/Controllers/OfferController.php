<?php

namespace App\Http\Controllers;

use App\Models\Dishes;
use App\Models\Offers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('BackEnd.offers.add');
    }


    public function active($id)
    {
        $offer = Offers::find($id);
        $offer->offer_status = 1;
        $offer->save();

        return back();
    }

    public function inactive($id)
    {
        $offer = Offers::find($id);
        $offer->offer_status = 0;
        $offer->save();

        return back();
    }




    public function save(Request $request)
    {
        $offer = new Offers();
        $offer->dish_id = $request->dish_id;
        $offer->title = $request->title;
        $offer->subtitle = $request->subtitle;

        $offer->offer_status = $request->offer_status;

        $offer->save();
        return back()->with('sms', 'Offers saved !');
    }

    public function manage()
    {
        $offers = Offers::paginate(10);

        return view('BackEnd.offers.manage', compact('offers'));
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
        //$al = Offers::where('offer_status', 1)->get();
        //$q = Offers::with('getOffersRelationDishes')->where('offer_status', 1)->get();
        //dd($q->getOffersRelationDishes->id); 1 7 3 4
        $offer = Offers::find($id);
        $offer->dish_id = $request->dish_id;
        $offer->title = $request->title;
        $offer->subtitle = $request->subtitle;

        $offer->save();

        return back()->with('sms', 'Offers updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($offers_id)
    {
        $offer = Offers::find($offers_id);
        $offer->delete();
        return back()->with('sms', 'Offers deleted');
    }
}
