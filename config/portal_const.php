<?php

/*
|--------------------------------------------------------------------------
| Additional portal constants
|--------------------------------------------------------------------------
|
*/
return [


    /*
    |--------------------------------------------------------------------------
    | Route map
    | Карта роутов
    |--------------------------------------------------------------------------
    |
    | Соотношение Имени роута (\Request::route()->getName()) и Названий страниц (HTML::title)
    | При чем для поддержки мультиязычности лучше писать в формате Blade
    | Шаблон:
    | '{RouteGetName}' => '{{ __(\'{NamePage}\') }}'
    | */
    'route_map' => [
        'en' => [
            'main.locale' => 'Main page',
            'database.chassis' => 'Info - Chassis',
            'about.chassis' => 'About - Chassis',
            'about.database' => 'About - DataBase',
        ],
        'ru' => [
            'main.locale' => 'Главная',
            'database.chassis' => 'Информация - Шасси',
            'about.chassis' => 'О странице - Шасси',
            'about.database' => 'О - базе данных',
        ],
        'uk' => [
            'main.locale' => 'Головна',
            'database.chassis' => 'Інформація - Шасі',
            'about.chassis' => 'Про сторінку - Шасі',
            'about.database' => 'Про - базу даних',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Available locales
    |--------------------------------------------------------------------------
    |
    | List all locales that your application works with
    | 'available_locales'   - Short list
    | 'av_locales'          - Flat list
    |
    */
    'available_locales' => [
        'English' => 'en',
        'Russian' => 'ru',
        'Ukrainian' => 'uk',
    ],

    "av_locales" => [
        0 => ["lang" => "English",
            "value" => "en"
        ],
        1 => [
            "lang" => "Russian",
            "value" => "ru"
        ],
        2 => [
            "lang" => "Ukrainian",
            "value" => "uk"
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Skin type available locales
    |--------------------------------------------------------------------------
    |
    | 'column' - full list in vertical view
    | 'row' - full list in horizontal view
    | 'select' - full list in select
    | 'select_imit' - full list alter select -> button
    |
    */
    'skin_av_locales' => env('SKIN_AV_LOCALES', 'select_imit'),

    /*
    |--------------------------------------------------------------------------
    | Default face DataTables
    |--------------------------------------------------------------------------
    |
    | 'responsive' - режим скрытия столбцов, невлазящих по горизонтали, с последующим открытием в дочерних строках, не работает фиксация столбцов
    | 'standart' - режим приближённый к экселю: для столбцов не влазящих по горизонтали создаём гор.полосу прокрутки, работает фиксация столбцов слева
    |
    */
#    'datatables_face' => 'responsive',
    'datatables_face' => 'standart',


//not USE
    /*
    |--------------------------------------------------------------------------
    | Predefined pagination values
    |--------------------------------------------------------------------------
    |
    | Number of records / rows of data in the table
    |
    */

    'paginations' => [10, 25, 50, 100],

    /*
    |--------------------------------------------------------------------------
    | Default pagination
    |--------------------------------------------------------------------------
    |
    | Number of records / rows of data in the table by default
    |
    */

    'pagination_default' => -1,

    /*
    |--------------------------------------------------------------------------
    | The minimum number of pages to display at the edges of the range
    |--------------------------------------------------------------------------
    |
    | The minimum number of pages to display at the edges of the range
    | Calculated by the formula: = pagination_page_min - 1
    | example: pagination_page_min = 3: 3-1 = 2, that is, if the number of pages is less than 7, they will be displayed all
    | example continue: showing pages: 1, 2, 3, 4, 5, 6
    |
    | Also, with a large number of pages, the number of pages to the right and to the left of the current one is set.
    | Calculated by the formula: = pagination_page_min - 1 for left and right
    | example: all pages = 20, current page = 7, pagination_page_min = 3
    | example continue: showing pages: 1, 2, 3, 5, 6, 7, 8, 9, 18, 19, 20
    |
    */

    'pagination_page_min' => 3,

    /*
    |--------------------------------------------------------------------------
    | Estimated row count
    |--------------------------------------------------------------------------
    |
    | The estimated number of rows required to calculate the column widths of the data table.
    | Too much results in apparent slowdown
    |
    */
    'datatables_colwidth_calcul' => 100,

#    'datatables_colwidth_calcul' => 100,

];
