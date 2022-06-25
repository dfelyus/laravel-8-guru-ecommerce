<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::where('gallery_status', 1)->get();
        return view('BackEnd.gallery.add', compact('gallery'));
    }


    public function active($id)
    {
        $gallery = Gallery::find($id);
        $gallery->gallery_status = 1;
        $gallery->save();

        return back();
    }

    public function Inactive($id)
    {
        $gallery = Gallery::find($id);
        $gallery->gallery_status = 0;
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
            'filter' => 'required',
            'gallery_status' => 'required',
        ]);

        $gallery = $request->file('image');

        $image = $gallery->getClientOriginalName();

        $directory = "BackEndSourceFile/gallery_img/";
        $imgUrl = $directory . $image;

        $gallery->move($directory, $image);

        $galleries = new Gallery();

        $galleries->image = $imgUrl;

        $galleries->filter = $request->filter;

        $galleries->gallery_status = $request->gallery_status;

        $galleries->save();
        return back()->with('sms', 'Gallery saved');
    }

    public function manage()
    {
        $gallery = Gallery::paginate(10);

        return view('BackEnd.gallery.manage', compact('gallery'));
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
            'image' => 'required',
            'filter' => 'required',
        ]);

        $gallery = Gallery::find($id);

        //data for images
        $image = $request->file('image');


        //bg
        if ($image) //si on a rempli le champ image
        {
            $img_name = $image->getClientOriginalName();
            $directory = "BackEndSourceFile/gallery_img/";
            $imgUrl = $directory . $img_name;
            $image->move($directory, $img_name);

            $old_img = $gallery->image;
            if (file_exists($old_img)) {
                unlink($old_img);
            }
            $gallery->image = $imgUrl;
        }
        //string values

        $gallery->filter = $gallery->filter;

        $gallery->save();

        return redirect('admin/gallery/manage')->with('sms', 'Image updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $gallery = Gallery::find($id);
        $gallery->delete();
        return back()->with('sms', 'Image deleted');
    }
}
