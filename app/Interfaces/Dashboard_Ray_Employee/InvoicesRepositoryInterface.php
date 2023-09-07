<?php

namespace App\Interfaces\Dashboard_Ray_Employee;

interface InvoicesRepositoryInterface
{
    public function index();
    public function completedInvoices();
    public function viewRays($id);
    public function edit($id);
    public function update($request,$id);
    public function destroy($id);
}
