<?php

namespace App\Repository;

interface ProcessingFeeRepositoryInterface{

    public function index();

    public function createProcessingFee($id);

    public function editProcessingFee($id);

    public function store($request);

    public function update($request);

    public function destroy($request);
}