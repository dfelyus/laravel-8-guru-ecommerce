<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('BackEnd.category.addCategory');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage()
    {
        $categories = Categories::paginate(10);

        return view('BackEnd.category.manageCategory', compact('categories'));
    }

    public function active($category_id)
    {
        $category = Categories::find($category_id);
        $category->category_status = 1;
        $category->save();

        return back();
    }

    public function Inactive($category_id)
    {
        $category = Categories::find($category_id);
        $category->category_status = 0;
        $category->save();

        return back();
    }

    public function delete($category_id)
    {
        $category = Categories::find($category_id);
        $category->delete();
        return back()->with('sms', 'Category deleted');;
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
            'category_name' => 'required',
            'order_number' => 'required',
            'category_status' => 'required',
        ]);


        $category = new Categories();
        $category->category_name = $request->category_name;
        $category->order_number = $request->order_number;
        $category->category_status = $request->category_status;
        $category->added_on = $request->added_on;
        $category->save();
        return back()->with('sms', 'Category saved !');
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
            'category_name' => 'required',
            'order_number' => 'required',
        ]);

        $this->validate($request, [
            'title' => 'required',
            'min_personnes' => 'required',
            'max_personnes' => 'required',
            'full_price' => 'required',
            'nb_personnes' => 'required',
            'max_personnes' => 'required',
        ]);


        $category = Categories::find($id);
        $category->category_name = $request->category_name;
        $category->order_number = $request->order_number;
        $category->save();
        return redirect('admin/category/manage')->with('sms', 'Category updated');
    }
}
