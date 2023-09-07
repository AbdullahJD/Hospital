<?php

namespace App\Http\Controllers\doctors;

use App\Http\Controllers\Controller;
use App\Interfaces\doctor_dashboard\InvoicesRepositoryInterface;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    private $invoices;

    public function __construct(InvoicesRepositoryInterface $invoices)
    {
        $this->Invoice = $invoices;
    }
    public function index()
    {
        return $this->Invoice->index();
    }


    public function completedInvoicss()
    {
        return $this->Invoice->completedInvoicss();
    }

    public function reviewInvoices()
    {
        return $this->Invoice->reviewInvoices();
    }
    public function show($id)
    {
        return $this->Invoice->show($id);
    }
}
