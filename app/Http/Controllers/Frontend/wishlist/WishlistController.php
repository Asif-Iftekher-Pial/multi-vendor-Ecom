<?php

namespace App\Http\Controllers\Frontend\wishlist;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class WishlistController extends Controller
{
    public function wishlist()
    {
        return view('FrontEnd.Layouts.wishlists.wishlists');
    }

    public function wishlistStore(Request $request)
    {
        //dd($request->all()); //from network
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        $product=Product::getProductByCart($product_id); //getProductByCart is the Product modal relation 
        //dd($product); // from network
        $price=$product[0]['offer_price'];

        $wishlist_array=[];
        foreach (Cart::instance('wishlist')->content() as $item) { //Cart::instance('wishlist')->content() is from cart document (see cart controller)
            # code...
            $wishlist_array[]=$item->id;

        }
        if(in_array($product_id,$wishlist_array)){
            $response['present']=true;
            $response['message']="Item is already in your wishlist";

        }
        else{
            $result=Cart::instance('wishlist')->add($product_id,$product[0]['title'],$product_qty,$price)->associate(Product::class); 
            if($result){
                $response['status']=true;
                $response['message']="Item has beed added in wishlist";
                $response['wishlist_count']=Cart::instance('wishlist')->count();

            }
        }
        return json_encode($response);
    }

    public function moveToCart(Request $request)
    {
        //dd($request->all());
        $item=Cart::instance('wishlist')->get($request->input('rowId')); //get the item from the wishlist
        //dd($item);
        Cart::instance('wishlist')->remove($request->input('rowId')); //it will remove the item from the wishlist for transfaring to the cart

        $result=Cart::instance('shopping')->add($item->id,$item->name,1,$item->price)->associate(Product::class); //adding wishlist product to the cart
        if($result){
            $response['status']=true;
            $response['message']="Item has been moved to cart";
            $response['cart_count']=Cart::instance('shopping')->count();

        }
        if($request->ajax()){
            $wishlist=view('FrontEnd.Layouts.wishlists._wishlist')->render();
            $header = view('FrontEnd.Partials.header')->render();
            $response['wishlist_list']=$wishlist;
            $response['header'] = $header;
        }
        return $response;
        
    }

    public function wishlistDelete(Request $request)
    {
        //dd($request->all());
        $id=$request->input('rowId');
        Cart::instance('wishlist')->remove($id);

        $response['status']=true;
        $response['message']="Item successfully removed from wishlist";
        $response['cart_count']=Cart::instance('shopping')->count();

        if($request->ajax()){
            $wishlist=view('FrontEnd.Layouts.wishlists._wishlist')->render();
            $header = view('FrontEnd.Partials.header')->render();
            $response['wishlist_list']=$wishlist;
            $response['header'] = $header;


            
        }
        return $response;

    }
}
