<?php

namespace App\Interfaces\insurances;

interface insuranceRepositoryInterface
{
    // get All insurances
    public function index();

    public function create();

    public function store($request);

    public function edit($id);

    public function update($request);

    public function destroy($request);

}
