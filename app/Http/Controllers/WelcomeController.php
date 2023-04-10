<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class WelcomeController extends Controller
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
        $response['header'] = __('Main page');//переводим название на язык выбранной локали
        //
        return view('welcome', compact('response'));
    }

}
