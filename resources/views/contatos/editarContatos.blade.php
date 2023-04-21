@extends('layouts.header')
@section('title','Editar cadastro contatos')
@section('conteudo')
@if(Session::has('mensagem') && Session::get('mensagem') == "Cadastro salvo!")
    <div class="alert alert-success text-center container" role="alert">
        <h6>{{Session::get('mensagem')}}</h6>
    </div>
@elseif(Session::has('mensagem') && Session::get('mensagem') == "Por favor, informe um cadastro válido!")
    <div class="alert alert-danger text-center container" role="alert">
        <h6>{{Session::get('mensagem')}}</h6>
    </div>
@endif
    <div class="container position-absolute top-50 start-50 translate-middle">
    {!! Form::open(['route' => ['contatos.update',$contatos->id], 'method' => 'PUT']) !!}
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Selecione a pessoa: </span>
        <select class="form-select" aria-label="Default select example"  name="codP" id="codP">
            <option value="{{ $pessoas->find($contatos->codigoPessoa)->id }}" selected>{{ $pessoas->find($contatos->codigoPessoa)->nomePessoa }}</option>
            @foreach($pessoas as $pessoas)
            <option value="{{ $pessoas->id }}">{{ $pessoas->nomePessoa }}</option>
            @endforeach
        </select>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Selecione o tipo de contato: </span>
        <select class="form-select" aria-label="Default select example" name="tipo" id="tipo">
            @if($contatos->tipoContato == "ema")
                <option value="{{ $contatos->tipoContato }}" selected>E-mail</option>
            @elseif($contatos->tipoContato == "tel")
                <option value="{{ $contatos->tipoContato }}" selected>Telefone</option>
            @endif
            <option value="tel">Telefone</option>
            <option value="ema">E-mail</option>
        </select>
    </div>
    <div class="mb-3">
        <div class="input-group">
            <span class="input-group-text" id="basic-addon1">Descrição: </span>
            <input type="text" name="descricao" id="descricao" value="{{ $contatos->descricaoContato }}" class="form-control" placeholder="Insira os dados" aria-label="Tel ou E-mail" aria-describedby="basic-addon1" required>
        </div>
        <div class="form-text" id="basic-addon4">Preencha com o telefone ou com e-mail</div>
        </div>
    <hr>
    {!! Form::submit('Salvar',['class'=>'btn btn-outline-success btn-sm']) !!} |
    {!! Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-outline-danger btn-sm'])!!}
    {!! Form::close() !!}
        </div>
@endsection