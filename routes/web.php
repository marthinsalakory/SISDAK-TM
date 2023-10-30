<?php

use App\Models\InputA;
use App\Models\InputB;
use App\Models\InputC;
use App\Models\InputD;
use App\Models\InputE;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::name('data.')->prefix('data')->group(function () {
        Route::get('/A', [App\Http\Controllers\DataController::class, 'A'])->name('A')->middleware('role:1|3');
        Route::get('/B', [App\Http\Controllers\DataController::class, 'B'])->name('B')->middleware('role:1|3');
        Route::get('/B/link/{pembiayaan}/{tahun?}', [App\Http\Controllers\DataController::class, 'linkB'])->name('linkB')->middleware('role:1|3');
        Route::get('/C', [App\Http\Controllers\DataController::class, 'C'])->name('C')->middleware('role:1|3');
        Route::get('/C/link/{pembiayaan}/{tahun?}', [App\Http\Controllers\DataController::class, 'linkC'])->name('linkC')->middleware('role:1|3');
        Route::get('/D', [App\Http\Controllers\DataController::class, 'D'])->name('D')->middleware('role:1|3');
        Route::get('/D/link/{media}/{tahun?}', [App\Http\Controllers\DataController::class, 'linkD'])->name('linkD')->middleware('role:1|3');
        Route::get('/E', [App\Http\Controllers\DataController::class, 'E'])->name('E')->middleware('role:1|3');
    });

    // Route Input Data Start
    // Route::get('/input/{id}', [App\Http\Controllers\InputController::class, 'index'])->name('input')->middleware('role:1|2');
    Route::name('input.')->prefix('input')->group(function () {
        Route::get('/{id}/A', [App\Http\Controllers\InputController::class, 'A'])->name('A')->middleware('role:1|2');
        Route::post('/{id}/A', [App\Http\Controllers\InputController::class, 'storeA'])->middleware('role:1|2');

        Route::get('/{id}/B', [App\Http\Controllers\InputController::class, 'B'])->name('B')->middleware('role:1|2');
        Route::get('/{id}/B/add', [App\Http\Controllers\InputController::class, 'addB'])->name('B.add')->middleware('role:1|2');
        Route::get('/{id}/B/delete/{inputb_id}', [App\Http\Controllers\InputController::class, 'deleteB'])->name('B.delete')->middleware('role:1|2');
        Route::post('/{id}/B', [App\Http\Controllers\InputController::class, 'storeB'])->middleware('role:1|2');

        Route::get('/{id}/C', [App\Http\Controllers\InputController::class, 'C'])->name('C')->middleware('role:1|2');
        Route::get('/{id}/C/add', [App\Http\Controllers\InputController::class, 'addC'])->name('C.add')->middleware('role:1|2');
        Route::get('/{id}/C/delete/{inputc_id}', [App\Http\Controllers\InputController::class, 'deleteC'])->name('C.delete')->middleware('role:1|2');
        Route::post('/{id}/C', [App\Http\Controllers\InputController::class, 'storeC'])->middleware('role:1|2');

        Route::get('/{id}/D', [App\Http\Controllers\InputController::class, 'D'])->name('D')->middleware('role:1|2');
        Route::get('/{id}/D/add', [App\Http\Controllers\InputController::class, 'addD'])->name('D.add')->middleware('role:1|2');
        Route::get('/{id}/D/delete/{inputc_id}', [App\Http\Controllers\InputController::class, 'deleteD'])->name('D.delete')->middleware('role:1|2');
        Route::post('/{id}/D', [App\Http\Controllers\InputController::class, 'storeD'])->middleware('role:1|2');

        Route::get('/{id}/E', [App\Http\Controllers\InputController::class, 'E'])->name('E')->middleware('role:1|2');
        Route::get('/{id}/E/add', [App\Http\Controllers\InputController::class, 'addE'])->name('E.add')->middleware('role:1|2');
        Route::get('/{id}/E/delete/{inputc_id}', [App\Http\Controllers\InputController::class, 'deleteE'])->name('E.delete')->middleware('role:1|2');
        Route::post('/{id}/E', [App\Http\Controllers\InputController::class, 'storeE'])->middleware('role:1|2');
    });
    // Route Input Data End

    // Route User Start
    Route::get('/users/{role_id?}', [App\Http\Controllers\UserController::class, 'all'])->name('user')->middleware('role:1')->whereIn('role_id', [1, 2, 3]);
    Route::name('user.')->prefix('user')->group(function () {
        Route::get('/add/{role_id}', [App\Http\Controllers\UserController::class, 'insert'])->name('add')->middleware('role:1')->whereIn('role_id', [1, 2, 3]);
        Route::post('/add/{role_id}', [App\Http\Controllers\UserController::class, 'store'])->middleware('role:1')->whereIn('role_id', [1, 2, 3]);
        Route::get('/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('edit')->middleware('role:1');
        Route::post('/{id}/edit', [App\Http\Controllers\UserController::class, 'update'])->middleware('role:1');
        Route::get('/{id}/reset-password', [App\Http\Controllers\UserController::class, 'resetPassword'])->name('password.reset')->middleware('role:1');
        Route::get('/{id}/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('delete')->middleware('role:1');
        Route::get('/{id}/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
        Route::post('/{id}/profile', [App\Http\Controllers\UserController::class, 'profile_update']);
    });
    // Route User End

    // Route Pengaturan Start
    Route::get('/pengaturan', [App\Http\Controllers\PengaturanController::class, 'index'])->name('pengaturan');
    Route::post('/pengaturan', [App\Http\Controllers\PengaturanController::class, 'update']);
    // Route Pengaturan End
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);
