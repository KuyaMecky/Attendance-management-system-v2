<?php
/*
* A time clock application for employees
* Email: tallada88@gmail.com
* Version: 2.0
* Author: Michael Tallada
* Copyright 2022 Kuya_Mecky
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function AuthRouteAPI(Request $request) 
    {
        return $request->user();
    }
}
