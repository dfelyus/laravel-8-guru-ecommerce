<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Dishes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Categories::where('category_status', 1)->get();
        return view('BackEnd.dish.add', compact('category'));
    }


    public function activeDish($dish_id)
    {
        $dish = Dishes::find($dish_id);
        $dish->dish_status = 1;
        $dish->save();

        return back();
    }

    public function InactiveDish($dish_id)
    {
        $dish = Dishes::find($dish_id);
        $dish->dish_status = 0;
        $dish->save();

        return back();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_Dish(Request $request)
    {
        $this->validate($request, [
            'dish_name' => 'required',
            'category_id' => 'required',
            'dish_detail' => 'required',
            'dish_status' => 'required',
            'full_price' => 'required',
            'half_price' => 'required',
        ]);

        $imgName = $request->file('dish_image');
        $image = $imgName->getClientOriginalName();
        $directory = "BackEndSourceFile/dish_img/";
        $imgUrl = $directory . $image;
        $imgName->move($directory, $image);

        $dish = new Dishes();

        $dish->dish_name = $request->dish_name;
        $dish->category_id = $request->category_id;
        $dish->dish_detail = $request->dish_detail;
        $dish->dish_image = $imgUrl;
        $dish->dish_status = $request->dish_status;

        $dish->full_price = $request->full_price;
        $dish->half_price = $request->half_price;
        $dish->qty = $request->qty;

        $dish->save();
        return back()->with('sms', 'Dish saved');
    }

    public function dish_manage()
    {

        $dishes = DB::table('dishes')
            ->join('categories', 'dishes.category_id', '=', 'categories.id')
            ->select('dishes.*', 'categories.category_name', 'categories.id as id_cate')
            ->paginate(10);
        //dd($dishes);
        //$dishes = Dishes::with('getCategoryRelation')->get();
        return view('BackEnd.dish.manage', compact('dishes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDish(Request $request, $id)
    {

        $dish = Dishes::find($id);

        $img_main = $request->file('dish_image');

        $addOn = $request->added_on;

        if ($img_main) //si on a rempli le champ image
        {
            $img_name = $img_main->getClientOriginalName();
            $directory = "BackEndSourceFile/dish_img/";
            $imgUrl = $directory . $img_name;
            $img_main->move($directory, $img_name);

            $old_img = $dish->dish_image;
            if (file_exists($old_img)) {
                unlink($old_img);
            }

            $dish->dish_name = $request->dish_name;
            $dish->dish_detail = $request->dish_detail;
            $dish->category_id = $request->category_id;
            $dish->dish_image = $imgUrl;
            $dish->added_on = $request->added_on;
        } elseif ($addOn) //si on a rempli le champ date
        {
            $dish->added_on = $request->added_on;
        }
        $dish->dish_name = $request->dish_name;
        $dish->dish_detail = $request->dish_detail;
        $dish->category_id = $request->category_id;

        $dish->full_price = $request->full_price;
        $dish->half_price = $request->half_price;
        $dish->qty = $request->qty;


        $dish->save();

        return redirect('admin/dish/manage')->with('sms', 'Dish updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dish_delete($dish_id)
    {
        $dish = Dishes::find($dish_id);
        $dish->delete();
        return back()->with('sms', 'Dish deleted');
    }
}
