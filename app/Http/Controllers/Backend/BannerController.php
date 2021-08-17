<?php

namespace App\Http\Controllers\Backend;

//use Dotenv\Util\Str;
use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allBanners = Banner::orderBy('id', 'DESC')->paginate(4);
        //dd($allBanners);
        return view('Backend.Layouts.Banner.index', compact('allBanners'));
    }

    public function bannerStatus(Request $request)
    {
        //dd($request->all());
        if ($request->mode == 'true') {

            DB::table('banners')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('banners')->where('id', $request->id)->update(['status' => 'inactive']);
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
        return view('Backend.Layouts.Banner.create');
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
            'description'   =>  'required',
            'condition'     =>  'required',
            'photo'         =>  'required',
            'status'        =>  'required',
        ]);

        //dd($request->all());
        $data = $request->all();

        $slug = Str::slug($request->input('title'));
        $slug_count = Banner::where('slug', $slug)->count();
        if ($slug_count > 0) {
            $slug = time() . '-' . $slug;
        }
        $data['slug'] = $slug;
        // return $data;
        $status = Banner::create($data);  //create or storing data on Banner Table 


        if ($status) {
            //dd('ok');
            return redirect()->route('banner.create')->with('success', 'Banner Created successfully');
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
        $banner = Banner::find($id); //find each  data by their id
        if ($banner) {
            return view('Backend.Layouts.Banner.edit', compact('banner'));
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
        $banner = Banner::find($id);
        if ($banner) {

            //dd($request->all());
            $request->validate([
                'title'         =>  'string|required',
                'description'   =>  'required',
                'condition'     =>  'required',
                'photo'         =>  'required',
                'status'        =>  'required',
            ]);

            //dd($request->all());
            $data = $request->all();
            $status = $banner->fill($data)->save();  //create or storing data on Banner Table 


            if ($status) {
                //dd('ok');
                return redirect()->route('banner.index')->with('success', 'Banner updated successfully');
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
        $banner = Banner::find($id); //find each data by their id
        if ($banner) {
            $status=$banner->delete();
            if ($status) {
                return redirect()->route('banner.index')->with('success','Banner deleted successfully');
            } else {
               return redirect()->back()->with('error','Something went wrong!');
            }
            
        } else {
            return back()->with('error', 'Data not found');
        }
    }
}
