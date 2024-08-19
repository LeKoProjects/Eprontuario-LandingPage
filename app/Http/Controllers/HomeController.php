<?php

namespace App\Http\Controllers;

use App\Models\Artigos;
use App\Models\Lives;
use App\Models\Trending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $artigos = Artigos::paginate(3); // Mostra 10 artigos por página
        $trending = Trending::paginate(3);
        $lives = Lives::paginate(3);

        return view('home', compact(['artigos', 'trending', 'lives']));
    }


    public function show($id)
    {
        $artigo = Artigos::findOrFail($id);
        $lives = Lives::findOrFail($id);
        $trending = Trending::findOrFail($id);

        return view('welcome', compact(['artigo', 'trending', 'lives']));
    }

    
    public function conteudo(){
        $artigos = Artigos::orderBy('created_at', 'desc')->take(5)->get();
        $trending = Trending::orderBy('created_at', 'desc')->take(6)->get();
        $artigos2 = Artigos::orderBy('created_at', 'desc')->get();

$artigosInvertidos = $artigos2->reverse(); // Inverte a ordem da coleção
$artigosDoQuintoEmDiante = $artigosInvertidos->slice(4);
        $lives = Lives::orderBy('created_at', 'desc')->get(); 

        return view('welcome', compact(['artigos', 'trending', 'artigosDoQuintoEmDiante', 'lives']));
    }
    
}
