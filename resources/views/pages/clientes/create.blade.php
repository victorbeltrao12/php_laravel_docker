@extends('index')
@section('content')
    <form class="form" method="POST" action="{{route('cadastrar.cliente')}}">
        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Criar novo cadastro de cliente</h1>
        </div>

        {{--Botão Cadastrar Nome--}}
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" value="{{old('name')}}" class="form-control @error('nome') is-invalid @enderror" name="nome">
            @if ($errors->has('nome'))
                @foreach ($errors->get('nome') as $erro)
                    <div class="invalid-feedback">
                        {{$erro}}
                    </div>
                @endforeach
            @endif
        </div>

        {{--Botão Cadastrar Email--}}
        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input type="text" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" name="email">
            @if ($errors->has('email'))
                @foreach ($errors->get('email') as $erro)
                    <div class="invalid-feedback">
                        {{$erro}}
                    </div>
                @endforeach
            @endif
        </div>

        {{--Botão Cadastrar CEP--}}
        <div class="mb-3">
            <label class="form-label">CEP</label>
            <input id="cep" type="text" value="{{old('cep')}}" class="form-control @error('cep') is-invalid @enderror" name="cep">
            @if ($errors->has('cep'))
                @foreach ($errors->get('cep') as $erro)
                    <div class="invalid-feedback">
                        {{$erro}}
                    </div>
                @endforeach
            @endif
        </div>

        {{--Botão Cadastrar Endereço--}}
        <div class="mb-3">
            <label class="form-label">Endereço</label>
            <input id="endereco" type="text" value="{{old('endereco')}}" class="form-control @error('endereco') is-invalid @enderror" name="endereco">
            @if ($errors->has('endereco'))
                @foreach ($errors->get('endereco') as $erro)
                    <div class="invalid-feedback">
                        {{$erro}}
                    </div>
                @endforeach
            @endif
        </div>

        {{--Botão Cadastrar Logradouro--}}
        <div class="mb-3">
            <label class="form-label">Logradouro</label>
            <input id="logradouro" type="text" value="{{old('logradouro')}}" class="form-control @error('logradouro') is-invalid @enderror" name="logradouro">
            @if ($errors->has('logradouro'))
                @foreach ($errors->get('logradouro') as $erro)
                    <div class="invalid-feedback">
                        {{$erro}}
                    </div>
                @endforeach
            @endif
        </div>
        <button class="btn btn-success btn-sm" type="submit">Salvar</button>
    </form>
@endsection
