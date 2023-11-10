<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Carbon\Carbon;
use File;
use DateTime;


class AdController extends Controller
{
    public function cadastrarAd(Request $request){
        $usuario = session()->get("Usuario");
        return view('/cadastroAd')->with(["usuario"=>$usuario]);
    }

    public function listarAds(Request $request){
        // pegar todos as ads e passar junto no return view (ah va ne)
        $usuario = session()->get("Usuario");
        return view('/listarAds')->with(["usuario"=>$usuario]);
    }
}
