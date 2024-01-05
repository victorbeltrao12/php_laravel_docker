<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Http\Requests\FormRequestProduto;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function __construct(Produto $produto){
        private $produto;
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
            // criação dos dados

            $data = $request->all();
            $componente = new Componentes();
            $data['valor'] = $componente->formatacaoMascaraDinheiroDecimal($data['valor']);
            Produto::create($data);
            Toastr::success('Gravado com sucesso');
            return redirect()->route('produto.index');
        }
        // Amostra dos dados
        return view('pages.produtos.create');
    }


    public function atualizarProduto(FormRequestProduto $request, $id){
        //dd($request);
        if($request->method() == "PUT"){
            // altera os dados

            $data = $request->all();
            $componente = new Componentes();
            $data['valor'] = $componente->formatacaoMascaraDinheiroDecimal($data['valor']);
            $buscarRegistro = Produto::find($id);
            $buscarRegistro->update($data);
            return redirect()->route('produto.index');
        }
        // Amostra dos dados
        $findProduto = Produto::where('id', '=', $id)->first();
        return view('pages.produtos.atualiza', compact('findProduto'));
    }
}
