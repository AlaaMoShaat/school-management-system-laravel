<?php

namespace App\Http\Controllers\Dashboards\Parent;

use App\Http\Controllers\Controller;
use App\Models\MyParent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $info = MyParent::findOrFail(auth()->user()->id);
        return view('cms.dashboards.parent.profile' , compact('info'));
    }


    public function update(Request $request){
        try{
            $info = MyParent::findOrFail($request->id);
            if(!empty('password')){
                $info->password =  Hash::make($request->password);
            }
            $info->Name_Father = ['en' => $request->Name_Father_en, 'ar' => $request->Name_Father_ar];
            $info->Name_Mother = ['en' => $request->Name_Mother_en, 'ar' => $request->Name_Mother_ar];
            $info->email = $request->email;
            $info->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}