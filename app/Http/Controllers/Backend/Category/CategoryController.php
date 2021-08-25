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
        $parent_cat = Categorie::where('is_parent', 1)->orderBy('title', 'ASC')->get();

        //dd($parent_cat);
        return view('Backend.Layouts.Category.create', compact('parent_cat'));
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
            'title' => 'string|required',
            'summary' => 'string|nullable',
            'is_parent' => 'sometimes|in:1',
            'parent_id' => 'nullable|exists:categories,id',
            'status' => 'nullable|in:active,inactive'
        ]);

        $data = $request->all();
        //        return $data;
        $slug = Str::slug($request->input('title'));
        $slug_count = Categorie::where('slug', $slug)->count();
        if ($slug_count > 0) {
            $slug = time() . '-' . $slug;
        }
        $data['slug'] = $slug;
        $data['is_parent'] = $request->input('is_parent', 0);
        //        return $data;
        $status = Categorie::create($data);
        if ($status) {
            return redirect()->route('category.index')->with('success', 'Category successfully created');
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
        $category = Categorie::find($id);
        $parent_cat = Categorie::where('is_parent', 1)->orderBy('title', 'ASC')->get();
        if ($category) {

            return view('Backend.Layouts.Category.edit', compact(['category', 'parent_cat']));
        } else {
            return back()->with('error', 'Category not found');
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


        $category = Categorie::find($id);
        if ($category) {
            $this->validate($request, [
                'title' => 'string|required',
                'summary' => 'string|nullable',
                'is_parent' => 'sometimes|in:1',
                'parent_id' => 'nullable|exists:categories,id',
            ]);

            $data = $request->all();

            if ($request->is_parent == 1) {
                $data['parent_id'] = null;
            }
                
            $data['is_parent'] = $request->input('is_parent', 0);
            $status = $category->fill($data)->save();
            if ($status) {
                return redirect()->route('category.index')->with('success', 'Category successfully updated');
            } else {
                return back()->with('error', 'Something went wrong!');
            }
        } else {
            return back()->with('error', 'Category not found');
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

        //যদি প্যারেন্ট ক্যাটাগরি ডিলিট হয় তাহলে সেই প্যারেন্ট এর চাইল্ড আইডী গুলো প্যারেন্ট আইডী হবে যেভাবে-
        $child_cat_id = Categorie::where('parent_id', $id)->pluck('id'); //ক্যটাগরি টেবিলের যেখানে (where) parent_id হচ্ছে id সেখান থেকে শূধু ID নিতে (pluck) হবে ।


        if ($category) {
            $status = $category->delete();
            if ($status) {
                if (count($child_cat_id) > 0) {  // প্যারেন্ট ক্যাট  ডিলিট এর পরে যদি তার চাইল্ড ক্যাট থেকে থাকে ...
                    Categorie::shiftChild($child_cat_id);  //চাইল্ড  ক্যাট এর আইডি অনুযায়ি ক্যাটাগরি টেবিলে চাইল্ড ক্যাট হয়ে যাবে প্যারেন্ট ক্যাট। 
                    //এখানে "shiftChild" মডেল এর রিলেশন মেথড

                }
                return redirect()->route('category.index')->with('success', 'Category deleted successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong!');
            }
        } else {
            return back()->with('error', 'Data not found');
        }
    }


    public function getChildByParentID(Request $request, $id)
    {
        //dd($id);

        $category = Categorie::find($id);
        if ($category) {

            $child_id = Categorie::getChildByParentID($id);

            if (count($child_id) <= 0) {
                return response()->json(['status' => false, 'data' => null, 'msg' => 'Child Category not found in database,create a child category first']);
            }
            return response()->json(['status' => true, 'data' => $child_id, 'msg' => '']);
        } else {
            return response()->json(['status' => false, 'data' => null, 'msg' => 'Category not found in database,create a child category first']);
        }
    }
}
