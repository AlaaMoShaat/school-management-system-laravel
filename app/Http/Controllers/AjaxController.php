<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Section;

class AjaxController extends Controller
{
    public function Get_Classrooms($id)
    {
        return Classroom::where("grade_id", $id)->pluck("name", "id");
    }

    public function Get_Sections($id)
    {
        return Section::where("classroom_id", $id)->pluck("name", "id");
    }
}