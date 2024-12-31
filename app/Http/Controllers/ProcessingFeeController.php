<?php

namespace App\Http\Controllers;

use App\Repository\ProcessingFeeRepositoryInterface;
use Illuminate\Http\Request;

class ProcessingFeeController extends Controller
{

    protected $ProcessingFee;

    public function __construct(ProcessingFeeRepositoryInterface $ProcessingFee)
    {
        $this->ProcessingFee = $ProcessingFee;
    }

    public function index()
    {
        return $this->ProcessingFee->index();
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        return $this->ProcessingFee->store($request);
    }


    public function show($id)
    {
        return $this->ProcessingFee->createProcessingFee($id);
    }


    public function edit($id)
    {
        return $this->ProcessingFee->editProcessingFee($id);
    }


    public function update(Request $request)
    {
        return $this->ProcessingFee->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->ProcessingFee->destroy($request);
    }
}