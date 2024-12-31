<?php

namespace App\Repository;

interface ReceiptStudentRepositoryInterface{

    public function index();

    public function createReceipt($id);

    public function editReceipt($id);

    public function store($request);

    public function update($request);

    public function destroy($request);
}