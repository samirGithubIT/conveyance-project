<?php

use App\Models\Designation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\admin\DesignationController;

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

Route::get('/', function () {
    return view('welcome'); 
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// admin panel 

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function (){

    Route::get('/dashboard', function () {
        return view('backEnd.pages.home');
    });

    Route::resource('department',DepartmentController::class);
    Route::resource('designation',DesignationController::class);
    Route::resource('employee',EmployeeController::class);

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

