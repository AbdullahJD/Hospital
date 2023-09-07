<?php

namespace App\Interfaces\doctor_dashboard;

interface InvoicesRepositoryInterface
{
    // Get Invoices Doctor
    public function index();

    public function reviewInvoices();

    public function completedInvoicss();
    public function show($id);
}
