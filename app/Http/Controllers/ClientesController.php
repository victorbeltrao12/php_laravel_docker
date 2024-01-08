<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Componentes;
use App\Http\Requests\FormRequestCliente;
class ClientesController extends Controller
{
    public function __construct(Cliente $cliente){
        $this->cliente = $cliente;
    }
    public function index(Request $request){
        $pesquisar = $request->pesquisar;
        //dd($pesquisar);
        //$findProduto = Produto::all();
        $findCliente = $this->cliente->getClientesPesquisarIndex( search: $pesquisar ?? '');

        return view('pages.clientes.paginacao', compact('findCliente'));
    }

    public function delete(Request $request){
        $id = $request->id;
        $buscarRegistro = Cliente::find($id);
        $buscarRegistro->delete();
        return response()->json(['success'=> true]);
    }

    public function cadastrarCliente(FormRequestCliente $request){
        //dd($request);
        if($request->method() == "POST"){
            // criação dos dados

            $data = $request->all();
            Cliente::create($data);
            Toastr::success('Gravado com sucesso');
            return redirect()->route('clientes.index');
        }
        // Amostra dos dados
        return view('pages.clientes.create');
    }


    public function atualizarCliente(FormRequestProduto $request, $id){
        //dd($request);
        if($request->method() == "PUT"){
            // altera os dados

            $data = $request->all();
            $componente = new Componentes();
            $data['valor'] = $componente->formatacaoMascaraDinheiroDecimal($data['valor']);
            $buscarRegistro = Cliente::find($id);
            $buscarRegistro->update($data);
            return redirect()->route('produto.index');
        }
        // Amostra dos dados
        $findProduto = Cliente::where('id', '=', $id)->first();
        return view('pages.clientes.atualiza', compact('findProduto'));
    }
}
