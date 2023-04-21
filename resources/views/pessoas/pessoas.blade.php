@extends('layouts.header')
@section('title','Visualizar pessoas')
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
<section style="width:100%;height:80vh;">
    <div class="container position-absolute top-50 start-50 translate-middle text-center">
        <h1 style="font-family: 'Sedgwick Ave Display', cursive; letter-spacing:2px;text-shadow: rgba(0, 0, 0, 0.15) 0px 3px 8px;font-size: 105px;">Consulta de pessoas!</h1>
    </div>
</section>
<section>
    <div class="container">
            {{Form::open(['url'=>'pessoas/buscar','method'=>'GET'])}}
                <div class="mb-3">
                <div class="input-group">
                    <input type="text" id="conteudoPesquisa" name="conteudoPesquisa" class="form-control" placeholder="Insira o nome para a busca..." aria-label="Pesquisa" aria-describedby="basic-addon1">
                    <input type="submit" value="pesquisar"class="btn btn-outline-info btn-sm">
                    @if(isset($_GET['conteudoPesquisa']))
                    @if($_GET['conteudoPesquisa'] !== null)
                        <a href="/pessoas" class="btn btn-outline-info">Todos</a>
                    @endif
                @endif
                </div>
                <div class="form-text" id="basic-addon4">Preencha com nome de um cadastro</div>
                </div>
                </div>
            {{Form::close()}}
        <table class="table table-hover table-striped shadow-sm container table-bordered">
            <th>Código</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Opções</th>
            @foreach($pessoas as $pessoas)
            <tr>
                <td>{{ $pessoas->id }}</td>
                <td>{{ $pessoas->nomePessoa }}</td>
                <td>{{ $pessoas->CPFpessoa }}</td>
                <td>
                    {!! Form::open(["route" => ['pessoas.destroy', $pessoas->id], 'method' => "DELETE"]) !!}
                    {!! Form::submit('Excluir',['class'=>'btn btn-outline-danger btn-sm']) !!} |
                    <a href="{{url('pessoas/'.$pessoas->id.'/edit')}}" class="btn btn-outline-warning btn-sm">Alterar</a>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </table>
        <div style="height:30vh;"></div>
    </div>
</section>
@endsection