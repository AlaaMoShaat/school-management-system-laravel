<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFees;
use App\Repository\FeeRepositoryInterface;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    protected $Fee;

    public function __construct(FeeRepositoryInterface $Fee)
    {
        $this->Fee = $Fee;
    }

    public function index()
    {
        return $this->Fee->index();
    }


    public function create()
    {
        return $this->Fee->create();
    }


    public function store(StoreFees $request)
    {
        return $this->Fee->store($request);
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        return $this->Fee->edit($id);
    }


    public function update(StoreFees $request)
    {
        return $this->Fee->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Fee->destroy($request);
    }
}