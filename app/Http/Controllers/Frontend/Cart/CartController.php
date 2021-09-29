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
            $response['status'] = true;
            $response['product_id'] = $product_id;
            $response['total'] = Cart::subtotal();
            $response['cart_count'] = Cart::instance('shopping')->count();
            $response['message'] = "Item was added to your cart";
        }
        if ($request->ajax()) {
            $header = view('FrontEnd.Partials.header')->render();
            $response['header'] = $header;
        }
        return json_encode($response);
    }


    public function cartDelete(Request $request)
    {
        //dd($request->all());
        $id = $request->input('cart_id');
        Cart::instance('shopping')->remove($id);
        $response['status'] = true;
        $response['message'] = "Item successfully removed";
        $response['total'] = Cart::subtotal();
        $response['cart_count'] = Cart::instance('shopping')->count();
        if ($request->ajax()) {
            $header = view('FrontEnd.Partials.header')->render();
            $response['header'] = $header;
        }
        return json_encode($response);
    } 
    
    public function managecartDelete(Request $request)
    {
        //dd($request->all());
        $id = $request->input('cart_id');
        Cart::instance('shopping')->remove($id);
        $response['status'] = true;
        $response['message'] = "Item successfully removed";
        $response['total'] = Cart::subtotal();
        $response['cart_count'] = Cart::instance('shopping')->count();
        if ($request->ajax()) {
            $header = view('FrontEnd.Layouts.cart.index')->render();
            $response['header'] = $header;
        }
        return json_encode($response);
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
            $response['status']=false;

        } elseif($request_quantity<1) {
            $message="you can not add less than one quantity";
            $response['status']=false;
        }
        else{
            Cart::instance('shopping')->update($rowId,$request_quantity);
            $message="Quantity was updated successfully";
            $response['status']=true;
            $response['total'] = Cart::subtotal();
            $response['cart_count'] = Cart::instance('shopping')->count();

        }
        if ($request->ajax()) {
            $header = view('FrontEnd.Partials.header')->render();
            $cart_list = view('FrontEnd.Layouts.cartList._responsecart-lists')->render();
            $response['header'] = $header;
            $response['cart_list'] = $cart_list;
            $response['message'] = $message;

        }
        return $response;
        

    }

    public function couponAdd(Request $request)
    {

        //return $request->all();

        $coupon=Coupon::where('code',$request->input('code'))->first(); //see if code is mathing with the inputed code from the form
        if(!$coupon){
           return back()->withErrors(['Invalid coupon,Enter valid coupon']);
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
