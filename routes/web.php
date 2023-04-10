<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChassiesController;
use App\Http\Controllers\AboutChassiesController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AboutDatabaseController;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Artisan;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

//если переход на главную страницу без установки локали - устанавливаем её
Route::get('/', function () {
    return redirect('/'. config('app.locale', 'en'));
})->name('main');

//локаль = группа
//отказался от where - т.к. выполнение приводит к 404, в то время как реализована схема переадресации на стороне сервера в случае ошибок.
Route::group(['prefix' => '{locale?}', 'middleware' => 'Localization'], function(/*$locale*/) {

    /*
     * Главная страница
     * */
    Route::match(['get', 'head'], '/', [WelcomeController::class, 'index']
    ) ->name('main.locale');  //route = 'main'

    /*
     * Страницы типа About: 'prefix' = '{about}
     * */
    Route::group(['prefix' => 'about', 'as' => 'about.'], function() {

        /*
         * AboutChassiesController - ресурсный контроллер
         * */
        Route::match(['get', 'head'], 'database', [AboutDatabaseController::class, 'index']
        ) ->name('database');  //route = 'about.chassis'

        /*
         * AboutChassiesController - ресурсный контроллер
         * */
        Route::match(['get', 'head'], 'chassis', [AboutChassiesController::class, 'index']
        ) ->name('chassis');  //route = 'about.chassis'
    });


    /*
     * Страницы типа Database: 'prefix' = '{info}
     * */
    Route::group(['prefix' => 'info', 'as' => 'database.'], function() {

        /*
         * ChassiesController - ресурсный контроллер
         * */
        Route::match(['get', 'head'], 'chassis', [ChassiesController::class, 'index']
        ) ->name('chassis');  //route = 'database.chassis'
    });
});
