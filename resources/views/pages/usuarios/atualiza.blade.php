@extends('index')
@section('content')
    <form class="form" method="POST" action="{{route('atualizar.usuario', $findUsuario->id)}}">
        @csrf
        @method('PUT')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Editar usuário</h1>
        </div>
        {{--Atualização do nome do usuario--}}
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" value="{{isset($findUsuario->name) ? $findUsuario->name : old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name">
            @if ($errors->has('name'))
                @foreach ($errors->get('name') as $erro)
                    <div class="invalid-feedback">
                        {{$erro}}
                    </div>
                @endforeach
            @endif
        </div>
        {{--Atualização do Email--}}
        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input value="{{isset($findUsuario->email) ? $findUsuario->email : old('email')}}" class="form-control @error('email') is-invalid @enderror" name="email">
            @if ($errors->has('email'))
                @foreach ($errors->get('email') as $erro)
                    <div class="invalid-feedback">
                        {{$erro}}
                    </div>
                @endforeach
            @endif
        </div>
        {{--Atualização da senha--}}
        <div class="mb-3">
            <label class="form-label"> Nova senha</label>
            <input type="password" class="form-control" @error('password') is-invalid @enderror" name="password">
            @if ($errors->has('password'))
                @foreach ($errors->get('password') as $erro)
                    <div class="invalid-feedback">
                        {{$erro}}
                    </div>
                @endforeach
            @endif
        </div>
        <button class="btn btn-success btn-sm" type="submit">Salvar</button>
    </form>
@endsection