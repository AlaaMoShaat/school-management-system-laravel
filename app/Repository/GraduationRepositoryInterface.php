<?php

namespace App\Repository;

interface GraduationRepositoryInterface{

    public function indexGraduation();

    public function createGraduation();

    public function graduation($request);

    public function returnStudent($id);

    public function deleteStudent($id);

}