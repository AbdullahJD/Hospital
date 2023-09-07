<?php

namespace App\Repository\Patients;

use App\Interfaces\Patients\PatientRepositoryInterface;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\Ray;
use App\Models\ReceiptAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PatientRepository implements PatientRepositoryInterface
{

    public function index()
    {
        $Patients = Patient::all();
        return view('Dashboard.Patients.index',compact('Patients'));
    }

    public function create()
    {
        $Patients = Patient::all();
        return view('Dashboard.Patients.create',compact('Patients'));
    }

    public function store($request)
    {
        try {
            $Patients = new Patient();
            $Patients->email = $request->email;
            $Patients->password = Hash::make($request->password);
            $Patients->Date_Birth = $request->Date_Birth;
            $Patients->Phone = $request->Phone;
            $Patients->Gender = $request->Gender;
            $Patients->Blood_Group = $request->Blood_Group;
            $Patients->save();

            //Store trans
            $Patients->name = $request->name;
            $Patients->Address = $request->Address;
            $Patients->save();

            DB::commit();
            session()->flash('add');
            return redirect()->route('Patients.index');
        }
        catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function Show($id)
    {
        $Patient = patient::findorfail($id);
        $invoices = Invoice::where('patient_id', $id)->get();
        $receipt_accounts = ReceiptAccount::where('patient_id', $id)->get();
        $Patient_accounts = PatientAccount::where('patient_id', $id)->get();
        $patient_rays = Ray::where('patient_id',$id)->get();
        return view('Dashboard.Patients.show', compact('Patient', 'invoices', 'receipt_accounts', 'Patient_accounts','patient_rays'));
    }

    public function edit($id)
    {
            $Patient = Patient::findorfail($id);
            return view('Dashboard.Patients.edit',compact('Patient'));
    }

    public function update($request)
    {
        try {
            $Patient = Patient::findorfail($request->id);

            $Patient->update($request->all());

            //store trans
            $Patient->name = $request->name;
            $Patient->Address = $request->Address;
            $Patient->save();

            DB::commit();
            session()->flash('edit');
            return redirect()->route('Patients.index');
        }
        catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function destroy($request)
    {
        Patient ::destroy($request->id);
        session()->flash('delete');
        return redirect()->back();
    }

}
