<?php

namespace App\Repository\doctor_dashboard;

use App\Interfaces\doctor_dashboard\InvoicesRepositoryInterface;
use App\Models\Invoice;
use App\Models\Ray;
use Egulias\EmailValidator\Result\Reason\AtextAfterCFWS;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InvoicesRepository implements InvoicesRepositoryInterface
{
    // قائمة كشوفات تحت الاجراء
    public function index()
    {
        $invoices = Invoice::where('doctor_id', Auth::user()->id)->where('invoice_status',1)->get();
//        $invoices = Invoice::all();
        return view('Dashboard.doctor.invoices.index', compact('invoices'));
    }
    //قائمة المراجعات
    public function reviewInvoices()
    {
        $invoices = Invoice::where('doctor_id',Auth::user()->id)->where('invoice_status',2)->get();

        return view('Dashboard.doctor.invoices.review_invoices', compact('invoices'));
    }
    // قائمة الكشوفات المكتملة
    public function completedInvoicss()
    {
        $invoices = Invoice::where('doctor_id', Auth::user()->id)->where('invoice_status',3)->get();
        return view('Dashboard.doctor.invoices.completed_invoices', compact('invoices'));

    }
    public function show($id)
    {
        $rays = Ray::findorFail($id);
        if($rays->doctor_id !=auth()->user()->id){
            //abort(404);
            return redirect()->route('404');
        }
        return view('Dashboard.Doctor.invoices.view_rays', compact('rays'));
    }
}
