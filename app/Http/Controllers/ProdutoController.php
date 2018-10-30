<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facade\Storage;
use App\Produto;
use App\Categoria;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Categoria::all();
        $produtos = Produto::all();
        return view('produtos', compact('cats', 'produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Categoria::all();
        return view('/produto-novo', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = new Produto();
        $produto->nome = $request->nomeProduto;
        $produto->descricao = $request->descProduto;
        $path = $request->file('imagemProduto')->store('images', 'public');
        $produto->imagem = $path;
        $produto->quantidade = $request->qtdProduto;
        $produto->preco = $request->pcProduto;
        $produto->id_categoria = $request->catProduto;
        $produto->save();
        return redirect('/produtos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cats = Categoria::all();
        $p = Produto::find($id);
        return view('produto-editar', compact('cats', 'p'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);
        $produto->nome = $request->nomeProduto;
        $produto->descricao = $request->descProduto;
        if($request->file('imagemProduto') != null)
        {
            $path = $request->file('imagemProduto')->store('images', 'public');
            $produto->imagem = $path;
            \Storage::disk('public')->delete($img_antiga);
        }
        $produto->quantidade = $request->qtdProduto;
        $produto->preco = $request->pcProduto;
        $produto->id_categoria = $request->input('catProduto');
        $produto->save();
        return redirect('/produtos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        \Storage::disk('public')->delete($produto->imagem);
        $produto->delete();
        return redirect('/produtos');
    }
}
