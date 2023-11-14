<?php
/*
* A time clock application for employees
* Email: tallada88@gmail.com
* Version: 2.0
* Author: Michael Tallada
* Copyright 2022 Kuya_Mecky
*/
namespace App\Http\Middleware;

use Closure;
use App;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session()->has('locale')) 
        {
            App::setLocale(session()->get('locale'));
        }
        
        return $next($request);
    }
}
