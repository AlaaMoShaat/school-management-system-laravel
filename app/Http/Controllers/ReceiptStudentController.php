<?php

namespace App\Http\Controllers;

use App\Repository\ReceiptStudentRepositoryInterface;
use Illuminate\Http\Request;

class ReceiptStudentController extends Controller
{

    protected $Receipt;

    public function __construct(ReceiptStudentRepositoryInterface $Receipt)
    {
        $this->Receipt = $Receipt;
    }

    public function index()
    {
        return $this->Receipt->index();
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        return $this->Receipt->store($request);
    }


    public function show($id)
    {
        return $this->Receipt->createReceipt($id);
    }


    public function edit($id)
    {
        return $this->Receipt->editReceipt($id);
    }


    public function update(Request $request)
    {
        return $this->Receipt->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Receipt->destroy($request);
    }
}