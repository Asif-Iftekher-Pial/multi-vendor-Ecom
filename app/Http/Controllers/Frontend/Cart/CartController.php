<?php

namespace App\Http\Controllers\Frontend\Cart;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{

    public function cart()
    {
        return view('FrontEnd.Layouts.cart.index');
    }

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

        $result = Cart::instance('shopping')->add( //addding products in cart by product id ,
            $product_id,
            $product[0]['title'],
            $product_qty,
            $price

        )->associate(Product::class); //Product is the model which is assoiciated  




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
    
    public function managecartDelete(Request $request)
    {
        //dd($request->all());
        $id = $request->input('cart_id');
        Cart::instance('shopping')->remove($id);
        $responce['status'] = true;
        $responce['message'] = "Item successfully removed";
        $responce['total'] = Cart::subtotal();
        $responce['cart_count'] = Cart::instance('shopping')->count();
        if ($request->ajax()) {
            $header = view('FrontEnd.Layouts.cart.index')->render();
            $responce['header'] = $header;
        }
        return json_encode($responce);
    }

    public function cartUpdate(Request $request)
    {
        //dd($request->all()); //check from network
        $this->validate($request,[
            'product_qty' => 'required|numeric',
        ]);
        $rowId=$request->input('rowId');
        $request_quantity=$request->input('product_qty');
        $productQuantity=$request->input('productQuantity');

        if ($request_quantity>$productQuantity) {
            # code...
            $message="Currently do not have enough product in stoke";
            $responce['status']=false;

        } elseif($request_quantity<1) {
            $message="you can not add less than one quantity";
            $responce['status']=false;
        }
        else{
            Cart::instance('shopping')->update($rowId,$request_quantity);
            $message="Quantity was updated successfully";
            $responce['status']=true;
            $responce['total'] = Cart::subtotal();
            $responce['cart_count'] = Cart::instance('shopping')->count();

        }
        if ($request->ajax()) {
            $header = view('FrontEnd.Partials.header')->render();
            $cart_list = view('FrontEnd.Layouts.cartList._cart-lists')->render();
            $responce['header'] = $header;
            $responce['cart_list'] = $cart_list;
            $responce['message'] = $message;

        }
        return $responce;
        

    }

    public function couponAdd(Request $request)
    {

        //return $request->all();

        $coupon=Coupon::where('code',$request->input('code'))->first(); //see if code is mathing with the inputed code from the form
        if(!$coupon){
            return back()->withErrors('error','Invalid coupon code,Please inter valid code');
        }
        if($coupon){
            $total_price=Cart::instance('shopping')->subtotal();
            //dd($total_price);
            session()->put('coupon',[
                'id'=>$coupon->id,
                'code'=>$coupon->code,
                'value'=>$coupon->discount($total_price), //discont came is from coupon model

            ]);
            return back()->with('success','Coupon applied successfully');
        }

    }
}
