<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\RayEmployee\RayEmployeeRepositoryInterface;
use Illuminate\Http\Request;

class RayEmployeeController extends Controller
{
    private $employees;

    public function __construct(RayEmployeeRepositoryInterface $employees)
    {
        $this->Employee = $employees;
    }

    public function index()
    {
        return $this->Employee->index();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        return $this->Employee->store($request);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        return $this->Employee->update($request,$id);
    }

    public function destroy(string $id)
    {
        return $this->Employee->destroy($id);
    }
}
