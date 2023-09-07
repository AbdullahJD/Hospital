<?php

namespace App\Repository\LaboratorieEmployee;

use App\Interfaces\LaboratorieEmployee\LaboratorieEmployeeRepositoryInterface;
use App\Models\LaboratorieEmployee;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LaboratorieEmployeeRepository implements LaboratorieEmployeeRepositoryInterface
{

    public function index()
    {
        $laboratorie_employees = LaboratorieEmployee::all();

        return view('Dashboard.laboratorie_employee.index',compact('laboratorie_employees'));
    }

    public function store($request)
    {
        try {
            $laboratorie_employees = new LaboratorieEmployee();
            $laboratorie_employees->name = $request->name;
            $laboratorie_employees->email = $request->email;
            $laboratorie_employees->password = Hash::make($request->password);
            $laboratorie_employees->save();

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
        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }
        else{
            $input = Arr::except($input, ['password']);
        }
        $laboratorie_employees = LaboratorieEmployee::find($id);
        $laboratorie_employees->update($input);

        session()->flash('edit');
        return redirect()->back();
    }

    public function destroy($id)
    {
        LaboratorieEmployee::destroy($id);
        session()->flash('delete');
        return redirect()->back();
    }
}
