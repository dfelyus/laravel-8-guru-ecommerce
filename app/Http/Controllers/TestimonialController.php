<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Testimonial::where('post_status', 1)->get();
        return view('BackEnd.post.add', compact('posts'));
    }


    public function active($id)
    {
        $posts = Testimonial::find($id);
        $posts->post_status = 1;
        $posts->save();

        return back();
    }

    public function Inactive($id)
    {
        $posts = Testimonial::find($id);
        $posts->post_status = 0;
        $posts->save();

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
            'name' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'subject' => 'required',
            'post_status' => 'required',
            'image' => 'required',
        ]);

        $posts = $request->file('image');

        $image = $posts->getClientOriginalName();

        $directory = "BackEndSourceFile/posts_img/";
        $imgUrl = $directory . $image;

        $posts->move($directory, $image);

        $testimonials = new Testimonial();

        $testimonials->image = $imgUrl;

        $testimonials->name = $request->name;
        $testimonials->title = $request->title;
        $testimonials->subtitle = $request->subtitle;
        $testimonials->subject = $request->subject;
        $testimonials->post_status = $request->post_status;

        $testimonials->save();
        return back()->with('sms', 'Post saved');
    }

    public function manage()
    {
        $posts = Testimonial::paginate(10);

        return view('BackEnd.post.manage', compact('posts'));
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
            'name' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'subject' => 'required',
            'image' => 'required',
        ]);

        $posts = Testimonial::find($id);
        //data for images
        $image = $request->file('image');
        //bg
        if ($image) //si on a rempli le champ image
        {
            $img_name = $image->getClientOriginalName();
            $directory = "BackEndSourceFile/gallery_img/";
            $imgUrl = $directory . $img_name;
            $image->move($directory, $img_name);

            $old_img = $posts->image;
            if (file_exists($old_img)) {
                unlink($old_img);
            }
            $posts->image = $imgUrl;
        }
        //string values

        $posts->name = $request->name;
        $posts->title = $request->title;
        $posts->subtitle = $request->subtitle;
        $posts->subject = $request->subject;

        $posts->save();

        return redirect('admin/post/manage')->with('sms', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $posts = Testimonial::find($id);
        $posts->delete();
        return back()->with('sms', 'Post deleted');
    }
}
