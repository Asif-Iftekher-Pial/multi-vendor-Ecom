<?php

namespace App\Http\Controllers\Backend\Coupon;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::orderBy('id', 'DESC')->paginate(4);
        //dd($allBanners);
        return view('Backend.Layouts.Coupon.index', compact('coupons'));
    }


    public function couponStatus(Request $request)
    {
        //dd($request->all());
        if ($request->mode == 'true') {

            DB::table('coupons')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('coupons')->where('id', $request->id)->update(['status' => 'inactive']);
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
       
        return view('Backend.Layouts.Coupon.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'code' => 'string|required|min:2',
            'value' => 'required|numeric',
            'type' => 'required|in:fixed,percent',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->all();

        $status = Coupon::create($data);
        if ($status) {
            return redirect()->route('coupon.index')->with('success', 'Coupon successfully created');
        } else {
            return back()->with('error', 'Something went wrong!');
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
        $coupon = Coupon::find($id); //find each  data by their id
        if ($coupon) {
            return view('Backend.Layouts.coupon.edit', compact('coupon'));
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
    {
        $coupon = Coupon::find($id);
         //dd($request->all());
         $request->validate([
            'code' => 'string|required|min:2',
            'value' => 'required|numeric',
            'type' => 'required|in:fixed,percent',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->all();

        $status = $coupon->fill($data)->save();
        if ($status) {
            return redirect()->route('coupon.index')->with('success', 'Coupon successfully updated');
        } else {
            return back()->with('error', 'Something went wrong!');
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
        $coupon = Coupon::find($id); //find each data by their id
        if ($coupon) {
            $status=$coupon->delete();
            if ($status) {
                return redirect()->route('coupon.index')->with('success','Coupon deleted successfully');
            } else {
               return redirect()->back()->with('error','Something went wrong!');
            }
            
        } else {
            return back()->with('error', 'Data not found');
        }
    }
}
