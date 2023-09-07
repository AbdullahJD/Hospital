<?php

namespace App\Repository\Ambulances;

use App\Models\Ambulance;
use Illuminate\Support\Facades\DB;

class AmbulanceRepository implements \App\Interfaces\Ambulances\AmbulanceRepositoryInterface
{

    public function index()
    {
        $ambulances = Ambulance::all();
        return view('Dashboard.Ambulances.index',compact('ambulances'));
    }

    public function create()
    {
        $ambulances = Ambulance::all();
        return view('Dashboard.Ambulances.create',compact('ambulances'));
    }

    public function store($request)
    {
        try {
            $ambulances = new Ambulance();
            $ambulances->car_number = $request->car_number;
            $ambulances->car_model = $request->car_model;
            $ambulances->car_year_made = $request->car_year_made;
            $ambulances->driver_license_number = $request->driver_license_number;
            $ambulances->driver_phone = $request->driver_phone;
            $ambulances->is_available = 1;
            $ambulances->car_type = $request->car_type;
            $ambulances->save();

            //store trans
            $ambulances->driver_name = $request->driver_name;
            $ambulances->notes = $request->notes;
            $ambulances->save();

            DB::commit();
            session()->flash('add');
            return redirect()->route('Ambulance.index');

        }

        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function edit($id)
    {
        $ambulance = Ambulance::findorfail($id);
        return view('Dashboard.Ambulances.edit',compact('ambulance'));
    }

    public function update($request)
    {
        try {
            if (!$request->has('is_available'))
                $request->request->add(['is_available' =>0]);
            else
                $request->request->add(['is_available' =>1]);

            $ambulance = Ambulance::findorfail($request->id);

            $ambulance->update($request->all());

            //store trans
            $ambulance->driver_name = $request->driver_name;
            $ambulance->notes = $request->notes;
            $ambulance->save();

            DB::commit();
            session()->flash('edit');
            return redirect()->route('Ambulance.index');
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        Ambulance::destroy($request->id);
        session()->flash('delete');
        return redirect()->route('Ambulance.index');
    }
}
