<?php

namespace App\Http\Controllers\doctors;

use App\Http\Controllers\Controller;
use App\Interfaces\doctor_dashboard\LaboratoriesRepositoryInterface;
use Illuminate\Http\Request;

class LaboratorieController extends Controller
{
    private $laboratories;

    public function __construct(LaboratoriesRepositoryInterface $laboratories)
    {
        $this->Laboratorie = $laboratories;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        return $this->Laboratorie->store($request);
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
        return $this->Laboratorie->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->Laboratorie->destroy($id);
    }
}
