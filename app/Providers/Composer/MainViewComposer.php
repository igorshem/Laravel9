<?php

namespace App\Providers\Composer;

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Illuminate\Support\ServiceProvider;

class MainViewComposer extends ServiceProvider {
    /**
     * Create a new profile composer.
     */
    public function __construct() {
        //
    }

    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $arr_route = [];
        $arr = Route::getRoutes();
        $route_map = config('portal_const.route_map');
        $current_locale = Request()->segment(1);
        foreach ($arr as $v) {
            if (($v->getPrefix() != '_ignition') and ($v->getPrefix() != 'sanctum') and ($v->getPrefix() != 'api') and ($v->getPrefix() != '')) {
                $arr_route[$v->getName()]['HTTP'] = implode(' | ', $v->methods());
                $arr_route[$v->getName()]['uri'] = str_replace('{locale?}', Request()->segment(1), $v->uri());
                $arr_route[$v->getName()]['prefix'] = $v->getPrefix();
                $arr_route[$v->getName()]['name'] = $v->getName();
                $arr_route[$v->getName()]['action'] = $v->getActionName();
                $arr_route[$v->getName()]['page'] = $route_map[$current_locale][$v->getName()];
            }
        }
        $view->with('current_locale', $current_locale);//only Blade, not HTML
        $view->with('arr_routes', $arr_route);
    }
}
