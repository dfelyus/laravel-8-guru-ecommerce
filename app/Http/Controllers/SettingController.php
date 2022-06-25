<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Settings::where('setting_status', 1)->get();
        return view('BackEnd.setting.add', compact('setting'));
    }


    public function activeSetting($id)
    {
        $setting = Settings::find($id);
        $setting->setting_status = 1;
        $setting->save();

        return back();
    }

    public function InactiveSetting($id)
    {
        $setting = Settings::find($id);
        $setting->setting_status = 0;
        $setting->save();

        return back();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_settings(Request $request)
    {
        $this->validate($request, [
            'bg' => 'required',
            'logo' => 'required',
            'imageslide1' => 'required',
            'imageslide2' => 'required',
            'imageslide3' => 'required',
            'footerlogo' => 'required',
            'about_us_image' => 'required',
            'phone_number' => 'required',
            'Header_message' => 'required',
            'about_us' => 'required',
            'our_menu' => 'required',
            'setting_status' => 'required',
            'terms_conditions' => 'required',
        ]);

        $bg = $request->file('bg');
        $logo = $request->file('logo');
        $imageslide1 = $request->file('imageslide1');
        $imageslide2 = $request->file('imageslide2');
        $imageslide3 = $request->file('imageslide3');
        $footerlogo = $request->file('footerlogo');
        $about_us_image = $request->file('about_us_image');

        $image1 = $bg->getClientOriginalName();
        $image2 = $logo->getClientOriginalName();
        $image3 = $imageslide1->getClientOriginalName();
        $image4 = $imageslide2->getClientOriginalName();
        $image5 = $imageslide3->getClientOriginalName();
        $image6 = $footerlogo->getClientOriginalName();
        $image7 = $about_us_image->getClientOriginalName();

        $directory = "BackEndSourceFile/setting_img/";
        $imgUrl1 = $directory . $image1;
        $imgUrl2 = $directory . $image2;
        $imgUrl3 = $directory . $image3;
        $imgUrl4 = $directory . $image4;
        $imgUrl5 = $directory . $image5;
        $imgUrl6 = $directory . $image6;
        $imgUrl7 = $directory . $image7;

        $bg->move($directory, $image1);
        $logo->move($directory, $image2);
        $imageslide1->move($directory, $image3);
        $imageslide2->move($directory, $image4);
        $imageslide3->move($directory, $image5);
        $footerlogo->move($directory, $image6);
        $about_us_image->move($directory, $image7);


        $setting = new Settings();

        $setting->bg = $imgUrl1;
        $setting->logo = $imgUrl2;
        $setting->imageslide1 = $imgUrl3;
        $setting->imageslide2 = $imgUrl4;
        $setting->imageslide3 = $imgUrl5;
        $setting->footerlogo = $imgUrl6;
        $setting->about_us_image = $imgUrl7;

        $setting->phone_number = $request->phone_number;
        $setting->setting_status = $request->setting_status;
        $setting->Header_message = $request->Header_message;
        $setting->about_us = $request->about_us;
        $setting->our_menu = $request->our_menu;
        $setting->terms_conditions = $request->terms_conditions;
        $setting->map = $request->map;

        $setting->save();
        return back()->with('sms', 'Settings saved');
    }

    public function setting_manage()
    {
        $setting = Settings::paginate(1);

        return view('BackEnd.setting.manage', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_setting(Request $request, $id)
    {
        $this->validate($request, [
            'phone_number' => 'required',
            'Header_message' => 'required',
            'about_us' => 'required',
            'our_menu' => 'required',
            'terms_conditions' => 'required',
        ]);

        $setting = Settings::find($id);

        //data for images
        $bg = $request->file('bg');
        $logo = $request->file('logo');
        $footerlogo = $request->file('footerlogo');
        $imageslide1 = $request->file('imageslide1');
        $imageslide2 = $request->file('imageslide2');
        $imageslide3 = $request->file('imageslide3');
        $about_us_image = $request->file('about_us_image');

        //about_us_image
        if ($about_us_image) //si on a rempli le champ image
        {
            $img_name = $about_us_image->getClientOriginalName();
            $directory = "BackEndSourceFile/setting_img/";
            $imgUrl = $directory . $img_name;
            $about_us_image->move($directory, $img_name);

            $old_img = $setting->about_us_image;
            if (file_exists($old_img)) {
                unlink($old_img);
            }
            $setting->about_us_image = $imgUrl;
        }
        //bg
        if ($bg) //si on a rempli le champ image
        {
            $img_name = $bg->getClientOriginalName();
            $directory = "BackEndSourceFile/setting_img/";
            $imgUrl = $directory . $img_name;
            $bg->move($directory, $img_name);

            $old_img = $setting->bg;
            if (file_exists($old_img)) {
                unlink($old_img);
            }
            $setting->bg = $imgUrl;
        }
        //logo
        if ($logo) //si on a rempli le champ image
        {
            $img_name = $logo->getClientOriginalName();
            $directory = "BackEndSourceFile/setting_img/";
            $imgUrl = $directory . $img_name;
            $logo->move($directory, $img_name);

            $old_img = $setting->logo;
            if (file_exists($old_img)) {
                unlink($old_img);
            }
            $setting->logo = $imgUrl;
        }
        //footerlogo
        if ($footerlogo) //si on a rempli le champ image
        {
            $img_name = $footerlogo->getClientOriginalName();
            $directory = "BackEndSourceFile/setting_img/";
            $imgUrl = $directory . $img_name;
            $footerlogo->move($directory, $img_name);

            $old_img = $setting->footerlogo;
            if (file_exists($old_img)) {
                unlink($old_img);
            }
            $setting->footerlogo = $imgUrl;
        }
        //imageslide1
        if ($imageslide1) //si on a rempli le champ image
        {
            $img_name = $imageslide1->getClientOriginalName();
            $directory = "BackEndSourceFile/setting_img/";
            $imgUrl = $directory . $img_name;
            $imageslide1->move($directory, $img_name);

            $old_img = $setting->imageslide1;
            if (file_exists($old_img)) {
                unlink($old_img);
            }
            $setting->imageslide1 = $imgUrl;
        }
        //imageslide2
        if ($imageslide2) //si on a rempli le champ image
        {
            $img_name = $imageslide2->getClientOriginalName();
            $directory = "BackEndSourceFile/setting_img/";
            $imgUrl = $directory . $img_name;
            $imageslide2->move($directory, $img_name);

            $old_img = $setting->imageslide2;
            if (file_exists($old_img)) {
                unlink($old_img);
            }
            $setting->imageslide2 = $imgUrl;
        }
        //imageslide3
        if ($imageslide3) //si on a rempli le champ image
        {
            $img_name = $imageslide3->getClientOriginalName();
            $directory = "BackEndSourceFile/setting_img/";
            $imgUrl = $directory . $img_name;
            $imageslide3->move($directory, $img_name);

            $old_img = $setting->imageslide3;
            if (file_exists($old_img)) {
                unlink($old_img);
            }
            $setting->imageslide3 = $imgUrl;
        }

        //string values

        $setting->phone_number = $request->phone_number;
        $setting->Header_message = $request->Header_message;
        $setting->about_us = $request->about_us;
        $setting->our_menu = $request->our_menu;
        $setting->terms_conditions = $request->terms_conditions;
        $setting->map = $request->map;

        $setting->save();

        return redirect('admin/setting/manage')->with('sms', 'Setting updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setting_delete($id)
    {
        $setting = Settings::find($id);
        $setting->delete();
        return back()->with('sms', 'Setting deleted');
    }
}
