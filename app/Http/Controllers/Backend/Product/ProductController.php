<?php

namespace App\Http\Controllers\Backend\Product;

use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(4);
        //dd($allBanners);
        return view('Backend.Layouts.Product.index', compact('products'));
    }

    public function productStatus(Request $request)
    {
        //dd($request->all());
        if ($request->mode == 'true') {

            DB::table('products')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('products')->where('id', $request->id)->update(['status' => 'inactive']);
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
        return view('Backend.Layouts.Product.create');
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
            'title'         =>  'string|required',
            'summary'       =>  'string|required',
            'description'   =>  'string|required',
            'stock'         =>  'numeric',
            'price'         =>  'numeric',
            'discount'      =>  'nullable|numeric',
            'conditions'    =>  'nullable',
            'photo'         =>  'required',
            'status'        =>  'required',
            'cat_id'        =>  'required|exists:categories,id',
            'child_cat_id'  =>  'nullable|exists:categories,id',
            'size'          =>  'nullable',
            'status'        =>  'nullable|in:active,inactive',
        ]);
        $data = $request->all();


        $slug = Str::slug($request->input('title'));
        $slug_count = Product::where('slug', $slug)->count();
        if ($slug_count > 0) {
            $slug = time() . '-' . $slug;
        }
        $data['slug'] = $slug;

        $data['offer_price'] = ($request->price - (($request->price * $request->discount) / 100)); // 150-((150*10)/100) suppose here, price is 150 , discount is 10, divided by 100 is equal to stored in  offer price 
        //dd($data);

        $status = Product::create($data);
        if ($status) {
            return redirect()->route('product.index')->with('success', 'Product successfully created');
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
        $product = Product::find($id);
        if ($product) {

            return view('Backend.Layouts.Product.edit', compact('product'));
        } else {
            return back()->with('error', 'Product not found');
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
        $product = Product::find($id);
        if ($product) {
            $this->validate($request, [
                'title'         =>  'string|required',
                'summary'       =>  'string|required',
                'description'   =>  'string|required',
                'stock'         =>  'numeric',
                'price'         =>  'numeric',
                'discount'      =>  'nullable|numeric',
                'conditions'    =>  'nullable',
                'photo'         =>  'required',
                'status'        =>  'required',
                'cat_id'        =>  'required|exists:categories,id',
                'child_cat_id'  =>  'nullable|exists:categories,id',
                'size'          =>  'nullable',
                'status'        =>  'nullable|in:active,inactive',
            ]);

            $data = $request->all();

            $data['offer_price'] = ($request->price - (($request->price * $request->discount) / 100)); // 150-((150*10)/100) suppose here, price is 150 , discount is 10, divided by 100 is equal to stored in  offer price 
            //dd($data);
            $status = $product->fill($data)->save();
            if ($status) {
                return redirect()->route('product.index')->with('success', 'Product successfully updated');
            } else {
                return back()->with('error', 'Something went wrong!');
            }
        } else {
            return back()->with('error', 'Product not found');
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
        $product = Product::find($id); //find each data by their id
        if ($product) {
            $status = $product->delete();
            if ($status) {
                return redirect()->route('product.index')->with('success', 'product deleted successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong!');
            }
        } else {
            return back()->with('error', 'Data not found');
        }
    }
}
