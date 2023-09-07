<?php

use App\Http\Controllers\Dashboard_Laboratorie_Employee\InvoiceController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| laboratorie_employee Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
    //################################ dashboard laboratorie_employee ########################################

    Route::get('/dashboard/laboratorie_employee', function () {
        return view('Dashboard.dashboard_LaboratorieEmployee.dashboard');
    })->middleware(['auth:laboratorie_employee'])->name('dashboard.laboratorie_employee');
    //################################ end dashboard laboratorie_employee #####################################

    Route::middleware(['auth:laboratorie_employee'])->group(function () {

        //############################# invoices route ##########################################
        Route::resource('invoices_laboratorie_employee', InvoiceController::class);
        Route::get('completed_invoices', [InvoiceController::class, 'completed_invoices'])->name('completed_invoices');
        Route::get('view_laboratoriess/{id}', [InvoiceController::class, 'view_laboratories'])->name('view_laboratoriess');
        //############################# end invoices route ######################################

    });
    require __DIR__ . '/auth.php';
});
