<?php

use App\Models\Designation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeAuthController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ConveyanceController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\admin\DesignationController;
use App\Http\Controllers\Admin\ConveyanceVoucherController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', function () {
    return view('frontEnd.pages.dashboard');
} )->middleware(['auth'])->name('dashboard');


// employee login 
Route::get('/login', [EmployeeAuthController::class, 'login_form'])->name('login');
Route::post('/login', [EmployeeAuthController::class, 'login']);     // same route but alada method thakle ek route use kora jai 
Route::post('employee/logout', [EmployeeAuthController::class, 'logout'])->name('employee.logout');     

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // billing _ form
    Route::get('/billing-details', [BillingController::class, 'billingDetailForm'])->name('billing-details');
    // voucher _ submit and show
    Route::get('/voucher-from', [HomeController::class, 'voucherForm'])->name('voucher.form');
    Route::post('/voucher-from/store', [HomeController::class, 'voucherFormStore'])->name('voucher-form.store');
});

require __DIR__.'/auth.php'; 


// admin panel 

Route::middleware(['auth','admin_section'])->prefix('admin')->name('admin.')->group(function (){

    Route::get('/dashboard', function () {
        return view('backEnd.pages.home');
    });

    Route::resource('department',DepartmentController::class);
    Route::resource('designation',DesignationController::class);
    Route::resource('employee',EmployeeController::class);
    Route::resource('conveyance',ConveyanceController::class);
    Route::resource('conveyance-voucher',ConveyanceVoucherController::class);
    Route::post('voucher-accept',[ConveyanceVoucherController::class, 'AcceptVoucher'])->name('voucher.accept');
    

});


// Route::get('/data/department/{department_id}/designations', function($department_id){
//     $designations = Designation::where('department_id', $department_id)->get();

//     $string = "";

//     foreach($designations as $designation){
        // $string = $string . '<option value="' . $designation->id . '">' . $designation->name . '</option>';
//     }
    
//     return $string;
// });


Route::get('/data/department/{department_id}/designations', function($department_id){

    $designations = Designation::where('department_id', $department_id)->get();
    
    $string = "";
    
    foreach($designations as $designation){
        $string = $string . '<option value="' . $designation->id. '"> '. $designation->name . '</option>';
    }

    return $string;

});

