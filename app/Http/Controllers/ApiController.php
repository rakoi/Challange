<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function index(Request $request){

        $url=$request->url;
        $end=explode(".",$url);
       
        return $end[1];
    }
}