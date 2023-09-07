<?php
namespace App\Repository\insurances;

use App\Interfaces\insurances\insuranceRepositoryInterface;
use App\Models\Insurance;
use Illuminate\Support\Facades\DB;


class insuranceRepository implements insuranceRepositoryInterface
{
    public function index()
    {
        $insurances = Insurance::all();
        return view('Dashboard.insurance.index', compact('insurances'));
    }

    public function create()
    {
        $insurances = Insurance::all();
        return view('Dashboard.insurance.create', compact('insurances'));
    }

    public function store($request)
    {
        try {
            $insurances = new Insurance();
            $insurances->insurance_code = $request->insurance_code;
            $insurances->discount_percentage = $request->discount_percentage;
            $insurances->Company_rate = $request->Company_rate;
            $insurances->status = 1;
            $insurances->save();

            // store trans
            $insurances->name = $request->name;
            $insurances->notes = $request->notes;
            $insurances->save();


            DB::commit();
            session()->flash('add');
            return redirect()->route('insurance.index');
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $insurances = Insurance::findorfail($id);
        return view('Dashboard.insurance.edit', compact('insurances'));
    }

    public function update($request)
    {
        try {

            if ($request->has('status'))
                $request->request->add(['status' => 1]);
            else
                $request->request->add(['status' => 0]);

            $insurances = Insurance::findorfail($request->id);

            $insurances->update($request->all());

            // store trans
            $insurances->name = $request->name;
            $insurances->notes = $request->notes;
            $insurances->save();

            session()->flash('edit');
            return redirect()->route('insurance.index');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function destroy($request)
    {
        Insurance::destroy($request->id);
        session()->flash('delete');
        return redirect()->route('insurance.index');
    }
}
