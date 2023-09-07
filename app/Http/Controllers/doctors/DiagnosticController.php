<?php

namespace App\Http\Controllers\doctors;

use App\Http\Controllers\Controller;
use App\Interfaces\doctor_dashboard\DiagnosisRepositoryInterface;
use App\Models\Diagnostic;
use Illuminate\Http\Request;

class DiagnosticController extends Controller
{
    private $diagnostic;

    public function __construct(DiagnosisRepositoryInterface $diagnostic)
    {
        $this->Diagnostic = $diagnostic;
    }

    public function index()
    {

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        return $this->Diagnostic->store($request);
    }


    public function show(string $id)
    {
        return $this->Diagnostic->show($id);
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
    public function addReview(Request $request)
    {
        return $this->Diagnostic->addReview($request);
    }

}
