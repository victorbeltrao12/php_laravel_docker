<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Http\Requests\FormRequestProduto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function __construct(Produto $produto){
        $this->produto = $produto;
    }
    public function index(Request $request){
        $pesquisar = $request->pesquisar;
        //dd($pesquisar);
        //$findProduto = Produto::all();
        $findProduto = $this->produto->getProdutosPesquisarIndex( search: $pesquisar ?? '');

        return view('pages.produtos.paginacao', compact('findProduto'));
    }

    public function delete(Request $request){
        $id = $request->id;
        $buscarRegistro = Produto::find($id);
        $buscarRegistro->delete();
        return response()->json(['success'=> true]);
    }

    public function cadastrarProduto(FormRequestProduto $request){
        //dd($request);
        if($request->method() == "POST"){

            $request->validate([
                'nome' => 'required',
                'valor' => 'required',
            ]);

            $produto = new Produto();
            $produto->nome = $request->nome;
            $produto->valor = $request->valor;
            $produto->save();
            return redirect()->route('produto.index');}
        return view('pages.produtos.create');
    }


    
}
