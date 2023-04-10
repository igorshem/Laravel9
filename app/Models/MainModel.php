<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*
 * Общий функционал (Родительский класс) для моделей
 * */

class MainModel extends Model
{
    use HasFactory;
    public $timestamps = false;//отключаем метки времени для работы с бд

    /*
     * выдаём имя рабочей таблицы в базе данных
     * @return {string}
     * */
    public function getTableName(): string
    {
        return $this->table;
    }
}
