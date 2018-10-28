<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RouteListController extends Controller
{
    public function routeList()
    {
        $collection = \Route::getRoutes();

        $routes = [];

        foreach($collection as $route) {
            if($route->getName()!=NULL && preg_match('/\.index\b/',$route->getName())
                || preg_match('/\.create\b/',$route->getName())
                || preg_match('/\.edit\b/',$route->getName())
                || preg_match('/\.destroy\b/',$route->getName())
                )
                $routes[] = $route->getName();
        }
        return $routes;
    }
}
