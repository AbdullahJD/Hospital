<?php


use App\Http\Controllers\doctors\DiagnosticController;
use App\Http\Controllers\doctors\InvoiceController;
use App\Http\Controllers\doctors\LaboratorieController;
use App\Http\Controllers\doctors\PatientDetailsController;
use App\Http\Controllers\doctors\RayController;
use App\Http\Livewire\Chat\CreateChat;
use App\Http\Livewire\Chat\Main;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| doctors Routes
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




    //################################ dashboard doctor ########################################
    Route::get('/dashboard/doctor', function () {
        return view('Dashboard.doctor.dashboard');
    })->middleware(['auth:doctor'])->name('dashboard.doctor');

    //################################ end dashboard doctor #####################################

    //---------------------------------------------------------------------------------------------------------------


    Route::middleware(['auth:doctor'])->group(function () {
        Route::prefix('doctor')->group(function () {

            //############################# completed_invoices route ##########################################
            Route::get('completed_invoices', [InvoiceController::class,'completedInvoicss'])->name('completedInvoicss');
            //############################# end invoices route ################################################

            //############################# review_invoices route ##########################################
            Route::get('review_invoices', [InvoiceController::class,'reviewInvoices'])->name('reviewInvoices');
            //############################# end invoices route #############################################

            //############################# invoices route ##########################################
            Route::resource('invoices', InvoiceController::class);
            //############################# end invoices route ######################################


            //############################# review_invoices route ##########################################
            Route::post('add_review', [DiagnosticController::class,'addReview'])->name('add_review');
            //############################# end invoices route #############################################


            //############################# Diagnostics route ##########################################

            Route::resource('Diagnostics', DiagnosticController::class);

            //############################# end Diagnostics route ######################################

            //############################# rays route ##########################################

            Route::resource('rays', RayController::class);

            //############################# end rays route ######################################


            //############################# rays route ##########################################

            Route::get('patient_details/{id}', [PatientDetailsController::class,'index'])->name('patient_details');

            //############################# end rays route ######################################

            Route::resource('Laboratories', LaboratorieController::class);

            //############################# Chat route ##########################################
            Route::get('list/patients',Createchat::class)->name('list.patients');
            Route::get('chat/patients',Main::class)->name('chat.patients');
            //############################# end Chat route ######################################
        });
        Route::get('/404', function () {
            return view('Dashboard.404');
        })->name('404');

    });
    require __DIR__.'/auth.php';

});







