<?php

namespace App\Http\Controllers;

class WeatherController extends Controller
{
    public function get(){

        $xml = simplexml_load_file(env('CITY'));

        return view('weather')->with([
            'weather' => $xml->weather->day,
            'page_title' => 'Погода'
            ]);
    }
}