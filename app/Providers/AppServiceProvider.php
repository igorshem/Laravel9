<?php

namespace App\Providers;

use App\Providers\Composer\MainViewComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //локализация
        //echo 'ASP:Request()->segment(1)=['.Request()->segment(1).']'."<br>\n";
//        echo 'APS:Session::get("locale") = [' . Session::get('locale') . '] ('.implode('/', Request()->segments()).')'."<br>\n";//локаль
        $localeurl = Request()->segment(1);//см.routes/web.php: I сегмент = локаль
//        dd(Request()->segments());
        if (!in_array($localeurl, config('portal_const.available_locales'))) {
            $locale = config('app.locale');
            $uri = '';
            foreach (Request()->segments() as $v) {
                if (strlen($uri) > 0)
                    $uri .= '/'.$v;
                else
                    $uri .= $locale;
            }
            $uri = Request()->schemeAndHttpHost() . '/' . $uri;
            //вызывает глюк при php artisan cache_cl, php artisan cache:clear...
            redirect($uri)->send();
        }
//        echo 'APS:Session::get("locale") = [' . Session::get('locale') . '] ('.implode('/', Request()->segments()).')'."<br>\n";//локаль

        view()->composer(['about', 'info', 'welcome'], MainViewComposer::class);

        //Переключатель языков
        //данные для конкретного view, во всех местах где он загружается
        //порядок играет роль в Blade
        //app()->getLocale() not work
        view()->composer('partials.language_switcher', function ($view) {
            $arr = config('portal_const.av_locales');
            $view->with('available_locales', config('portal_const.available_locales'));//only Blade, not HTML
            $view->with('skin_av_locales', config('portal_const.skin_av_locales'));//only Blade, not HTML
            $view->with('av_locales', json_encode($arr, JSON_HEX_QUOT));//JavaScript
        });

        //Меню
        view()->composer('partials.menu', function($view) {
            $current_locale = Request()->segment(1);
            $view->with('current_locale', $current_locale);
            $view->with('current_hostlink', Request()->schemeAndHttpHost());
        });
    }
}
