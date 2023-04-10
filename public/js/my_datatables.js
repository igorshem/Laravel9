/*
* Отображаем версии различных установленных js-модулей/плагинов
* */
const show_versions = () => {
    console.log("%c** Installed / usaged js-plugin versions **", "color: #148f32");//отладка
    if (typeof jQuery !== 'undefined')
        if (jQuery.fn.hasOwnProperty('jquery'))
            console.log("jQuery: "+jQuery.fn.jquery);//отладка
    if (typeof $.ui !== 'undefined')
        if ($.ui.hasOwnProperty('version'))
            console.log("jQuery UI Core: "+$.ui.version);//отладка
    if (typeof $.fn.tooltip !== 'undefined')
        if ($.fn.tooltip.Constructor.hasOwnProperty('VERSION'))
            console.log("Bootstrap (util.js): "+$.fn.tooltip.Constructor.VERSION);//отладка
/*    if (myapp_config.hasOwnProperty('VERSION'))
        console.log("SmartAdmin: "+myapp_config.VERSION);//отладка*/
    if (typeof $.fn.dataTable !== 'undefined') {
        if ($.fn.dataTable.hasOwnProperty('version'))
            console.log("DataTable: " + $.fn.dataTable.version);//отладка
        if ($.fn.dataTable.hasOwnProperty('AutoFill'))
            console.log("AutoFill [DataTable]: " + $.fn.dataTable.AutoFill.version);//отладка
        if ($.fn.dataTable.hasOwnProperty('Buttons'))
            console.log("Buttons [DataTable]: " + $.fn.dataTable.Buttons.version);//отладка
        if ($.fn.dataTable.hasOwnProperty('ColReorder'))
            console.log("ColReorder [DataTable]: " + $.fn.dataTable.ColReorder.version);//отладка
        if ($.fn.dataTable.hasOwnProperty('FixedColumns'))
            console.log("FixedColumns [DataTable]: " + $.fn.dataTable.FixedColumns.version);//отладка
        if ($.fn.dataTable.hasOwnProperty('FixedHeader'))
            console.log("FixedHeader [DataTable]: " + $.fn.dataTable.FixedHeader.version);//отладка
        if ($.fn.dataTable.hasOwnProperty('KeyTable'))
            console.log("KeyTable [DataTable]: " + $.fn.dataTable.KeyTable.version);//отладка
        if ($.fn.dataTable.hasOwnProperty('Responsive'))
            console.log("Responsive [DataTable]: " + $.fn.dataTable.Responsive.version);//отладка
        if ($.fn.dataTable.hasOwnProperty('RowGroup'))
            console.log("RowGroup [DataTable]: " + $.fn.dataTable.RowGroup.version);//отладка
        if ($.fn.dataTable.hasOwnProperty('RowReorder'))
            console.log("RowReorder [DataTable]: " + $.fn.dataTable.RowReorder.version);//отладка
        if ($.fn.dataTable.hasOwnProperty('Scroller'))
            console.log("Scroller [DataTable]: " + $.fn.dataTable.Scroller.version);//отладка
        if ($.fn.dataTable.hasOwnProperty('select'))
            console.log("Select [DataTable]: " + $.fn.dataTable.select.version);//отладка
        if ($.fn.dataTable.hasOwnProperty('SearchBuilder'))
            console.log("SearchBuilder [DataTable]: " + $.fn.dataTable.SearchBuilder.version);//отладка
        if ($.fn.dataTable.hasOwnProperty('SearchPanes'))
            console.log("SearchPanes [DataTable]: " + $.fn.dataTable.SearchPanes.version);//отладка
    }
    if (typeof JSZip !== 'undefined')
        if (JSZip.hasOwnProperty('version'))
            console.log("JSZip [DataTable]: "+JSZip.version);//отладка
    console.log("pdfmake [DataTable]: 2.6.11 [вручную]");//отладка v
    console.log("vfs_fonts [DataTable]: 0.1.68 [вручную]");//отладка v
    console.log("ColResizable: 1.6 [вручную]");//отладкаpdfmake v0.1.68
}
