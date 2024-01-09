@extends('index')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Produtos cadastrados</h5>
                    <p class="card-text">Total de produtos cadastrados no sistema.</p>
                    <a href="#" class="btn btn-primary">{{$totalProdutosCadastrados}}</a>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Clientes cadastrados</h5>
                    <p class="card-text">Total de clientes cadastrados no sistema.</p>
                    <a href="#" class="btn btn-primary">{{$totalClientesCadastrados}}</a>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Usuários cadastrados</h5>
                        <p class="card-text">Total de usuários cadastrados no sistema.</p>
                        <a href="#" class="btn btn-primary">{{$totalUsuariosCadastrados}}</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Vendas Efetuadas</h5>
                        <p class="card-text">Total de vendas já efetuadas no sistema.</p>
                        <a href="#" class="btn btn-primary">{{$totalVendasCadastrados}}</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
