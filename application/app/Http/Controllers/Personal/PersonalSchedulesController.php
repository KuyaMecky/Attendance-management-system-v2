<?php
/*
* A time clock application for employees
* Email: tallada88@gmail.com
* Version: 2.0
* Author: Michael Tallada
* Copyright 2022 Kuya_Mecky
*/
namespace App\Http\Controllers\personal;
use DB;
use App\Classes\table;
use App\Classes\permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PersonalSchedulesController extends Controller
{
    public function index() 
    {
        $i = \Auth::user()->idno;
        $s = table::schedules()->where('idno', $i)->get();
        $tf = table::settings()->value("time_format");

        return view('personal.personal-schedules-view', compact('s', 'tf'));
    }

    public function getPS(Request $request) 
    {
        $id = \Auth::user()->idno;
        $datefrom = $request->datefrom;
		$dateto = $request->dateto;
		
        if($datefrom == null || $dateto == null ) 
        {
            $data = table::schedules()
            ->select('intime', 'outime', 'datefrom', 'dateto', 'hours', 'restday', 'archive')
            ->where('idno', $id)
            ->get();
            
            return response()->json($data);

		} elseif ($datefrom !== null AND $dateto !== null) {
            $data = table::schedules()
            ->select('intime', 'outime', 'datefrom', 'dateto', 'hours', 'restday', 'archive')
            ->where('idno', $id)
            ->whereBetween('datefrom', [$datefrom, $dateto])
            ->get();
            
            return response()->json($data);
        } 
    }
}

