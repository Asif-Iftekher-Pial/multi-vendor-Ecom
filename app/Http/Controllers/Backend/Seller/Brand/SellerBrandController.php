<?php

namespace App\Http\Controllers\Backend\Seller\Brand;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class SellerBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allBrands = Brand::orderBy('id', 'DESC')->paginate(4);
        //dd($allBrands);
        return view('Backend.Layouts.Seller.Brand.index', compact('allBrands'));
    }

    public function brandStatus(Request $request)
    {
        //dd($request->all());
        if ($request->mode == 'true') {

            DB::table('brands')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('brands')->where('id', $request->id)->update(['status' => 'inactive']);
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
        return view('Backend.Layouts.Seller.Brand.create');
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
            'title'         =>  'required',
            'photo'         =>  'required',
            'status'        =>  'required',
        ]);

        //dd($request->all());
        $data = $request->all();

        $slug = Str::slug($request->input('title'));
        $slug_count = Brand::where('slug', $slug)->count();
        if ($slug_count > 0) {
            $slug = time() . '-' . $slug;
        }
        $data['slug'] = $slug;
        // return $data;
        $status = Brand::create($data);  //create or storing data on Banner Table 


        if ($status) {
            //dd('ok');
            return redirect()->route('SellerBrand.create')->with('success', 'Brand Created successfully');
        } else {

            return redirect()->back()->with('error', 'Something went wrong');
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
        $brand = Brand::find($id); //find each  data by their id
        if ($brand) {
            return view('Backend.Layouts.Seller.Brand.edit', compact('brand'));
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
        $brand = Brand::find($id);
        if ($brand) {

            //dd($request->all());
            $request->validate([
                'title'         =>  'required',
                'photo'         =>  'required',
                'status'        =>  'nullable|in:active,inactive',
            ]);

            //dd($request->all());
            $data = $request->all();
            $status = $brand->fill($data)->save();  //create or storing data on brand Table 


            if ($status) {
                //dd('ok');
                return redirect()->route('SellerBrand.index')->with('success', 'Brand updated successfully');
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
        $brand = Brand::find($id); //find each data by their id
        if ($brand) {
            $status=$brand->delete();
            if ($status) {
                return redirect()->route('SellerBrand.index')->with('success','brand deleted successfully');
            } else {
               return redirect()->back()->with('error','Something went wrong!');
            }
            
        } else {
            return back()->with('error', 'Data not found');
        }
    }
}

