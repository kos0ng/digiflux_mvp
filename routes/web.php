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

Auth::routes(['verify' => true]);
// Route::group(['middleware' => 'auth'], function () {

// });

Route::get('/dashboard/setprofile', 'TaskController@setprofile');
Route::get('/dashboard/profile', 'TaskController@profile')->name('profile');
Route::post('/dashboard/setprofile', 'TaskController@setprofile_act');
Route::get('/dashboard/setprofile_ig', 'TaskController@setprofile_ig');
Route::post('/dashboard/setprofile_ig', 'TaskController@setprofile_igact');
Route::get('/dashboard/influencer', 'TaskController@influencer')->name('influencer');
Route::get('/dashboard', [App\Http\Controllers\TaskController::class, 'index'])->name('home');
Route::post('/dashboard', [App\Http\Controllers\TaskController::class, 'index_act']);
Route::get('/dashboard/campaign', 'TaskController@list_campaign')->name('campaign');
Route::post('/dashboard/register_campaign', 'TaskController@register_campaign');
Route::post('/dashboard/acceptance', 'TaskController@acceptance');
Route::post('/dashboard/campaign_progress', 'TaskController@campaign_progress');
Route::get('/dashboard/influencer/{id_campaign}', 'TaskController@private_campaign')->name('private_campaign');
Route::post('/dashboard/influencer', 'TaskController@influencer_act');
