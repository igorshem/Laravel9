<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|RedirectResponse)  $next
     * @return \Illuminate\Http\Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next): \Illuminate\Http\Response|RedirectResponse
    {
        /* Локализация. Не совсем по инструкции, но в ходе тестов выяснил что Middleware:
         * 1. выполняется после AppServiceProvider::register() => AppServiceProvider::boot() => {Middleware}::handle()
         * 2. соответственно тратится время и ресурсы на проход по AppServiceProvider
         * 3. неверный {locale} завершается переадрессацией, проблема что AppServiceProvider::register() не даёт сделать "return redirect('/'. $locale)"
         * 4. проблема Middleware - код не выполняется, если не чистая ссылка, т.е. для {host}/{locale} - выполняется, а для {host}/{locale}/{page} - нет
         * 5. AppServiceProvider не изменяет Session! (без ошибок)
         * */
        $local = Request()->segment(1);
        if (Session::has('locale')) {
            App::setLocale($local);
        }
        return $next($request);
    }
}
