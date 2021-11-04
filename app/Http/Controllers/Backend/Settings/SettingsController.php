<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    //
    public function settings()
    {
        $setting=Settings::first();
        return view('Backend.Layouts.Settings.settings',compact('setting'));
    }
    public function settingsUpdate(Request $request)
    {
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';

        $request->validate([
            'title'         =>'string|required',
            'meta_description'          =>'string|required',
            'meta_keywords' =>'string|required',
            'logo'=>'required',
            'favicon'=>'required',
            'address'        =>'string|required',
            'email' =>'email|required',
            'phone'=>'numeric|required',
            'fax' =>'required',
            'footer'        =>'string|required',
            'facebook_url' =>  'required|regex:'.$regex,
            'twitter_url' =>  'required|regex:'.$regex,
            'linkedin_url' =>  'required|regex:'.$regex,

        ]);
        //return $request->all();
        $updateSetting=Settings::first(); //this will only update first row
        //$Settings= new Settings(); //this wiill create new row 
        $updateSetting->title=$request->input('title');
        $updateSetting->meta_description=$request->input('meta_description');
        $updateSetting->meta_keywords=$request->input('meta_keywords');
        $updateSetting->logo=$request->input('logo');
        $updateSetting->favicon=$request->input('favicon');
        $updateSetting->address=$request->input('address');
        $updateSetting->email=$request->input('email');
        $updateSetting->phone=$request->input('phone');


        $updateSetting->fax=$request->input('fax');
        $updateSetting->footer=$request->input('footer');
        $updateSetting->facebook_url=$request->input('facebook_url');
        $updateSetting->twitter_url=$request->input('twitter_url');
        $updateSetting->linkedin_url=$request->input('linkedin_url');
        $updateSetting->save();

        if($updateSetting)
        {
            return back()->with('success','Information updated successfully');
        }
        else{
            return back()->withErrors('Something went wrong');
        }

        // another way of updating data is- 
        // $updateSetting->fill($request->all());

    }
}
