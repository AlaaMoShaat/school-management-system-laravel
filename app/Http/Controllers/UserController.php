<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
        $users = User::all();
        return view('cms.admin.admins' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $user = new User();
            $user->email = $request->email;
            $user->password =  Hash::make($request->password);
            $user->name = ['en' => $request->name_en, 'ar' => $request->name];
            $user->save();
            toastr()->success(trans('messages.Success'));
            return redirect()->route('users.index');
        }
    catch (\Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $user = User::findOrFail($request->id);
            $user->email = $request->email;
            $user->password =  Hash::make($request->password);
            $user->name = ['en' => $request->name_en, 'ar' => $request->name];
            $user->save();
            toastr()->success(trans('messages.update'));
            return redirect()->route('users.index');
        }
    catch (\Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        User::destroy($request->id);
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('users.index');
    }
}