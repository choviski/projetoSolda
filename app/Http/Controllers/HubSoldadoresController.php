<?php

namespace App\Http\Controllers;

use App\Soldador;
use Illuminate\Http\Request;

class HubSoldadoresController extends Controller
{
    public function hubSoldadores(Request $request)
    {
        $soldadores = Soldador::select()->orderBy('status','desc')->get();
        return view("soldadores")->with(["soldadores"=>$soldadores]);
    }

}
