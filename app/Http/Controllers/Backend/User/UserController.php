<?php

namespace App\Http\Controllers\Backend\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Seller::orderBy('id', 'DESC')->paginate(4);
        //dd($allBanners);
        return view('Backend.Layouts.User.index', compact('users'));
  
    }

    public function userStatus(Request $request)
    {
        //dd($request->all());
        if ($request->mode == 'true') {

            DB::table('sellers')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('sellers')->where('id', $request->id)->update(['status' => 'inactive']);
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
        return view('Backend.Layouts.User.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sellerAdd()
    {
        return view('Backend.Layouts.User.sellerCreate');
    }
   
    public function store(Request $request)
    {
        $request->validate([
            
            'email'          =>  'required',
        ]);

        $status=Seller::create([

            'email'     =>$request->email,
            'password'  =>bcrypt('123456'),
        ]);
        if ($status) {
            //dd('ok');
            return redirect()->route('user.index')->with('success', 'Seller registered successfully');
        } else {

            return redirect()->back()->with('error','Something went wrong');
        }
    }


    public function userprofile()
    {
        $data=auth('seller')->user();
        //dd($data);
        return view('Backend.Layouts.Profile.profile',compact('data'));
    }

    public function profilepicture(Request $request)
    {
        // $data=User::find(auth()->user()->id);
        // //dd($data);

        $selectprofile = auth('seller')->user();

        $status=$selectprofile;
        
        $request->validate([
            'password'=>'sometimes|required',
            'photo'=>'required',
            // 'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $selectprofile->photo=$request->input('photo');
        $status=$selectprofile->save();

        // $status=$selectprofile->update([
        //     'photo'=>$request->photo,

        // ]);

        if($status){
            return redirect()->route('profile')->with('success','Profile Picture updated successfully');
        }else{
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    public function changepassword(Request $request)
    {
        //return $request->all();
        $info=auth('seller')->user();
        //return $info->password;
        if (!Hash::check($request->input('OldPassword'), $info->password)) {
            //dd('not matching');
            return back()->withErrors('Current Password does not match.');
        }


        $request->validate([
            'OldPassword' => 'required',
            'NewPassword' => 'required|min:6',
            'NewPasswordConfirm' => 'required|same:NewPassword'

        ]);


        if (Hash::check($request->input('NewPassword'), $info->password)) {
            //dd('checked');
            return back()->withErrors('New password can not be the old password.');
        }

        
        $users = Seller::find($info->id);
        // dd($users);
        $users->update([
            'password' => bcrypt($request->NewPassword)
        ]);

        // $users->password = $request->bcrypt($request->password);
        // $users->save();
        return back()->with('success', 'Password updated successfully.');

    }

    
    public function basicinfo(Request $request)
    {
        // $selectprofile= Auth::user();
        $selectprofile=auth('seller')->user();

        $status=$request->validate([
            'full_name' =>'required|string',
            'username'  =>'required|string',
            'gender'    =>'required',
            'phone'     =>'required|numeric',
            'address'   =>'required'
        ]);

        $selectprofile->full_name   = $request->input('full_name');
        $selectprofile->username    = $request->input('username');
        $selectprofile->gender      = $request->input('gender');
        $selectprofile->phone       = $request->input('phone');
        $selectprofile->address     = $request->input('address');
        //dd($selectprofile);
        $status=$selectprofile->save();

        if($status){
            return redirect()->back()->with('success','Profile info updated successfully');
        }else{
            return redirect()->back()->with('error','Something went wrong');
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
       
        $user = User::find($id); //find each data by their id
        if ($user) {
            $status = $user->delete();
            if ($status) {
                return redirect()->route('user.index')->with('success', 'user deleted successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong!');
            }
        } else {
            return back()->with('error', 'Data not found');
        }
    }
    
}
