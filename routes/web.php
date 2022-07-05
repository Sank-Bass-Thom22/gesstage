<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $role = Auth::user()->role;

    switch($role) {
        case 'admin':
            return view('admin.dashboard');
        break;
        case 'drh':
            return view('drh.dashboard');
        break;
        default:
        return view('user.dashboard');
    }
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
