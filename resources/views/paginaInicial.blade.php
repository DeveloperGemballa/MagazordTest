@extends('layouts.header')
@section('title','Página inicial')
@section('conteudo')
    <section>
        <div class="container position-absolute top-50 start-50 translate-middle text-center">
            <h1 style="font-family: 'Sedgwick Ave Display', cursive; letter-spacing:2px;text-shadow: rgba(0, 0, 0, 0.15) 0px 3px 8px;font-size: 105px;">Página Inicial!</h1>
            <div class="container input-group d-flex justify-content-center">
                <a href="/pessoas" class="btn btn-outline-dark">Pessoas</a>
                <a href="/contatos" class="btn btn-outline-dark">Contatos</a>
            </div>
        </div>
    </section>
@endsection