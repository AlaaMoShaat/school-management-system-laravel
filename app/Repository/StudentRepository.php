<?php

namespace App\Repository;

use App\Models\Blood;
use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Image;
use App\Models\MyParent;
use App\Models\Nationality;
use App\Models\Religion;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentRepository implements StudentRepositoryInterface{



    public function GetAllStudents(){
        $students= Student::all();
        return view('cms.student.index' , compact('students'));
    }


    public function CreateStudent(){
        $data['parents'] = MyParent::all();
        $data['nationalities'] = Nationality::all();
        $data['religions'] = Religion::all();
        $data['genders'] = Gender::all();
        $data['bloods'] = Blood::all();
        $data['grades'] = Grade::all();
        return view('cms.student.create', $data);
    }


    public function EditStudent($id){
        $students = Student::findOrFail($id);
        $data['parents'] = MyParent::all();
        $data['nationalities'] = Nationality::all();
        $data['religions'] = Religion::all();
        $data['genders'] = Gender::all();
        $data['bloods'] = Blood::all();
        $data['grades'] = Grade::all();
        $data['classrooms'] = Classroom::where('grade_id' , $students->grade->id)->get();
        $data['sections'] = Section::where('classroom_id' , $students->classroom->id)->get();
        return view('cms.student.edit', $data , compact('students'));
    }


    public function StoreStudent($request){

        DB::beginTransaction();

        try {
            $students = new Student();
            $students->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->gender_id = $request->gender_id;
            $students->nationality_id = $request->nationality_id;
            $students->blood_id = $request->blood_id;
            $students->religion_id = $request->religion_id;
            $students->date_birth = $request->date_birth;
            $students->grade_id = $request->grade_id;
            $students->classroom_id = $request->classroom_id;
            $students->section_id = $request->section_id;
            $students->parent_id = $request->parent_id;
            $students->academic_year = $request->academic_year;
            $students->save();


            // in config->filesystems
            // 'upload_attachments' => [
            //     'driver' => 'local',
            //     'root' => public_path('/'),
            //     'url' => env('APP_URL').'/storage',
            //     'visibility' => 'public',
            // ],


            if($request->hasfile('photos'))
            {
                foreach($request->file('photos') as $file)
                {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/Students/'.$students->name , $name ,'upload_attachments');

                    // insert in images_table
                    $images= new Image();
                    $images->filename = $name;
                    $images->imageable_id = $students->id;
                    $images->imageable_type = 'App\Models\Student';
                    $images->save();
                }
            }

            DB::commit();


            toastr()->success(trans('messages.Success'));
            return redirect()->route('students.index');
        }

        catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    public function UpdateStudent($request){

        try {
            $students = Student::findOrFail($request->id);
            $students->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->gender_id = $request->gender_id;
            $students->nationality_id = $request->nationality_id;
            $students->blood_id = $request->blood_id;
            $students->religion_id = $request->religion_id;
            $students->date_birth = $request->date_birth;
            $students->grade_id = $request->grade_id;
            $students->classroom_id = $request->classroom_id;
            $students->section_id = $request->section_id;
            $students->parent_id = $request->parent_id;
            $students->academic_year = $request->academic_year;
            $students->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('students.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    public function DeleteStudent($request)
    {
        Student::findOrFail($request->id)->forceDelete();
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('students.index');
    }


    public function StudentAttachments($id)
    {

        $students = Student::findOrFail($id);
        return view('cms.student.attachments' , compact('students'));
    }


    public function UploadAttachments($request)
    {
        $studentId = $request->input('student_id');
        $studentName = $request->input('student_name');

        foreach($request->file('photos') as $file)
                {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/Students/'.$studentName , $name ,'upload_attachments');

                    // insert in images_table
                    $images = new Image();
                    $images->filename = $name;
                    $images->imageable_id = $studentId;
                    $images->imageable_type = 'App\Models\Student';
                    $images->save();
                }
                toastr()->success(trans('messages.Success'));
                return redirect()->route('student_attachments' , $studentId);
    }


    public function DownloadAttachment($studentname, $filename)
    {
        return response()->download(public_path('attachments/Students/'.$studentname.'/'.$filename));
    }


    public function DeleteAttachment($request)
    {
        Storage::disk('upload_attachments')->delete('attachments/Students/'.$request->student_name.'/'.$request->file_name);
        Image::destroy($request->id);
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('student_attachments' , $request->student_id);
    }

}