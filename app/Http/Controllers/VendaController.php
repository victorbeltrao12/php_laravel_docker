<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormRequestVenda;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Venda;
use App\Models\Produto;
use App\Models\Cliente;
use App\Mail\ComprovanteDeVendaEmail;


class VendaController extends Controller
{
    public function __construct(Venda $venda){
        $this->venda = $venda;
    }
    public function index(Request $request){
        $pesquisar = $request->pesquisar;
        //dd($pesquisar);
        //$findProduto = Produto::all();
        $findVenda = $this->venda->getVendaPesquisarIndex( search: $pesquisar ?? '');

        return view('pages.vendas.paginacao', compact('findVenda'));
    }

    public function cadastrarVenda(FormRequestVenda $request){
        //dd($request);
        $findNumeracao = Venda::max('numero_da_venda') + 1;
        $findProduto = Produto::all();
        $findCliente = Cliente::all();

        if($request->method() == "POST"){
            // criação dos dados
            $data = $request->all();
            $data['numero_da_venda'] = $findNumeracao;
            Venda::create($data);
            Toastr::success('Gravado com sucesso');
            return redirect()->route('vendas.index');
        }
        // Amostra dos dados

        return view('pages.vendas.create', compact('findNumeracao', 'findProduto', 'findCliente'));
    }

    public function enviaComprovantePorEmail($id){
        $buscaVenda = Venda::where('id', '=', $id)->first();
        $produtoNome = $buscaVenda->produto->nome;
        $clienteEmail = $buscaVenda->cliente->email;
        $clienteNome = $buscaVenda->cliente->nome;

        $sendMailData = [
            'produtoNome' => $produtoNome,
            'clienteNome' => $clienteNome
        ];
        Mail::to($$clienteEmail)->send(new ComprovanteDeVendaEmail($sendMailData));
        return redirect()->route('vendas.index');
    }


    
}