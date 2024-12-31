<?php

namespace App\Http\Controllers;

use App\Repository\SubjectRepositoryInterface;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    protected $Subject;

    public function __construct(SubjectRepositoryInterface $Subject)
    {
        $this->Subject = $Subject;
    }

    public function index()
    {
        return $this->Subject->index();
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        return $this->Subject->store($request);
    }


    public function show($id)
    {

    }


    public function edit($id)
    {

    }


    public function update(Request $request)
    {
        return $this->Subject->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Subject->destroy($request);
    }

    public function getTeachers($id)
    {
        return $this->Subject->getTeachers($id);
    }
}