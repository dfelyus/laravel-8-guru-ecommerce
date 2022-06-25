<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::where('image_status', 1)->get();
        return view('BackEnd.images.add', compact('images'));
    }


    public function active($id)
    {
        $gallery = Image::find($id);
        $gallery->image_status = 1;
        $gallery->save();

        return back();
    }

    public function Inactive($id)
    {
        $gallery = Image::find($id);
        $gallery->image_status = 0;
        $gallery->save();

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
            'image' => 'required',
            'image_status' => 'required',
        ]);

        $gallery = $request->file('image');

        $image = $gallery->getClientOriginalName();

        $directory = "BackEndSourceFile/images_img/";
        $imgUrl = $directory . $image;

        $gallery->move($directory, $image);

        $galleries = new Image();

        $galleries->image = $imgUrl;

        $galleries->image_status = $request->image_status;

        $galleries->save();
        return back()->with('sms', 'Image saved');
    }

    public function manage()
    {
        $images = Image::paginate(10);

        return view('BackEnd.images.manage', compact('images'));
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
        $images = Image::find($id);

        //data for images
        $image = $request->file('image');


        //bg
        if ($image) //si on a rempli le champ image
        {
            $img_name = $image->getClientOriginalName();
            $directory = "BackEndSourceFile/images_img/";
            $imgUrl = $directory . $img_name;
            $image->move($directory, $img_name);

            $old_img = $images->image;
            if (file_exists($old_img)) {
                unlink($old_img);
            }
            $images->image = $imgUrl;
        }
        $images->save();

        return redirect('admin/images/manage')->with('sms', 'Image updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $images = Image::find($id);
        $images->delete();
        return back()->with('sms', 'Image deleted');
    }
}
