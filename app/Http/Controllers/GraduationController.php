<?php

namespace App\Http\Controllers;

use App\Repository\GraduationRepositoryInterface;
use Illuminate\Http\Request;

class GraduationController extends Controller
{
    protected $Graduation;

    public function __construct(GraduationRepositoryInterface $Graduation)
    {
        $this->Graduation = $Graduation;
    }

    public function indexGraduation()
    {
        return $this->Graduation->indexGraduation();
    }

    public function createGraduation()
    {
        return $this->Graduation->createGraduation();
    }

    public function graduation(Request $request)
    {
        return $this->Graduation->graduation($request);
    }

    public function returnStudent($id)
    {
        return $this->Graduation->returnStudent($id);
    }

    public function deleteStudent($id)
    {
        return $this->Graduation->deleteStudent($id);
    }
}