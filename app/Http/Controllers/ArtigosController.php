<?php

namespace App\Http\Controllers;

use App\Models\Artigos;
use App\Models\Lives;
use App\Models\Trending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArtigosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artigos = Artigos::orderBy('created_at', 'desc')->paginate(3); // Mostra 10 artigos por página
        $trending = Trending::orderBy('created_at', 'desc')->paginate(3);
        $lives = Lives::orderBy('created_at', 'desc')->paginate(3);
        return view('home', compact(['artigos', 'trending', 'lives']));
    }


    public function QuemSomosIndex()
    {
        return view('quemsomos');
    }

    public function ContatoIndex()
    {
        return view('contato');
    }
    public function NoticiasIndex()
    {
        $noticias = Artigos::orderBy('created_at', 'desc')->paginate(5);

        // Aplica o limite de caracteres a cada descrição
        foreach ($noticias as $noticia) {
            $noticia->descricao = Str::limit($noticia->descricao, 400, '...');
        }

        return view('noticias', compact('noticias'));
    }
    public function NoticiasShow($id)
    {
        $noticias = Artigos::findOrFail($id);

        return view('show', compact(['noticias']));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        // Capitalize the input
        $titulo = ucfirst($request->input('titulo'));
        $descricao = $request->input('descricao');
        $imagem = $request->file('imagem');


        if ($imagem && $imagem->isValid()) {
            $filenameWithExt = $imagem->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $imagem->getClientOriginalExtension();
            // Filename to store
            $imageName = $filename . '.' . $extension;

            // Upload Image to the 'public/images/' directory
            $imagem->move(public_path('images/'), $imageName);

            // Create a new user
            $artigo = Artigos::create([
                'titulo' => $titulo,
                'descricao' => $descricao,
                'imagem' => $imageName,
                'user_id' => $user_id,
            ]);
        } else {
            $artigo = Artigos::create([
                'titulo' => $titulo,
                'descricao' => $descricao,
                'user_id' => $user_id,
            ]);
        }

        return redirect()->back()->with('success', 'Artigo criado com sucesso')->with('artigo', $artigo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the user by ID
        $artigo = Artigos::findOrFail($id);

        // Capitalize the input
        $titulo = ucfirst($request->input('titulo'));
        $descricao = $request->input('descricao');
        $imagem = $request->file('imagem');

        if ($imagem && $imagem->isValid()) {
            $filenameWithExt = $imagem->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $imagem->getClientOriginalExtension();
            $imageName = $filename . '.' . $extension;

            // Upload Image to the 'public/images/' directory
            $imagem->move(public_path('images/'), $imageName);

            // Remove the old image if exists
            if ($artigo->imagem && file_exists(public_path('images/') . $artigo->imagem)) {
                unlink(public_path('images/') . $artigo->imagem);
            }

            // Update the user with the new image
            $artigo->imagem = $imageName;
        }

        // Update user attributes
        $artigo->titulo = $titulo;
        $artigo->descricao = $descricao;

        // Save the updated user data
        $artigo->save();


        return redirect()->back()->with('success', 'Artigo atualizado com sucesso')->with('artigo', $artigo);
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Encontra o artigo
        $artigo = Artigos::findOrFail($id);

        // Verifica se o usuário logado é o dono do artigo
        // if ($artigo->user_id !== Auth::id()) {
        //     return redirect()->route('artigos.index')->with('error', 'Você não tem permissão para excluir este artigo.');
        // }

        // Remove a imagem associada se existir
        if ($artigo->imagem) {
            Storage::delete('public/artigos/' . $artigo->imagem);
        }

        // Exclui o artigo
        $artigo->delete();

        return redirect()->back()->with('success', 'Artigo excluído com sucesso!');

    }
}
