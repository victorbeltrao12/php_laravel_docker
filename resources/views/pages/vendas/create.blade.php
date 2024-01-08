@extends('index')
@section('content')
    <form class="form" method="POST" action="{{route('cadastrar.venda')}}">
        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Cadastrar venda</h1>
        </div>

        {{--SelectBox da numeração da venda--}}
        <div class="mb-3">
            <label class="form-label">Numeração</label>
            <input type="text" disabled value="{{$findNumeracao}}" class="form-control @error('numero_da_venda') is-invalid @enderror" name="numero_da_venda">
            @if ($errors->has('numero_da_venda'))
                @foreach ($errors->get('numero_da_venda') as $erro)
                    <div class="invalid-feedback">
                        {{$erro}}
                    </div>
                @endforeach
            @endif
        </div>

        {{--SelectBox do Produto--}}
        <div class="mb-3">
            <label class="form-label">Produto</label>
            <select class="form-select" name="produto_id">
                <option selected>Selecione um produto</option>
                @foreach ($findProduto as $produto)
                    <option value="{{$produto->id}}">{{$produto->nome}}</option>
                @endforeach
            </select>
        </div>


        {{--SelectBox do Cliente--}}
        <div class="mb-3">
            <label class="form-label">Cliente</label>
            <select class="form-select" name="cliente_id">
                <option selected>Selecione um cliente</option>
                @foreach ($findCliente as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                @endforeach
            </select>
        </div>


        <button class="btn btn-success btn-sm" type="submit">Salvar</button>
    </form>
@endsection
