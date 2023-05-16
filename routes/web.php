<?php

//use Carbon\Carbon;
use App\Models\PageView;
use App\Models\PageViewLog;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageViewLogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/',            function() {
    return view('home');
})->name('index');
Route::get('/home',        [HomeController::class, 'index']              )->name('home');
Route::get('viewLogStats', [PageViewLogController::class, 'viewLogStats'])->name('viewLogStats');

Route::get('logView', function (Request $request) {

    PageView::create([
        'url'         => $request->input('url', '/'),
        'views_count' => $request->input('views_count', 1),
    ]);

    PageViewLog::create([
        'url'     => $request->input('url', '/'),
        'user_id' => Auth::id()
    ]);

    return response()->json(['success' => true]);
});




