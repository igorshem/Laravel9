<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use PDO;

/*
 * Общий функционал (Родительский класс) для контроллеров, связанных с Database
 * */

class TablesController extends Controller
{
    public static string $datatables_face = '';

    /* Инициируем переменные класса
     */
    function __construct() {
        static::$datatables_face = Config::get('portal_const.datatables_face');
    }

    /* Разрезаем версию по разделителям для получения необходимой части
     * $strvers {string} - входная строка = версия
     * $sep {string} - разделитель знаков в строке версии
     * $part {int} - номер необходимой части версии, начиная с 0
     * @return {int}
     * */
    function getPartVersion($strvers, $sep='.', $part=0): int {
        $vers = explode($sep, $strvers);
        if ($part < count($vers)) {
            return (int) $vers[$part];
        } else {
            return (int) $vers[0];
        }
    }

    /*
     * Получаем версию Database в зависимости от версии Laravel
     * @return {string}
     * */
    function getDBVers(): string {
        if (self::getPartVersion(app()->version()) < 10) {//Laravel 8-9
            $db = DB::select((string) DB::raw("select version()"));
            return $db[0]->{'version()'};
        } elseif (self::getPartVersion(app()->version()) == 10) {//Laravel 10
            return self::db_vers();
        }
        return '';
    }

    /* Получаем текущую версию DataBase (для Laravel 10)
     * Вспомогательная для function getDBVers()
     * @return {string}
     * */
    private function db_vers(): string {
        $dbtype = config("database.default");
        $dbhost = config("database.connections");
//        dd($dbhost[$dbtype]['database']);
        $dsn = $dbtype.':host='.$dbhost[$dbtype]['host'].';dbname='.$dbhost[$dbtype]['database'];
        $dbuser = $dbhost[$dbtype]['username'];
        $dbpass = $dbhost[$dbtype]['password'];
        try {
            //dd($dsn.'>>'.$dbuser.'>>'.$dbpass);
            $pdo = new PDO($dsn, $dbuser, $dbpass);
            $stm = $pdo->query("SELECT VERSION()");
            $vers = $stm->fetch();
            return($vers[0]);
        } catch(Exception $e) {
            return($e->getMessage());
        }
    }

    /**
     * Database: Локализация названий в заголовках (thead, tfoot) таблицы согласно текущей локали
     * Note1: строки должны иметь перевод вне зависимости от исх.языка
     * Note2: DataTables требует одинакового/однозначного перевода шапки таблицы между dataRename() и colRename()
     *
     * @param $arr {array} - входной одномерный массив, значения которого {value} будут переведены
     * @return array {array} - одномерный массив, где ключи совпадают с входным $arr
     */
    function colRename($arr): array {
        $res = array();
        foreach($arr as $k => $v) {
            $res[$k] = __('database.'.$v);
        }
        return $res;
    }

    /**
     * Database: Локализация названий в теле (tbody) таблицы согласно текущей локали
     * Note1: строки должны иметь перевод вне зависимости от исх.языка
     * Note2: DataTables требует одинакового/однозначного перевода шапки таблицы между dataRename() и colRename()
     *
     * @param $arr {array} - входной двумерный массив, будут переведены key2, value2
     * @return array {array} - выходной двумерный массив, где key1 совпадают с входным $arr
     */
    function dataRename($arr): array {
        $res = array();
        /*echo '<table><thead>';
        foreach($arr as $k => $v) {
            if ($k != 0) break;
            echo '<tr>' . "\n";
            foreach($v as $k1 => $v1) {
                echo '<th>'.__($k1).'</th>'."\n";
            }
        }
        echo '</thead><tbody>';*/
        foreach($arr as $k => $v) {
//            echo '<tr>'."\n";
            foreach($v as $k1 => $v1) {
                if (gettype($v1) == 'string') {
                    $res[$k][__('database.'.$k1)] = __('database.'.$v1);
                } else {
                    $res[$k][__('database.'.$k1)] = $v1;
                }
//                echo '<td>'.$v1.'</td>'."\n";
            }
//            echo '</tr>'."\n";
        }
//        echo '</tbody></table>';
        return $res;
    }
}
