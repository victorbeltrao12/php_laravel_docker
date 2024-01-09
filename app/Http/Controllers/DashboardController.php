<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Cliente;
use App\Models\Venda;
use App\Models\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $totalProdutosCadastrados = $this->buscaTotalProdutosCadastrados();
        $totalClientesCadastrados = $this->buscaTotalClientesCadastrados();
        $totalVendasCadastrados = $this->buscaTotalVendasCadastrados();
        $totalUsuariosCadastrados = $this->buscaTotalUsuariosCadastrados();


        return view('pages.dashboard.dashboard', compact('totalProdutosCadastrados', 'totalClientesCadastrados', 'totalVendasCadastrados', 'totalUsuariosCadastrados'));
    }

    public function buscaTotalProdutosCadastrados(){
        $findProduto = Produto::all()->count();
        return $findProduto;
    }
    
    public function buscaTotalClientesCadastrados(){
        $findCliente = Cliente::all()->count();
        return $findCliente;
    }

    public function buscaTotalVendasCadastrados(){
        $findVenda = Venda::all()->count();
        return $findVenda;
    }

    public function buscaTotalUsuariosCadastrados(){
        $findUsuario = User::all()->count();
        return $findUsuario;
    }

}
