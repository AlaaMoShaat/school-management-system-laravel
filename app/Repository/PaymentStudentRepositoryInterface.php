<?php

namespace App\Repository;

interface PaymentStudentRepositoryInterface{

    public function index();

    public function createPaymentStudent($id);

    public function editPaymentStudent($id);

    public function store($request);

    public function update($request);

    public function destroy($request);
}
