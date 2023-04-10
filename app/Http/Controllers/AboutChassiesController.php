<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class AboutChassiesController extends TablesController
{
    /**
     * Display a listing of the resource.
     *
     * @return View {\Illuminate\View\View}
     */
    public function index(): View
    {
        $response = array();//массив данных для передачи в blade

        $response['page_name'] = config('portal_const.route_map')[Request()->segment(1)][Route::currentRouteName()];//переводим название на язык выбранной локали
        $response['about_type'] = 'page';
        $response['header'] = __('About').' '.__('page').' <'.route('database.chassis').'>';//переводим название на язык выбранной локали
        $response['vers_db'] = parent::getDBVers();
        $response['vers_php'] = PHP_VERSION;
        $response['vers_laravel'] = app()->version();//Illuminate\Foundation\Application::VERSION;
        return view('about', compact('response'));
    }
}
