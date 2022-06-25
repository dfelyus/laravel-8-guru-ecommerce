<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Contact;
use App\Models\Dishes;
use App\Models\Gallery;
use App\Models\Image;
use App\Models\Packages;
use App\Models\Quantity;
use App\Models\Testimonial;
use App\Models\Trays;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PDF;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dishes::where('dish_status', 1)->get();

        return view('FrontEnd.pages.home', compact('dishes'));
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'q' => 'required|min:3',
        ]);

        $dishes_search = Dishes::where('dish_name', 'like', "%$request->q%")
            ->orWhere('dish_detail', 'like', "%$request->q%")
            ->paginate(6);
        return view('FrontEnd.pages.search', compact('dishes_search'));
    }

    public function products(Request $request)
    {

        $categoryDish = Dishes::with('getCategoryRelation')
            ->paginate(15);
        return view('FrontEnd.pages.products_present', compact('categoryDish'));
    }

    public function search_offers($offer)
    {

        $offers_search = Dishes::where('dish_name', 'like', "$offer")->get()->first();
        //dd($dishes_search);
        return view('FrontEnd.pages.search_offers', compact('offers_search'));
    }


    public function catering()
    {
        $packages = Packages::where('package_status', 1)->get();

        $quantities = Quantity::all();

        $wedding = Wedding::all();

        $trays = Trays::where('tray_status', 1)->get();

        return view('FrontEnd.pages.catering', compact('wedding', 'packages', 'trays', 'quantities'));
    }


    public function menu()
    {
        $packages = Packages::where('package_status', 1)->paginate(3);

        $quantities = Quantity::all();
        $all_dishes = Dishes::where('dish_status', 1)->paginate(10);

        $trays = Trays::where('tray_status', 1)->get();

        return view('FrontEnd.pages.menu', compact('packages', 'trays', 'quantities', 'all_dishes'));
    }

    public function contact_us()
    {
        $contact = Contact::where('contact_status', 1)->paginate(6);

        return view('FrontEnd.pages.about_us', compact('contact'));
    }



    public function download_menu_part($slug)
    {
        //dd($slug);
        $packages = Packages::where('package_status', 1)->get();

        $quantities = Quantity::all();

        $trays = Trays::where('tray_status', 1)->get();

        //return view('FrontEnd.include.home', compact('dishes'));

        $pdf = PDF::loadView('FrontEnd.pages.menu_download', compact('packages', 'trays', 'quantities', 'slug'));

        return $pdf->stream('menu_download.pdf');
    }

    public function gallery_show()
    {
        $gallery = Gallery::where('gallery_status', 1)->cursorPaginate(12);
        $posts = Testimonial::where('post_status', 1)->get();
        return view('FrontEnd.pages.banquet_facility', compact('gallery', 'posts'));
    }


    public function images()
    {
        $image = Image::where('image_status', 1)->paginate(12);
        return view('FrontEnd.pages.gallery', compact('image'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dish_show($id)
    {
        $categoryDish = Dishes::where('category_id', $id)
            ->where('dish_status', 1)
            ->paginate(12);
        if ($categoryDish->first() != null) {
            $dish_id = $categoryDish->first();
            $dish_id = $dish_id->id;
            return view('FrontEnd.pages.products', compact('categoryDish', 'dish_id'));
        }
        Session::flash('choose', 'Oooops This Collection Is Empty...  ! Please select another category.');
        return view('FrontEnd.pages.menu_products');
    }

    public function dish_shows($id, $dish_id)
    {
        $categoryDish = Dishes::where('category_id', $id)
            ->where('dish_status', 1)
            ->paginate(3);
        return view('FrontEnd.pages.products', compact('categoryDish', 'dish_id'));
    }
}
