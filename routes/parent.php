<?php

use App\Http\Controllers\Parents\dashboard\ChildrenController;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:parent']
    ], function () {

    //==============================dashboard============================
    Route::get('/parent/dashboard', function () {
        $sons = Student::where('parent_id',auth()->user()->id)->get();
        return view('parents.dashboard',compact('sons'));
    })->name('dashboard.parents');

    Route::group(['namespace' => 'Parents\dashboard'], function () {
        Route::get('children', [ChildrenController::class, 'index'])->name('sons.index');
        Route::get('results/{id}', [ChildrenController::class, 'results'])->name('sons.results');
        Route::get('attendances', [ChildrenController::class, 'attendances'])->name('sons.attendances');
        Route::post('attendances',[ChildrenController::class, 'attendanceSearch'])->name('sons.attendance.search');
        Route::get('fees', [ChildrenController::class, 'fees'])->name('sons.fees');
        Route::get('receipt/{id}', [ChildrenController::class, 'receiptStudent'])->name('sons.receipt');
        Route::get('profile/parent', [ChildrenController::class, 'profile'])->name('profile.show.parent');
        Route::post('profile/parent/{id}', [ChildrenController::class, 'update'])->name('profile.update.parent');
    });

});
