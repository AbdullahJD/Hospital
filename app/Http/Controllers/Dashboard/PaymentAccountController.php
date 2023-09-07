<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Finance\PaymentRepositoryInterface;
use Illuminate\Http\Request;

class PaymentAccountController extends Controller
{
    private $payment;
    public function __construct(PaymentRepositoryInterface $payment)
    {
        $this->Payment = $payment;
    }

    public function index()
    {
        return $this->Payment->index();
    }


    public function create()
    {
        return $this->Payment->create();
    }


    public function store(Request $request)
    {
        return $this->Payment->store($request);
    }

    public function show(string $id)
    {
        return $this->Payment->show($id);
    }


    public function edit(string $id)
    {
        return $this->Payment->edit($id);
    }


    public function update(Request $request)
    {
        return $this->Payment->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Payment->destroy($request);
    }
}
