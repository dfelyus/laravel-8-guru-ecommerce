<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::where('contact_status', 1)->get();
        return view('BackEnd.contact.add', compact('contacts'));
    }


    public function active($id)
    {
        $contacts = Contact::find($id);
        $contacts->contact_status = 1;
        $contacts->save();

        return back();
    }

    public function Inactive($id)
    {
        $contacts = Contact::find($id);
        $contacts->contact_status = 0;
        $contacts->save();

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
            'first_name' => 'required',
            'last_name' => 'required',
            'role' => 'required',
            'image' => 'required',
            'contact_status' => 'required',
        ]);

        $imgName = $request->file('image');
        $image = $imgName->getClientOriginalName();
        $directory = "BackEndSourceFile/contact_img/";
        $imgUrl = $directory . $image;
        $imgName->move($directory, $image);

        $contacts = new Contact();

        $contacts->first_name = $request->first_name;
        $contacts->last_name = $request->last_name;
        $contacts->role = $request->role;
        $contacts->link1 = $request->link1;
        $contacts->link2 = $request->link2;
        $contacts->link3 = $request->link3;
        $contacts->link4 = $request->link4;
        $contacts->adress = $request->adress;
        $contacts->contact_status = $request->contact_status;
        $contacts->image = $imgUrl;

        $contacts->save();
        return back()->with('sms', 'Contact saved');
    }

    public function manage()
    {
        $contacts = Contact::paginate(10);
        return view('BackEnd.contact.manage', compact('contacts'));
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
        $contacts = Contact::find($id);

        $img_main = $request->file('image');

        $addOn = $request->added_on;

        if ($img_main) //si on a rempli le champ image
        {
            $img_name = $img_main->getClientOriginalName();
            $directory = "BackEndSourceFile/contact_img/";
            $imgUrl = $directory . $img_name;
            $img_main->move($directory, $img_name);

            $old_img = $contacts->image;
            if (file_exists($old_img)) {
                unlink($old_img);
            }

            $contacts->image = $imgUrl;
        }

        $contacts->first_name = $request->first_name;
        $contacts->last_name = $request->last_name;
        $contacts->role = $request->role;
        $contacts->link1 = $request->link1;
        $contacts->link2 = $request->link2;
        $contacts->link3 = $request->link3;
        $contacts->link4 = $request->link4;
        $contacts->adress = $request->adress;


        $contacts->save();

        return redirect('admin/contact/manage')->with('sms', 'Contact updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $contacts = Contact::find($id);
        $contacts->delete();
        return back()->with('sms', 'Contact deleted');
    }
}
