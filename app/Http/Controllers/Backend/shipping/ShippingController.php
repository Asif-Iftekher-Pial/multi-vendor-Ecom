<?php

namespace App\Http\Controllers\Backend\shipping;

use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     

        $shippings = Shipping::orderBy('id', 'DESC')->paginate(4);
        //dd($allBanners);
        return view('Backend.Layouts.shipping.index', compact('shippings'));
    }

    public function shippingStatus(Request $request)
    {
        //dd($request->all());
        if ($request->mode == 'true') {

            DB::table('shippings')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('shippings')->where('id', $request->id)->update(['status' => 'inactive']);
        }
        return response()->json(['msg' => 'Status updated successfully', 'status' => 'true']);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Layouts.shipping.create');
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

         //dd($request->all());
         $request->validate([
            'shipping_address'       =>  'string|required',
            'delivery_time'          =>  'required',
            'delivery_charge'        =>  'string|required',
            'status'                 =>  'required',
        ]);

        //dd($request->all());
        $data = $request->all();

        // return $data;
        $status = Shipping::create($data);  //create or storing data on Banner Table 


        if ($status) {
            //dd('ok');
            return redirect()->route('shipping.index')->with('success', 'Shipping Created successfully');
        } else {

            return back()->withErrors('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $shippings = Shipping::find($id); //find each  data by their id
        if ($shippings) {
            return view('Backend.Layouts.shipping.edit', compact('shippings'));
        } else {
            return back()->with('error', 'Data not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { $shipping = Shipping::find($id);
        if ($shipping) {

            //dd($request->all());
            $request->validate([
                'shipping_address'       =>  'string|required',
                'delivery_time'          =>  'required',
                'delivery_charge'        =>  'string|required',
                'status'                 =>  'required',
            ]);

            //dd($request->all());
            $data = $request->all();
            $status = $shipping->fill($data)->save();  //create or storing data on Banner Table 


            if ($status) {
                //dd('ok');
                return redirect()->route('shipping.index')->with('success', 'shipping updated successfully');
            } else {

                return redirect()->back()->with('error', 'Something went wrong');
            }
        } else {
            return back()->with('error', 'Data not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shipping = Shipping::find($id); //find each data by their id
        if ($shipping) {
            $status=$shipping->delete();
            if ($status) {
                return redirect()->route('shipping.index')->with('success','shipping deleted successfully');
            } else {
               return redirect()->back()->with('error','Something went wrong!');
            }
            
        } else {
            return back()->with('error', 'Data not found');
        }
    }
}
