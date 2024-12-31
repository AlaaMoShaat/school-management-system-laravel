<?php

namespace App\Repository;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface{

  public function GetAllTeachers(){
      return Teacher::all();
  }

  public function GetAllSpecializations(){
    return Specialization::all();
}

public function GetAllGenders(){
    return Gender::all();
}

public function StoreTeacher($request){

    try {
            $Teachers = new Teacher();
            $Teachers->email = $request->email;
            $Teachers->password =  Hash::make($request->password);
            $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teachers->Specialization_id = $request->Specialization_id;
            $Teachers->Gender_id = $request->Gender_id;
            $Teachers->Joining_Date = $request->Joining_Date;
            $Teachers->Address = ['en' => $request->Address_en, 'ar' => $request->Address_ar];
            $Teachers->save();
            toastr()->success(trans('messages.Success'));
            return redirect()->route('teachers.index');
        }
    catch (Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
    }

}

public function EditTeacher($id){
    return Teacher::findOrFail($id);
}

public function UpdateTeacher($request){
        try {
            $Teachers = Teacher::findOrFail($request->id);
            $Teachers->email = $request->Email;
            $Teachers->password =  Hash::make($request->Password);
            $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teachers->Specialization_id = $request->Specialization_id;
            $Teachers->Gender_id = $request->Gender_id;
            $Teachers->Joining_Date = $request->Joining_Date;
            $Teachers->Address = ['en' => $request->Address_en, 'ar' => $request->Address_ar];
            $Teachers->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('teachers.index');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
}

public function DeleteTeacher($request)
    {
        Teacher::destroy($request->id);
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('teachers.index');
    }

}