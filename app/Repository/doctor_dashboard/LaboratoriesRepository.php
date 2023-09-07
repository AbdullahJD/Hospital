<?php

namespace App\Repository\doctor_dashboard;

use App\Interfaces\doctor_dashboard\LaboratoriesRepositoryInterface;
use App\Models\Laboratorie;
use Illuminate\Support\Facades\DB;

class LaboratoriesRepository implements LaboratoriesRepositoryInterface
{

    public function store($request)
    {
        try {
            $laboratories = new Laboratorie();
            $laboratories->description = $request->description;
            $laboratories->invoice_id = $request->invoice_id;
            $laboratories->patient_id = $request->patient_id;
            $laboratories->doctor_id = $request->doctor_id;
            $laboratories->save();

            DB::commit();
            session()->flash('add');
            return redirect()->back();
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request, $id)
    {
        try {
            $laboratories = Laboratorie::findorfail($id);
            $laboratories->update([
                'description' => $request->description,
            ]);
            DB::commit();
            session()->flash('edit');
            return redirect()->back();
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        Laboratorie::destroy($id);
        session()->flash('delete');
        return redirect()->back();
    }
}
