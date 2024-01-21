<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => [\Spatie\Permission\Middleware\RoleMiddleware::using('admin')]], function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'indexAdmin'])->name('admin.profile.index');
    Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('admin.profile.update');

    Route::get('/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');
    Route::get('/user/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.user.edit');
    Route::post('/user/update/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.user.update');
    Route::delete('/user/delete/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.user.destory');

    Route::get('/city',        [App\Http\Controllers\Admin\CityController::class, 'index'])->name('admin.city.index');
    Route::get('/city/create', [App\Http\Controllers\Admin\CityController::class, 'create'])->name('admin.city.create');
    Route::post('/city/store', [App\Http\Controllers\Admin\CityController::class, 'store'])->name('admin.city.store');
    Route::get('/city/edit/{id}', [App\Http\Controllers\Admin\CityController::class, 'edit'])->name('admin.city.edit');
    Route::post('/city/update/{id}', [App\Http\Controllers\Admin\CityController::class, 'update'])->name('admin.city.update');
    Route::delete('/city/delete/{id}', [App\Http\Controllers\Admin\CityController::class, 'destroy'])->name('admin.city.destroy');

    Route::get('/apartment', [App\Http\Controllers\Admin\ApartmentController::class, 'index'])->name('admin.apartment.index');
    Route::get('/apartment/create', [App\Http\Controllers\Admin\ApartmentController::class, 'create'])->name('admin.apartment.create');
    Route::post('/apartment/store', [App\Http\Controllers\Admin\ApartmentController::class, 'store'])->name('admin.apartment.store');
    Route::delete('/apartment/delete/{id}', [App\Http\Controllers\Admin\CityController::class, 'destroy'])->name('admin.apartment.destroy');
});

Route::group(['prefix' => 'renter', 'middleware' => [\Spatie\Permission\Middleware\RoleMiddleware::using('renter')]], function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'indexRenter'])->name('renter.profile.index');
    Route::post('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('renter.profile.update');
    
    Route::get('/apartment', [App\Http\Controllers\Renter\ApartmentController::class, 'index'])->name('renter.apartment.index');
    Route::get('/apartment/create', [App\Http\Controllers\Renter\ApartmentController::class, 'create'])->name('renter.apartment.create');
    Route::post('/apartment/store', [App\Http\Controllers\Renter\ApartmentController::class, 'store'])->name('renter.apartment.store');
    Route::get('/apartment/show/{id}', [App\Http\Controllers\Renter\ApartmentController::class, 'show'])->name('renter.apartment.show');
    Route::get('/apartment/edit/{id}', [App\Http\Controllers\Renter\ApartmentController::class, 'edit'])->name('renter.apartment.edit');
    Route::post('/apartment/edit/{id}/update', [App\Http\Controllers\Renter\ApartmentController::class, 'update'])->name('renter.apartment.update');
    Route::delete('/apartment/delete/{id}', [App\Http\Controllers\Renter\ApartmentController::class, 'delete'])->name('renter.apartment.delete');
    Route::get('/apartment/message', [App\Http\Controllers\Renter\ApartmentController::class, 'message'])->name('renter.apartment.message');
    Route::get('/apartment/message/read', [App\Http\Controllers\Renter\ApartmentController::class, 'read'])->name('renter.apartment.message.read');
    Route::post('/apartment/message/reply', [App\Http\Controllers\Renter\ApartmentController::class, 'reply'])->name('renter.apartment.reply');

    Route::delete('/apartment/show/{id}/image/delete', [App\Http\Controllers\Renter\ApartmentController::class, 'deleteImage'])->name('renter.apartment.image.delete');

});


Route::get('/apartment', [App\Http\Controllers\ApartmentController::class, 'index'])->name('user.apartment.index');
Route::get('/search', [App\Http\Controllers\Admin\CityController::class, 'searchCities'])->name('user.serach.cities');
Route::get('/apartments/show/{apartment}', [App\Http\Controllers\ApartmentController::class, 'show'])->name('user.apartment.show');
Route::get('/apartments/show/{apartment}/messages', [App\Http\Controllers\ApartmentController::class, 'sendMessage'])->name('user.apartment.send-message');

Route::get('/apartment/messages', [App\Http\Controllers\ApartmentController::class, 'message'])->name('user.apartment.message');
Route::post('/apartment/message/send', [App\Http\Controllers\ApartmentController::class, 'send'])->name('user.apartment.send');
Route::post('/apartment/message/reply', [App\Http\Controllers\ApartmentController::class, 'reply'])->name('user.apartment.reply');

Route::get('/apartment/message/read', [App\Http\Controllers\ApartmentController::class, 'read'])->name('user.apartment.message.read');


Route::get('/apartments/city/{id}', [App\Http\Controllers\ApartmentController::class, 'getAparmentsByCityId'])->name('user.serach.city');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'indexUser'])->name('user.profile.index');
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('user.profile.update');

