@extends('layouts.header')
@section('title','Cadastro pessoas')
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
    {!! Form::open(['route' => 'pessoas.store', 'method' => 'POST']) !!}
    <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Nome: </span>
    {!! Form::text('name', '', ['class'=>'form-control', 'required', 'placeholder' =>'Insira o nome completo...']) !!}
    </div>
                  <div class="mb-3">
                    <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">CPF: </span>
    {!! Form::text('cpf', '', ['class'=>'form-control', 'required', 'placeholder' =>'Insira CPF completo...']) !!}
        </div>
                    <div class="form-text" id="basic-addon4">Preencha com "." e "-"</div>
                </div>
    <hr>
    {!! Form::submit('Salvar',['class'=>'btn btn-outline-success btn-sm']) !!} |
    {!! Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-outline-danger btn-sm'])!!}
    {!! Form::close() !!}
        </div>
@endsection