<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class weatherController extends Controller
{
    public function index(){
        $reponse = Http::get('api.openweathermap.org/data/2.5/weather',[
            'q'=>'Hue',
            'appid'=>'8f62f2148d892e2315c26aab9a995913',
            ]);
        $dataJson = $reponse->body();
        $result = json_decode($dataJson);
        $celsius = $result->main->temp - 273;
        $nameCity = $result->name;
        return view('weather.index',compact('celsius','nameCity'));
    }
    public function change($city){
        $reponse = Http::get('api.openweathermap.org/data/2.5/weather',[
            'q'=>$city,
            'appid'=>'8f62f2148d892e2315c26aab9a995913',
        ]);
        $dataJson = $reponse->body();
        $result = json_decode($dataJson);
        $celsius = $result->main->temp - 273;
        $celsius = number_format($celsius);
        $nameCity = $result->name;
        return response()->json([
            'celsius'=>$celsius,
            'nameCity'=>$nameCity
        ]);

    }

}
