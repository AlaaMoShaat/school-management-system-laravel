<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeachers;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\TeacherSection;
use App\Repository\TeacherRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{

    protected $Teacher;

    public function __construct(TeacherRepositoryInterface $Teacher)
    {
        $this->Teacher = $Teacher;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Teachers = $this->Teacher->GetAllTeachers();
        return view('cms.teacher.index' , compact('Teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specializations = $this->Teacher->GetAllSpecializations();
        $genders = $this->Teacher->GetAllGenders();
        return view('cms.teacher.create' , compact('specializations' , 'genders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeachers $request)
    {
        return $this->Teacher->StoreTeacher($request);
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
        $Teachers = $this->Teacher->EditTeacher($id);
        $specializations = $this->Teacher->GetAllSpecializations();
        $genders = $this->Teacher->GetAllGenders();
        return view('cms.teacher.edit' , compact('specializations' , 'genders' , 'Teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTeachers $request)
    {
        return $this->Teacher->UpdateTeacher($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ts = DB::table('teacher_section')->where('teacher_id' , $request->id)->delete();
        return $this->Teacher->DeleteTeacher($request);

    }

}