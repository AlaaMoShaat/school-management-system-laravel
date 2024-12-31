<?php

namespace App\Http\Controllers\Dashboards\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index(){
        $info = Teacher::findOrFail(auth()->user()->id);
        return view('cms.dashboards.teacher.profile' , compact('info'));
    }


    public function update(Request $request){
        try{
            $info = Teacher::findOrFail($request->id);
            if(!empty('password')){
                $info->password =  Hash::make($request->password);
            }
            $info->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
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
