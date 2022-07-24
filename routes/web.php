<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Admin\AdsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DoctorsController;
use App\Http\Controllers\Admin\EmergencyController;
use App\Http\Controllers\Admin\MealController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\PatientsController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Front\FrontEndController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => 'admin'], function () {
    // Route::view('/', 'admin.index')->name('AdminDashboard');

    Route::resource('departments', DepartmentController::class);
    Route::resource('doctors', DoctorsController::class);
    Route::resource('ads', AdsController::class);
    Route::resource('emergency', EmergencyController::class);

    Route::resource('/', DashboardController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('patients', PatientsController::class);
    // Route::resource('offers', OfferController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('headerposts', headerPostController::class);
    Route::resource('tags', TagController::class);
    Route::resource('service', ServiceController::class);
    // Route::get('service', [ServiceController::class ,'index'])->name('service.index');
});


// Route::middleware(['auth'])->group(function () {
//     Route::get('/', function () {
//         return view('website.index');
//     })->name('index');

Route::get('admin', [DashboardController::class, 'index'])->name('admin.index');
// Route::get('resturant/{id}', [FrontEndController::class, 'ShowProductsOfResturant'])->name('resturant.product');
// Route::get('meal/{id}', [FrontEndController::class, 'ShowProduct'])->name('ShowProduct');
// Route::get('city/{id}', [FrontEndController::class, 'ShowResturantsOfCity'])->name('city.resturants');
// Route::get('user/login', function () {
//     return view('admin.index');
// });
// });

require __DIR__ . '/admin.php';



require __DIR__ . '/auth.php';
