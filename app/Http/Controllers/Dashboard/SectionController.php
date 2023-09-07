<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Sections\SectionRepositoryInterface;

class SectionController extends Controller
{
    private $Sections;

    public function __construct(SectionRepositoryInterface $Sections)
    {
        $this->Sections = $Sections;
    }

    public function index()
    {
        return  $this->Sections->index();

    }

    public function store(Request $request)
    {
        return $this->Sections->store($request);
    }


    public function update(Request $request)
    {
        return $this->Sections->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Sections->destroy($request);
    }

    public function show($id)
    {
        return $this->Sections->show($id);
    }
}
