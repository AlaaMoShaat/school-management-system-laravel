<?php

namespace App\Repository;

interface TeacherRepositoryInterface{

    public function GetAllTeachers();

    public function GetAllSpecializations();

    public function GetAllGenders();

    public function StoreTeacher($request);

    public function EditTeacher($id);

    public function UpdateTeacher($request);

    public function DeleteTeacher($request);

}
