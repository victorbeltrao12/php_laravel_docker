@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produtos</h1>
    </div>

    <div>
        <form action="{{ route('produto.index') }}" method="get">
            <input type="text" name="pesquisar" placeholder="Digite o nome">
            <button>Pesquisar</button>
            <a type="button" href="{{ route('cadastrar.produto') }}" class="btn btn-success float-end">
                Incluir Produto
            </a>
        </form>
        <div class="table-responsive mt-4">
            @if ($findProduto->isEmpty())
                <div class="alert alert-warning" role="alert">
                    Nenhum registro encontrado!
                </div>
            @else
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($findProduto as $Produto)
                            <tr>
                                <td>{{ $Produto->nome }}</td>
                                <td>{{ 'R$' . ' ' . number_format($Produto->valor, 2, ',', '.') }}</td>
                                <td>
                                    <a href="{{route('atualizar.produto', $Produto->$id)}}" class="btn btn-light btn-sm">
                                        Editar
                                    </a>
                                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                                    <a onclick="deleteRegistroPaginacao('{{ route('produto.delete') }}', {{ $Produto->id }})"
                                        class="btn btn-danger btn-sm">
                                        Excluir
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    @endsection
