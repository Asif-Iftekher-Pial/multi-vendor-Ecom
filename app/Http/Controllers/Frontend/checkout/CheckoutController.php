<?php

namespace App\Http\Controllers\Frontend\checkout;

use App\Models\Orders;
use App\Mail\OrderMail;
use App\Models\Product;
use App\Models\Shipping;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    //
    public function checkout1()
    {

        $user = Auth::user();
        //dd($user);
        return view('FrontEnd.Layouts.checkout.checkout1', compact('user'));
    }
    public function checkout1Store(Request $request)
    {
        //return $request->all();
        $request->validate([
            'first_name' => 'string|required',
            'last_name'   => 'string|required',
            'email'     => 'required',
            'phone'     => 'numeric|required',
            'country' => 'string|required',
            'address' => 'string|required',
            'city' => 'string|required',
            'state' => 'string|required',
            'postcode' => 'string|required',
            'note' => 'required',


            'sfirst_name' => 'string|required',
            'slast_name' => 'string|required',
            'semail' => 'required',
            'sphone' => 'numeric|required',
            'scountry' => 'string|required',
            'saddress' => 'string|required',
            'scity' => 'string|required',
            'sstate' => 'string|required',
            'spostcode' => 'string|required',
            'sub_total' => 'required',
            'total_amount' => 'required',
        ]);
        Session::put('checkout', [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'postcode' => $request->postcode,
            'note' => $request->note,

            // shipping address
            'sfirst_name' => $request->sfirst_name,
            'slast_name' => $request->slast_name,
            'semail' => $request->semail,
            'sphone' => $request->sphone,
            'scountry' => $request->scountry,
            'saddress' => $request->saddress,
            'scity' => $request->scity,
            'sstate' => $request->sstate,
            'spostcode' => $request->spostcode,
            'sub_total' => $request->sub_total,
            'total_amount' => $request->total_amount,

        ]);

        $shippings = Shipping::where(['status' => 'active'])->orderBy('shipping_address', 'ASC')->get(); //shipping method will retrive and pass to the checkout2 for selecting shipng method


        return view('FrontEnd.Layouts.checkout.checkout2', compact('shippings'));
    }

    public function checkout2Store(Request $request)
    {
        //return $request->all();
        $request->validate([
            'delivery_charge' => 'required|numeric'
        ]);
        Session::push('checkout', [
            'delivery_charge' => $request->delivery_charge,
        ]);
        return view('FrontEnd.Layouts.checkout.checkout3');
    }

    public function checkout3Store(Request $request)
    {
        //return $request->all();
        $request->validate([
            'payment_method'          => 'string|required',
            'payment_status'          => 'string|in:paid,unpaid',
        ]);
        Session::push('checkout', [
            'payment_method' => $request->payment_method,
            'payment_status' => 'unpaid',
        ]);
        //return Session::get('checkout')[0]['delivery_charge'];
        return view('FrontEnd.Layouts.checkout.checkout4');
    }


    public function checkoutStore()
    {
        $deliverycharge = Session::get('checkout')[0]['delivery_charge'];
        $subtotal = (float) str_replace(',', '', Cart::instance('shopping')->subtotal());
        $subtotalsession =  (float) str_replace(',', '', Session::get('checkout')['sub_total']);
        //dd($subtotalsession);
        //dd($subtotal);
        //dd('ok');
        $order = new Order(); //storing in order table by creating instance of Order Model class
        $order['user_id'] = auth()->user()->id;
        $order['order_number'] = Str::upper('ORD-' . Str::random(6)); //will generate random string for order
        //return Session::get('checkout');
        $order['sub_total'] = $subtotalsession;

        if (Session::has('coupon')) {
            $order['coupon'] = Session::get('coupon')['value'];
        } else {
            $order['coupon'] = 0;
        }

        $order['total_amount'] = $subtotal + $deliverycharge - $order['coupon'];
        $order['payment_method'] = Session::get('checkout')[1]['payment_method'];
        $order['payment_status'] = Session::get('checkout')[1]['payment_status'];
        $order['condition'] = 'pending';
        //  $check=Session::get('checkout');
        // dd($check);
        $order['delivery_charge'] = Session::get('checkout')[0]['delivery_charge'];
        $order['first_name'] = Session::get('checkout')['first_name'];
        $order['last_name'] = Session::get('checkout')['last_name'];
        $order['email'] = Session::get('checkout')['email'];
        $order['phone'] = Session::get('checkout')['phone'];
        $order['country'] = Session::get('checkout')['country'];
        $order['address'] = Session::get('checkout')['address'];
        $order['city'] = Session::get('checkout')['city'];
        $order['state'] = Session::get('checkout')['state'];
        $order['note'] = Session::get('checkout')['note'];


        $order['sfirst_name'] = Session::get('checkout')['sfirst_name'];
        $order['slast_name'] = Session::get('checkout')['slast_name'];
        $order['semail'] = Session::get('checkout')['semail'];
        $order['sphone'] = Session::get('checkout')['sphone'];
        $order['scountry'] = Session::get('checkout')['scountry'];
        $order['saddress'] = Session::get('checkout')['saddress'];
        $order['scity'] = Session::get('checkout')['scity'];
        $order['sstate'] = Session::get('checkout')['sstate'];


        // saving all data in Order table
        $status = $order->save();


        //saving data in ProductOrder table


        foreach (Cart::instance('shopping')->content() as $item) {
            $product_id[] = $item->id;


            
            $product = Product::find($item->id);
            //dd($product);
            //Update stock when order is placed
            $quantity = $item->qty;
            //dd($quantity);

            $stock = $product->stock - $quantity;
            // dd($stock);
            $product->update(['stock' => $stock]);
            //dd($product);
            $order->products()->attach($product, ['quantity' => $quantity]);
        }


        if ($status) {

            //mail section
            Mail::to($order['email'])->bcc($order['semail'])->cc('iftekherpial67@gmail.com')->send(new OrderMail($order));
            //dd('mail has sent');
            // if facing error like - "stream_socket_enable_crypto(): SSL operation failed with code 1 "
            // Just go to the file -
            // vendor\swiftmailer\lib\classes\Swift\Transport\StreamBuffer.php and comment out the code $options = []; and paste the code $options['ssl'] = array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true);


            Session::forget('coupon');
            Session::forget('checkout');
            Cart::destroy();

            return redirect()->route('complete', $order['order_number']);
        } else {
            return redirect()->route('checkout1')->withErrors(['Failed', 'Something went wrong']);
        }
    }

    public function complete($order)
    {
        $order = $order;
        return view('FrontEnd.Layouts.checkout.complete', compact('order'));
    }
}
