<?php

namespace App\Http\Controllers\doctors;

use App\Http\Controllers\Controller;
use App\Interfaces\doctor_dashboard\RaysRepositoryInterface;
use Illuminate\Http\Request;

class RayController extends Controller
{
    private $ray;

    public function __construct(RaysRepositoryInterface $ray)
    {
        $this->Ray = $ray;
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
        return $this->Ray->store($request);
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
        return $this->Ray->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->Ray->destroy($id);
    }
}
