<?php
namespace App\Repository\Services;



use App\Interfaces\Services\SingleServiceRepositoryInterface;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class SingleServiceRepository implements SingleServiceRepositoryInterface
{
    public function index()
    {
        $services = Service::all();
        return view('Dashboard.Services.Single Service.index',compact('services'));
    }

    public function store($request)
    {
        try {

            $services = new Service();

            //services Table
            $services->price = $request->price;
            $services->description = $request->description;
            $services->status = 1;
            $services->save();

            //services_translation table
            $services->name = $request->name;
            $services->save();

            DB::commit();
            session()->flash('add');
            return redirect()->route('Service.index');

        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try {

            $SingleService = Service::findOrFail($request->id);
            $SingleService->price = $request->price;
            $SingleService->description = $request->description;
            $SingleService->status = $request->status;
            $SingleService->save();

            // store trans
            $SingleService->name = $request->name;
            $SingleService->save();

            session()->flash('edit');
            return redirect()->route('Service.index');

        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        Service::findorfail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('Service.index');
    }
}
