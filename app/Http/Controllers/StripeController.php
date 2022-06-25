<?php

namespace App\Http\Controllers;

use App\Models\Dishes;
use App\Models\Order;
use App\Models\Payment;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Stripe;
use Session;

class StripeController extends Controller
{

    public function handlePost(Request $request)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            $charge = \Stripe\Charge::create(
                [
                    "amount" => round(Cart::total() * 100),
                    "currency" => 'usd',
                    "source" => $request->stripeToken,
                    "description" => $request->name
                ]
            );
        } catch (\Stripe\Error\Card $e) {
            return Redirect::refresh()->with('error_message', $e->getMessage());
        } catch (\Stripe\Error\InvalidRequest $e) {
            return Redirect::refresh()->with('error_message', $e->getMessage());
        } catch (\Stripe\Error\Authentication $e) {
            // redirect::refresh()->withFlashMessage($e->getMessage());
            return Redirect::refresh()->with('error_message', $e->getMessage());
        } catch (\Stripe\Error\ApiConnection $e) {
            return Redirect::refresh()->with('error_message', $e->getMessage());
        } catch (\Stripe\Error\Base $e) {
            return Redirect::refresh()->with('error_message', $e->getMessage());
        } catch (Exception $e) {
            return Redirect::refresh()->with('error_message', $e->getMessage());
        }


        return redirect('/user/order_complete');
    }

    public function handleGet()
    {
        return view('FrontEnd.checkOut.stripe');
    }
}
