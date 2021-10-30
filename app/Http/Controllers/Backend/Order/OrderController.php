<?php

namespace App\Http\Controllers\Backend\Order;

use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Orders::orderBy('id', 'DESC')->get();
        return view('Backend.Layouts.Order.index',compact('orders'));
    }
    public function orderStatus(Request $request )
    {
        //return $request->input('order_id');
        $order=Orders::find($request->input('order_id'));
        if($order){
            if($request->input('condition')=='delivered'){
                foreach ($order->products as $item) {
                   $product=Product::where('id',$item->pivot->product_id)->first();
                   //dd($product);
                   //reduce the stok qty after status change
                   $stock=$product->stock;
                   $stock -=$item->pivot->quantity;
                   $product->update(['stock'=>$stock]);
                   Orders::where('id',$request->input('order_id'))->update(['payment_status'=>'paid']);

                }
            }
            $status=Orders::where('id',$request->input('order_id'))->update(['condition'=>$request->input('condition')]);
            if($status)
            {
                return back()->with('success','Order status successfully updated');
            }
            else{
                return back()->withErrors('error','Something went wrong');
            }
        }
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd('showing here');
        $order=Orders::find($id);
        if($order){
            return view('Backend.Layouts.Order.show',compact('order'));
        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Orders::find($id); //find each data by their id
        if ($order) {
            $status=$order->delete();
            if ($status) {
                return redirect()->route('order.index')->with('success','Order deleted successfully');
            } else {
               return redirect()->back()->with('error','Something went wrong!');
            }
            
        } else {
            return back()->with('error', 'Data not found');
        }
    }
}
