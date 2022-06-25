<?php

namespace App\Http\Controllers;

use App\Models\Dishes;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function insert(Request $request)
    {
        //requette qui font entrer les donnees dans la carte en provenance de la BD
        $dish = Dishes::where('id', $request->dish_id)->first();

        $price = null;
        if ($dish->half_price == null) {
            $price = $dish->full_price;
        } else {
            $price = $dish->half_price;
        }
        //entrer les donnees en provenance de la BD et du formulaire
        Cart::add([
            'id' => $request->dish_id,
            'qty' => $request->qty,
            'name' => $dish->dish_name,
            'price' => $price,
            'weight' => 1,
            'options' =>
            [
                'image' => $dish->dish_image,
            ],
        ]);



        return redirect()->route('cart_show');
    }

    public function show()
    {
        $cartsDish = Cart::content();

        return view('FrontEnd.cart.show', compact('cartsDish'));
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);
        return back();
    }

    public  function update(Request $request, $rowId)
    {
        Cart::update($rowId, $request->qty);
        return back();
    }
}
