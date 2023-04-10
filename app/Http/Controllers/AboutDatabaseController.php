<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class AboutDatabaseController extends TablesController
{
    /**
     * Display a listing of the resource.
     *
     * @return View {\lluminate\View\View}
     */
    public function index(): View
    {
        $response = array();//массив данных для передачи в blade

        $response['page_name'] = config('portal_const.route_map')[Request()->segment(1)][Route::currentRouteName()];//переводим название на язык выбранной локали
        $response['about_type'] = 'database';
        $response['header'] = __('About').' <DataBase>';//переводим название на язык выбранной локали
        $response['vers_db'] = parent::getDBVers();
        return view('about', compact('response'));
    }
}
