<?php


use App\Http\Controllers\Dashboard_Ray_Employee\InvoiceController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| ray_employee Routes
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
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    //################################ dashboard ray_employee ########################################
    Route::get('/dashboard/ray_employee', function () {
        return view('Dashboard.dashboard_RayEmployee.dashboard');
    })->middleware(['auth:ray_employee'])->name('dashboard.ray_employee');

    //################################ end dashboard ray_employee #####################################

    Route::middleware(['auth:ray_employee'])->group(function () {
    //############################# invoices route ##########################################
    Route::resource('invoices_ray_employee', InvoiceController::class);
    Route::get('completedInvoices',[InvoiceController::class,'completedInvoices'])->name('completedInvoices');
        Route::get('view_rayss/{id}', [InvoiceController::class,'viewRays'])->name('view_rayss');
    //############################# end invoices route ######################################
        Route::get('/404', function () {
            return view('Dashboard.404');
        })->name('404');
    });

    require __DIR__.'/auth.php';

});
