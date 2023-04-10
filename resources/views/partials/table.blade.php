<script>
    {{--//let arrvals = '{{ $response['valuesTest'] }}';
    //arrvals = arrvals.replaceAll('&quot;', '"');
    //let tbl_vls = JSON.parse(arrvals);//work--}}
    //число строк в табл. с данными, =undefined - признак отсутствия таблицы на странице
    let dataTable_rows = {{ $response['table_record_count'] }};
    //данные
    let datavars = '{{ json_encode($response['values']) }}';
    //console.log('datavars = {' + datavars + '}');
    datavars = datavars.replaceAll('&quot;', '"');
    const tbl_vls = JSON.parse(datavars);
    //Object: DataTables
    let dtable;
    //ID таблицы / селектор с данными для применения DataTables
    const table_id = '#tblValues';
    //названия колонок для thead
    const colmns = [
        @foreach($response['columns'] as $column)
        { "data": "{{ $column }}" },
        @endforeach
    ];
    //локализация текстовки DataTables
    const dt_localize = {
        oAria: {
            sSortAscending: "{{ __('sSortAscending') }}",
            sSortDescending: "{{ __('sSortDescending') }}"
        },
        oPaginate: {sFirst: "{{ __('sFirst') }}", sLast: "{{ __('sLast') }}", sNext: "{{ __('sNext') }}", sPrevious: "{{ __('sPrevious') }}"},
        sEmptyTable: "{{ __('sEmptyTable') }}",
        sInfo: "{{ __('sInfo') }}",
        sInfoEmpty: "{{ __('sInfoEmpty') }}",
        sInfoFiltered: "{{ __('sInfoFiltered') }}",
        sInfoPostFix: "",
        sDecimal: "",
        sThousands: ",",
        sLengthMenu: "{{ __('sLengthMenu') }}",
        sLoadingRecords: "{{ __('sLoadingRecords') }}",
        sProcessing: "",
        sSearch: "{{ __('sSearch') }}",
        sSearchPlaceholder: "",
        sUrl: "",
        sZeroRecords: "{{ __('sZeroRecords') }}"
    };
    /*
    * По числу строк (rows) формируем lengthMenu = Возможные значения пагинации (length pagination))
    * type = ['last','first'] - задаёт положение метки "All"
    * */
    const lengthMenu = function (rows, type='first', strAll='{{ __('strAll') }}') {
        let res = [];
        if (type === 'last') {
            //"All" - самая нижняя
            if (rows < 25) {
                res = [[-1], [strAll]];
            } else if ((rows > 24) && (rows < 51)) {
                res = [[25, -1], [25, strAll]];
            } else if ((rows > 50) && (rows < 101)) {
                res = [[25, 50, -1], [25, 50, strAll]];
            } else if (rows > 100) {
                res = [[25, 50, 100, -1], [25, 50, 100, strAll]];
            }
        }
        if (type === 'first') {
            // "All" - самая верхняя
            if (rows < 25) {
                res = [[-1], [strAll]];
            } else if ((rows > 24) && (rows < 51)) {
                res = [[-1, 25], [strAll, 25]];
            } else if ((rows > 50) && (rows < 101)) {
                res = [[-1, 25, 50], [strAll, 25, 50]];
            } else if (rows > 100) {
                res = [[-1, 25, 50, 100], [strAll, 25, 50, 100]];
            }    }
        return res;
    }

    // DataTable init //Begin//
    $(document).ready(function() {
        //console.log("Values: "+JSON.stringify(tbl_vls));
        //console.log("dataTable_rows: "+dataTable_rows);
        if (dataTable_rows > 0) {
            dtable = initDTable(dtable, table_id, tbl_vls, colmns, dt_localize);
            //show_versions();
        }
    });

    /* Инициируем DataTables
* tbl - [Object] типа DataTables
* tbl_id - [string] - однозначный селектор таблицы для DataTables, без решетки
* data_json - [JSON] - данные для формируемой таблицы
* colmns - [Object] - названия колонок для thead
* */
    function initDTable(tbl, tbl_id, data_json, colmns, dt_localize)
    {
        // разрешение на выделение строк
        const selectRow = 'single';
        // режим сохранения состояния (сортировка, фильтрация, пагинация) таблиц между сессиями
        const stateSave = true;
        // Фиксация ordering (символа сортировки) в thead таблицы: false [default] - нижняя строка, true - верхняя
        const orderCellsTop = true;
        // Вкл. фиксация шапки вверху страницы
        const fixedHeader = false;
        //Выкл./вкл. автонастройку ширины колонок средствами DataTables, также гор. скролл
        const autoWidth = true;
        // Вертикальный размер экрана для данных, всё что не вмещается - через верт. скроллинг
        let scrollY = '';//70-почти полный экран, 40-табл. со всеми эл. управления без прокрутки
        // Выкл./вкл. горизонтальную полосу прокрутки
        let scrollX = false;
        // Вкл./вкл. скрытие полосы прокрутки данных в табл. по ненадобности [по факту: всё равно присутствует]
        let scrollCollapse = true;
        if (window.screen.width < 800) {
            scrollY = '70vh';//70-почти полный экран, 40-табл. со всеми эл. управления без прокрутки
            scrollX = true;
            scrollCollapse = false;
        }
        // Вкл./выкл. отложенный рендеринг: рендеринг только отображаемой части таблицы (согласно pagination)
        const deferRender = true;
        //для каждой строки добавляем id в формате: "row_{id}", где id соответствует номеру строки согласно DataTables
        const createdRow = function (row, data, dataIndex) {
            $(row).attr('id', 'row_' + dataIndex);
        };
        tbl = $(tbl_id).DataTable({
            "data": data_json,
            // Список возможных значений количества строк для реализации пагинации средствами DataTables
            "lengthMenu": lengthMenu(dataTable_rows, 'first'),
            // разрешение на выделение строк
            select: selectRow,
            // режим сохранения состояния (сортировка, фильтрация, пагинация) таблиц между сессиями
            stateSave: stateSave,
            // Фиксация ordering (символа сортировки) в thead таблицы: false [default] -нижняя строка
            orderCellsTop: orderCellsTop,
            // Вкл. фиксация шапки вверху страницы
            fixedHeader: fixedHeader,
            //Выкл./вкл. автонастройку ширины колонок средствами DataTables
            autoWidth: autoWidth,
            // Вкл./вкл. скрытие полосы прокрутки данных в табл. по ненадобности [по факту: всё равно присутствует]
            scrollCollapse: scrollCollapse,
            // Вертикальный размер экрана для данных, всё что не вмещается - через верт. скроллинг
            scrollY: scrollY,
            // Выкл./вкл. горизонтальную полосу прокрутки
            scrollX: scrollX,
            // Вкл./выкл. отложенный рендеринг: рендеринг только отображаемой части таблицы (согласно pagination)
            deferRender: deferRender,
            //для каждой строки добавляем id в формате: "row_{id}", где id соответствует номеру строки согласно DataTables
            "createdRow": createdRow,
            //названия колонок для thead
            "columns": colmns,
            //локализация текстовки DataTables
            "oLanguage": dt_localize

        });
        $(tbl_id).css({"width":"100%"});
        tbl.columns.adjust().draw();
        return tbl;
    }
    // DataTable init //End//
</script>
<table id="tblValues" style="width: 100%;" class="block">
    <thead>
        <tr>
        @foreach($response['columns'] as $column)
            <th class="border border-gray-700 ui-resizable" title="{{$column}}">
                <div class="px-0.75">{{$column}}</div>
            </th>
        @endforeach
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach($response['columns'] as $column)
            <td style="white-space: nowrap;" class="border border-gray-700 ui-resizable" title="">
                <div style="white-space: nowrap;" class="truncate px-2"></div>
            </td>
            @endforeach
        </tr>
    </tbody>
</table>
