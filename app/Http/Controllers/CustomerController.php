<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class CustomerController extends Controller
{
    public function show()
    {
        return view('FrontEnd.customer.register');
    }

    public function select_products()
    {
        //Session::put('sms','Please select the product to continuous...');
        $mess = 'Please select the product to continuous...';
        return redirect('/products')->with('sms', 'Please select the product to continuous...');
    }

    public function login()
    {
        /*
        if (!Auth::guard('admin')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            throw ValidationException::withMessages([
                'email' => 'Invalid email or password'
            ]);
        }
        */
        return redirect()->intended(route('login'));
        //return view('FrontEnd.customer.login');
    }


    public  function shipping()
    {
        if (Cart::count() == 0) {
            return redirect('/products')->with('sms', 'Please select product(s) to continuous  !!!');
        }
        return view('FrontEnd.checkOut.shipping');
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'terms' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ]);

        Session::put('shipping_name', $request->name);
        Session::put('shipping_email', $request->email);
        Session::put('shipping_phone_number', $request->phone_number);
        Session::put('shipping_address', $request->address);

        return redirect()->route('checkout_payment');
    }
}
