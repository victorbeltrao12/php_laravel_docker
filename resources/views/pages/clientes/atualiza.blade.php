@extends('index')
@section('content')
    <form class="form" method="POST" action="{{route('atualizar.produto', $findProduto->id)}}">
        @csrf
        @method('PUT')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Editar produto</h1>
        </div>
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" value="{{isset($findProduto->nome) ? $findProduto->nome : old('name')}}" class="form-control @error('nome') is-invalid @enderror" name="nome">
            @if ($errors->has('nome'))
                @foreach ($errors->get('nome') as $erro)
                    <div class="invalid-feedback">
                        {{$erro}}
                    </div>
                @endforeach
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Valor</label>
            <input id='mascara_valor' value="{{isset($findProduto->valor) ? $findProduto->valor : old('valor')}}" class="form-control @error('valor') is-invalid @enderror" name="valor">
            @if ($errors->has('valor'))
                @foreach ($errors->get('valor') as $erro)
                    <div class="invalid-feedback">
                        {{$erro}}
                    </div>
                @endforeach
            @endif
        </div>
        <button class="btn btn-success btn-sm" type="submit">Salvar</button>
    </form>
@endsection
