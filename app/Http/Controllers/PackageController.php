<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Dishes;
use App\Models\Package_categories;
use App\Models\Package_dishes;
use App\Models\Packages;
use App\Models\Quantity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Packages::where('package_status', 1)->get();
        return view('BackEnd.packages.add', compact('packages'));
    }

    public function quantity()
    {
        $dishes = Dishes::with('getQuantityDishRelation')->get();
    }

    public function active($id)
    {
        $packages = Packages::find($id);
        $packages->package_status = 1;
        $packages->save();

        return back();
    }

    public function Inactive($id)
    {
        $packages = Packages::find($id);
        $packages->package_status = 0;
        $packages->save();

        return back();
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
            'min_personnes' => 'required',
            'max_personnes' => 'required',
            'full_price' => 'required',
            'nb_personnes' => 'required',
            'max_personnes' => 'required',
            'package_status' => 'required',
        ]);
        /*
        if ($request->hasFile('image')) {
            //$imageName1 = $request->image->getClientOriginalName();
            $imageName = $request->image->store('public');
        }
        */
        //$package = Packages::find($request->id);
        $package = new Packages();

        $imageName = $request->file('image');

        if ($imageName) //si on a rempli le champ image
        {
            $img_name = $imageName->getClientOriginalName();
            $directory = "FrontEndSourceFile/package_img/";
            $imgUrl = $directory . $img_name;
            $imageName->move($directory, $img_name);

            $package->image = $imgUrl;
        }

        $package->title = $request->title;
        $package->subtitle = $request->subtitle;
        $package->package_status = $request->package_status;
        $package->min_personnes = $request->min_personnes;
        $package->max_personnes = $request->max_personnes;
        $package->full_price = $request->full_price;
        $package->nb_personnes = $request->nb_personnes;

        $package->save();
        $package->dishes()->sync($request->dishes);
        $package->categories()->sync($request->categories);



        return back()->with('sms', 'Package saved');
    }


    public function manage()
    {
        $packages = Packages::paginate(10);

        return view('BackEnd.packages.manage', compact('packages'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quantities = Quantity::where('id_package', $id)->get();

        $packages = Packages::with('dishes', 'categories')->where('id', $id)->get()->first();

        //$bb = $dishes->where('category_id', 3);

        return view('BackEnd.packages.edit', compact('packages', 'quantities'));
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
            'subtitle' => 'required',
            'min_personnes' => 'required',
            'max_personnes' => 'required',
            'full_price' => 'required',
            'nb_personnes' => 'required',
        ]);

        $package = Packages::find($id);
        $imageName = $request->file('image');

        if ($imageName) //si on a rempli le champ image
        {
            $img_name = $imageName->getClientOriginalName();
            $directory = "FrontEndSourceFile/package_img/";
            $imgUrl = $directory . $img_name;
            $imageName->move($directory, $img_name);

            $old_img = $package->image;
            if (file_exists($old_img)) {
                unlink($old_img);
            }
            $package->image = $imgUrl;
        }

        $package->title = $request->title;
        $package->subtitle = $request->subtitle;
        $package->min_personnes = $request->min_personnes;
        $package->max_personnes = $request->max_personnes;
        $package->full_price = $request->full_price;
        $package->nb_personnes = $request->nb_personnes;

        $package->dishes()->sync($request->dishes);
        $package->categories()->sync($request->categories);

        $name_package = 'id_package';
        $quantityData = Quantity::where($name_package, $id)->get();

        //**************   DISHES QUANTITIES  *********** 
        $str1 = 'dish_id';
        $t1 = $quantityData->where($str1, '!=', '')->pluck($str1)->toArray();
        $t2 = $request->dishes;
        if (empty($t1)) { //aucune valeur en BD
            if (!empty($t2)) {
                foreach ($t2 as $val) {
                    $addQuantity = new Quantity();
                    $addQuantity->dish_id = $val;
                    $addQuantity->id_package = $id;
                    $addQuantity->save();
                }
            }
        } elseif (((!empty($t1)) && ($t2) != null) && (count($t1) == count($t2))) {

            $i = 0;
            if (!empty($t2)) {
                foreach ($t2 as $dish) {
                    $addQuantity = Quantity::where($str1, $request->id_dish[$i])->where($name_package, $id)->get()->first();
                    $addQuantity->qty = $request->qty_dish[$i];
                    $addQuantity->save();
                    $i++;
                }
            }
        } else { //valeur incompletes en BD
            $i = 0;
            if (!empty($t2)) {
                foreach ($t2 as $dish) {
                    if (!in_array($dish, $t1)) {
                        $addQuantity = new Quantity();
                        $addQuantity->dish_id = $dish;
                        $addQuantity->qty = null;
                        $addQuantity->id_package = $id;
                        $addQuantity->save();
                        $i++;
                    }
                }
            }
        }

        //SUPPRESSION DES DONNEES SUPPLEMENTAIRE
        if ($t2 != null) {
            if (count($t1) > count($t2)) {
                if (!empty($t1)) {
                    foreach ($t1 as $dish) {
                        if (!in_array($dish, $t2)) { //on éfface les élément qui ne sont en BD et qui ne sont pas dans la selection
                            Quantity::where($str1, $dish)->where($name_package, $id)->delete();
                        }
                    }
                }
            }
        } else {
            if (!empty($t1)) {
                foreach ($t1 as $dish) {
                    Quantity::where($str1, $dish)->where($name_package, $id)->delete();
                }
            }
        }





        //**************   CATEGORIES QUANTITIES  *********** 

        $str1 = 'category_id';
        $t1 = $quantityData->where($str1, '!=', '')->pluck($str1)->toArray();
        $t2 = $request->categories;


        if (empty($t1)) { //aucune valeur en BD
            if (!empty($t2)) {
                foreach ($t2 as $val) {
                    $addQuantity = new Quantity();
                    $addQuantity->category_id = $val;
                    $addQuantity->id_package = $id;
                    $addQuantity->save();
                }
            }
        } elseif (((!empty($t1)) && ($t2 != null)) && (count($t1) == count($t2))) {
            $i = 0;
            //dd(count($t2));
            if (!empty($t2)) {
                foreach ($t2 as $cate) {

                    $addQuantity = Quantity::where($str1, $request->id_category[$i])->where($name_package, $id)->get()->first();
                    $addQuantity->qty = $request->qty_category[$i];
                    $addQuantity->save();
                    $i++;
                }
            }
        } else { //valeur incompletes en BD
            $i = 0;
            if (!empty($t2)) {
                foreach ($t2 as $cate) {
                    if (!in_array($cate, $t1)) {
                        $addQuantity = new Quantity();
                        $addQuantity->category_id = $cate;
                        $addQuantity->qty = null;
                        $addQuantity->id_package = $id;
                        $addQuantity->save();
                        $i++;
                    }
                }
            }
        }
        //SUPPRESSION DES DONNEES SUPPLEMENTAIRE
        if ($t2 != null) {
            if (count($t1) > count($t2)) {
                if (!empty($t1)) {
                    foreach ($t1 as $cate) {
                        if (!in_array($cate, $t2)) { //on éfface les élément qui ne sont en BD et qui ne sont pas dans la selection
                            Quantity::where($str1, $cate)->where($name_package, $id)->delete();
                        }
                    }
                }
            }
        } else {
            if (!empty($t1)) {
                foreach ($t1 as $cate) {
                    Quantity::where($str1, $cate)->where($name_package, $id)->delete();
                }
            }
        }

        $package->save();

        return back()->with('sms', 'Package updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Packages::where('id', $id)->delete();

        Package_categories::where('packages_id', $id)->delete();
        Package_dishes::where('packages_id', $id)->delete();

        Quantity::where('id_package', $id)->delete();

        return back()->with('sms', 'Package deleted');
    }
}
