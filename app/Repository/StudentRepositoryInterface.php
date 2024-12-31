<?php

namespace App\Repository;

interface StudentRepositoryInterface{

    public function GetAllStudents();

    public function CreateStudent();

    public function StoreStudent($request);

    public function EditStudent($id);

    public function UpdateStudent($request);

    public function DeleteStudent($request);

    public function StudentAttachments($id);

    public function UploadAttachments($request);

    public function DownloadAttachment($studentname, $filename);

    public function DeleteAttachment($request);

}
