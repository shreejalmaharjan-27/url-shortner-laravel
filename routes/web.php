<?php

use App\Http\Controllers\redirectController;
use Illuminate\Http\Request;
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
    return view('home');
});

/*
route to get dynamic components which is generated using client side js
*/
Route::get('/components', function(Request $r) {
    // if dev parameter is not passed return 404
    if(!$r->get('dev') ?? true) return abort(404);

    return view('elements.interactive');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// pass the url to controller if the urls aren't defined anymore
Route::fallback([redirectController::class, 'redirect']);
