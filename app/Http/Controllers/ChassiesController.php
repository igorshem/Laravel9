<?php

namespace App\Http\Controllers;

use App\Models\Chassies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;


class ChassiesController extends TablesController
{
    /**
     * Display a listing of the resource.
     * Показать список ресурсов.
     *
     * @param Request $request - на будущее пока не используется
     * @return View {\Illuminate\View\View}
     */
    public function index(Request $request): View
    {
        $response = array();//массив данных для передачи в blade
        $obj = new Chassies();

        $response['page_name'] = config('portal_const.route_map')[Request()->segment(1)][Route::currentRouteName()];//переводим название на язык выбранной локали
        $response['header'] = __('Table').' <'.__($obj -> getTableName()).'>';//переводим название на язык выбранной локали
        $response['table_name'] = $obj -> getTableName();
        $response['columns'] = parent::colRename(Schema::getColumnListing($response['table_name']));//массив названий колонок в таблице
        $response['values'] = parent::dataRename(Chassies::all()->toArray());//массив данных из таблицы базы данных
//        $response['columnsTest'] = Schema::getColumnListing($response['table_name']);//массив названий колонок в таблице
//        $response['valuesTest'] = Chassies::all();//массив данных из таблицы базы данных
        $response['table_record_count'] = DB::table($response['table_name'])->count();//общее число строк/записей с данными в таблице
//        $response['datatables_face'] = static::$datatables_face;//вид отображения DataTables по-умолчанию <- not use

        return view('info', compact('response'));
    }
}
