<?php

namespace App\Http\Controllers;

use App\Anuncio;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Carbon\Carbon;
use File;
use DateTime;


class AnuncioController extends Controller
{
    public function cadastrarAd(Request $request)
    {
        $usuario = session()->get("Usuario");
        return view('/cadastroAd')->with(["usuario" => $usuario]);
    }

    public function listarAds(Request $request)
    {
        // pegar todos as ads e passar junto no return view (ah va ne)
        $usuario = session()->get("Usuario");
        $anuncios = Anuncio::all();

        return view('/listarAds')->with(["usuario" => $usuario, "anuncios" => $anuncios]);
    }

    public function storeAds(Request $request)
    {
        $novoAnuncio = Anuncio::create([
            'nome' => $request->nome,
            'link' => $request->link
        ]);

        $imagemVertical = $request->file('imagem_vertical');
        $extensao = $imagemVertical->getClientOriginalExtension();
        chmod($imagemVertical->path(), 0755);
        $caminhoVertical = '/imagem-anuncio/anuncio-id-vertical' . $novoAnuncio->id . '.' . $extensao;
        File::move($imagemVertical, public_path() . $caminhoVertical);
        $novoAnuncio->imagem_vertical = $caminhoVertical;

        $imagemHorizontal = $request->file('imagem_horizontal');
        $extensao = $imagemHorizontal->getClientOriginalExtension();
        chmod($imagemHorizontal->path(), 0755);
        $caminhoHorizontal = '/imagem-anuncio/anuncio-id-horizontal' . $novoAnuncio->id . '.' . $extensao;
        File::move($imagemHorizontal, public_path() . $caminhoHorizontal);
        $novoAnuncio->imagem_horizontal = $caminhoHorizontal;

        $novoAnuncio->save();

        return redirect()->route('listarAds');
    }

    public function deletarAd(string $id)
    {
        Anuncio::destroy($id);

        return redirect()->route('listarAds');
    }
}
