<?php

//use Carbon\Carbon;
use App\Models\PageView;
use App\Models\PageViewLog;
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
    return view('welcome');
});

Route::get('logView', function (Request $request) {

    PageView::create([
        'url'         => $request->input('url', '/'),
        'views_count' => $request->input('views_count', 1),
    ]);

    die();

    return var_export($request, true);
    return response()->json(['success' => true]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
