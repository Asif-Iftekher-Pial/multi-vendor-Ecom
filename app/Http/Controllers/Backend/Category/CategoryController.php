<?php

namespace App\Http\Controllers\Backend\Category;

use App\Models\Banner;
use App\Models\Categorie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::orderBy('id', 'DESC')->paginate(4);
        //dd($allBanners);
        return view('Backend.Layouts.Category.index', compact('categories'));
    }


    public function categoryStatus(Request $request)
    {
        //dd($request->all());
        if ($request->mode == 'true') {

            DB::table('categories')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('categories')->where('id', $request->id)->update(['status' => 'inactive']);
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
        $parent_cat=Categorie::where('is_parent',1)->orderBy('title','ASC')->get();
        
        //dd($parent_cat);
        return view('Backend.Layouts.Category.create',compact('parent_cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


       // dd($request->all());

        $request->validate([
            'title'         =>  'string|required',
            'summary'       =>  'required',
            'is_parent'     =>  'sometimes|in:1',
            'photo'         =>  'required',
            'parent_id'     =>  'nullable',
            'status'        =>  'nullable|in:active,inactive',
        ]);

        //dd($request->all());
        $data = $request->all();
        //dd($data);

        $slug = Str::slug($request->input('title'));
        $slug_count = Categorie::where('slug', $slug)->count();
        if ($slug_count > 0) {
            $slug = time() . '-' . $slug;
        }
        $data['slug'] = $slug;
        // return $data;

        $data['is_parent'] = $request->input('is_parent', 0);
        if($request->is_parent==1) {
            $data['parent_id'] = null;
        }
        $status = Categorie::create($data);  //create or storing data on category Table 


        if ($status) {
            //dd('ok');
            return redirect()->route('category.index')->with('success', 'Category Created successfully');
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
        $category=Categorie::find($id);
        $parent_cat=Categorie::where('is_parent',1)->orderBy('title','ASC')->get();
        if($category){

            return view('Backend.Layouts.Category.edit',compact(['category','parent_cat']));

        }else{
            return back()->with('error','Category not found');
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
        //dd($request->all());
        
        $category=Categorie::find($id);
        if($category){

            $request->validate([
                'title'         =>  'string|required',
                'summary'       =>  'required',
                'is_parent'     =>  'sometimes|in:1',
                'photo'         =>  'required',
                'parent_id'     =>  'nullable',
                'status'        =>  'nullable|in:active,inactive',
            ]);
    
            //dd($request->all());
            $data = $request->all();
            //dd($data);
           
            // return $data;
    
            $data['is_parent'] = $request->input('is_parent', 0);
        if($request->is_parent==1) {
            $data['parent_id'] = null;
        }
            $status = $category->fill($data)->save(); //create or storing data on Banner Table 
    
    
            if ($status) {
                //dd('ok');
                return redirect()->route('category.index')->with('success', 'Category Upadted successfully');
            } else {
    
                return redirect()->back()->with('error', 'Something went wrong');
            }

        }else{
            return back()->with('error','Category not found');
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
        $category = Categorie::find($id); //find each data by their id
        if ($category) {
            $status=$category->delete();
            if ($status) {
                return redirect()->route('category.index')->with('success','Category deleted successfully');
            } else {
               return redirect()->back()->with('error','Something went wrong!');
            }
            
        } else {
            return back()->with('error', 'Data not found');
        }
    }
}
