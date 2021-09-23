<?php

namespace App\Http\Controllers\Frontend\Cart;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function cartStore(Request $request)
    {
        //dd($request->all());
        $product_qty = $request->input('product_qty');
        $product_id = $request->input('product_id');
        $product = Product::getProductByCart($product_id);
        //return $product;
        $price = $product[0]['offer_price'];
        //dd($price);
        //cart package =https://github.com/hardevine/LaravelShoppingcart

        $cart_array = [];
        foreach (Cart::instance('shopping')->content() as $item) {  // getting carted contents as  item 

            $cart_array[] = $item->id;
        }

        $result = Cart::instance('shopping')->add(
            $product_id,
            $product[0]['title'],
            $product_qty,
            $price

        )->associate('app\Models\Product'); //Product is the model which is assoiciated  



        
        if ($result) {
            $responce['status'] = true;
            $responce['product_id'] = $product_id;
            $responce['total'] = Cart::subtotal();
            $responce['cart_count'] = Cart::instance('shopping')->count();
            $responce['message'] = "Item was added to your cart";
        }
        if ($request->ajax()) {
            $header = view('FrontEnd.Partials.header')->render();
            $responce['header'] = $header;
        }
        return json_encode($responce);
    }


    public function cartDelete(Request $request)
    {
        //dd($request->all());
        $id = $request->input('cart_id');
        Cart::instance('shopping')->remove($id);
        $responce['status'] = true;
        $responce['message'] = "Item successfully removed";
        $responce['total'] = Cart::subtotal();
        $responce['cart_count'] = Cart::instance('shopping')->count();
        if ($request->ajax()) {
            $header = view('FrontEnd.Partials.header')->render();
            $responce['header'] = $header;
        }
        return json_encode($responce);
    }
}
