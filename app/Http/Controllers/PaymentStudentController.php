<?php

namespace App\Http\Controllers;

use App\Repository\PaymentStudentRepositoryInterface;
use Illuminate\Http\Request;

class PaymentStudentController extends Controller
{

    protected $Payment;

    public function __construct(PaymentStudentRepositoryInterface $Payment)
    {
        $this->Payment = $Payment;
    }

    public function index()
    {
        return $this->Payment->index();
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        return $this->Payment->store($request);
    }


    public function show($id)
    {
        return $this->Payment->createPaymentStudent($id);
    }


    public function edit($id)
    {
        return $this->Payment->editPaymentStudent($id);
    }


    public function update(Request $request)
    {
        return $this->Payment->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Payment->destroy($request);
    }
}