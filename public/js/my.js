/* Language switcher //Begin// => update brouser.URI */
/*
* По полному названию языка, формируем строку для перезагрузки страницы с новой локалью
* choise {string} - название языка {english, fullname}
* */
function reloadURILocale(choise) {
    if (choise.length < 2) {
        console.log("Ошибка! Не верный формат входного параметра в js-функцию: choise = " + choise);
        return;
    }
    if (languages.length < 1) {
        console.log("Ошибка! Массив languages не инициирован средствами backend: " + languages.length);
        return;
    }

    let lang = '';
    for (i in languages) {
        if (languages[i]["lang"] == choise) {
            lang = languages[i]["value"];
        }
    }
    if (lang == '') {
        console.log("Ошибка! В массиве languages отсутствует choise.\nLanguages = " + languages + "\nChoise = " + choise);
        return;
    }

    let url = new URL(location.href);
    let dopuri = url.pathname.substr(lang.length+1);
    let mypath = "/" + lang + dopuri;
    url.pathname = mypath;
    //console.log("new path = " + url.href);
    location.href = url.href;
}
/* SKIN_AV_LOCALES="select" */
window.onload = function() {
    $("#language").change(function () {
        let choise = $(this).find(":selected").val();
        reloadURILocale(choise);
    });
}
/* SKIN_AV_LOCALES="select_imit" */
$(document).ready(function() {
    $('div.langoptions>button').click(function() {
        $('button.langselect').html($(this).text());
        reloadURILocale($(this).text());
    })
});
// Language switcher //End// => update brouser.URI

